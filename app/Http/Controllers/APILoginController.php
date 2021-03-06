<?php

namespace App\Http\Controllers\API;

use App\Role;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//session_start();

class APILoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function getToken(Request $request)
    {


        //user credentials in request
        $email = $request->input('username');
        $password = $request->input('password');
        //checking if user exists
        $user = User::where('email', $email)->get();
        if ($user->count() > 0) {
            $user = $user[0];
            if (Hash::check($password, $user->password)) {
                $role = $user->app_role;

                $oauth_client = DB::table('oauth_clients')->where('password_client', 1)->first();
                $request->request->add([
                    'grant_type' => 'password',
                    'client_id' => $oauth_client->id,
                    'client_secret' => $oauth_client->secret,
                    'scope' => '*',
                ]);
                $tokenRequest = Request::create(
                    '/oauth/token',
                    'post'
                );
                return Route::dispatch($tokenRequest);

//                $temp = Route::dispatch($tokenRequest);
//                return $temp->expires_in;
//                return Carbon::parse($temp->expires_in)->toDateTimeString();
            } else {
                //type = 2 => incorrect passowrd
                return [
                    'error' => '2',
                    'errorType' => 'auth'];
            }
        } else {
            //type= 1 => no such user exists
            return [
                'error' => '1',
                'errorType' => 'auth'];
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
