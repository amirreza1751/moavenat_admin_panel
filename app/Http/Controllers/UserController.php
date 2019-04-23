<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function manage()
    {
        $users = User::all();
        $referees = User::hasRoles('davar')->get();
        return view('users.manage', compact('users', 'referees'));
    }

    public function permissions_for_judgments(Request $request)
    {
        $request = $request->all();
        $user_id = $request['user'];
        $user = User::find($user_id);
        $user->revokePermissionTo('آموزشی');
        $user->revokePermissionTo('ترویجی');
        $user->revokePermissionTo('مسابقه ای');

        if (isset($request['assign']['tarviji'])) {
            if ($request['assign']['tarviji'] == 1) {
                $user->givePermissionTo('ترویجی');
            } else $user->revokePermissionTo('ترویجی');
        }

        if (isset($request['assign']['amuzeshi'])) {
            if ($request['assign']['amuzeshi'] == 1) {
                $user->givePermissionTo('آموزشی');
            } else $user->revokePermissionTo('آموزشی');
        }

        if (isset($request['assign']['mosabeghei'])) {
            if ($request['assign']['mosabeghei'] == 1) {
                $user->givePermissionTo('مسابقه ای');
            } else $user->revokePermissionTo('مسابقه ای');
        }
//        Session::flash('message', '.با موفقیت به روز رسانی شد '. $user->name .'کاربر ');
        Session::flash('message1', $user->name);
        Session::flash('alert-class1', 'alert-success');
        return back();
    }

    public function manage_roles(Request $request)
    {
        $user_id = $request['user'];
        $user = User::find($user_id);
        if ($user->hasRole('dabir')) {
            $user->removeRole('dabir');
        }
        if ($user->hasRole('davar')) {
            $user->removeRole('davar');
        }
        if ($user->hasRole('staff')) {
            $user->removeRole('staff');
        }


        if (isset($request['assign']['dabir'])) {
            if ($request['assign']['dabir'] == 1) {
                $user->assignRole('dabir');
            }
        }

        if (isset($request['assign']['davar'])) {
            if ($request['assign']['davar'] == 1) {
                $user->assignRole('davar');
            }
        }

        if (isset($request['assign']['staff'])) {
            if ($request['assign']['staff'] == 1) {
                $user->assignRole('staff');
            }
        }

        Session::flash('message2', $user->name);
        Session::flash('alert-class2', 'alert-success');
        return back();
    }

    public function account()
    {
        $user = Auth::user();
        return view('users.account', compact('user'));
    }

    public function edit_account(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name' => 'string|required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ];

        $messages = [
            'name.required' => 'لطفا نام را وارد کنید',
            'email.required' => 'لطفا رمز عبور را وارد کنید',
            'email.unique' => 'ایمیل باید منحصر به فرد باشد',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }



        $request = $request->all();
        if ($request['password'] == null) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            Session::flash('message', 'تغییرات با موفقیت ذخیره شد');
            Session::flash('alert-class', 'alert-success');
            return back();
        } else if ($request['password-confirmation'] != null) {
            if ($request['password'] == $request['password-confirmation']){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->password = Hash::make($request['password']);
                $user->save();
                Session::flash('message', 'تغییرات با موفقیت ذخیره شد');
                Session::flash('alert-class', 'alert-success');
                return back();
            }else {
                Session::flash('message', 'رمز عبور ها بایکدیگر مطابقت ندارد');
                Session::flash('alert-class', 'alert-danger');
                return back();
            }
        }
        Session::flash('message', 'رمز عبور ها بایکدیگر مطابقت ندارد');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }
}
