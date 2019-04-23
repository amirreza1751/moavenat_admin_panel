<?php

namespace App\Http\Controllers;

use App\project;
use App\standard;
use App\subScore;
use App\subScoreL2;
use Illuminate\Support\Facades\Session;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JudgementController extends Controller
{
    public function set_grade($id){
        $project = project::find($id);
        return view('tarvijiSetGrade', compact('project'));
        if($project->type == "ترویجی") {
            return view('tarvijiSetGrade', compact('project'));
        }
        else
            return "not matched.";
    }





    public function index_grades($id){
        $referees = array();
        $users = User::all();
        foreach ($users as $user){
//            $temp = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.id', $user->id)
//                ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->where('standards.is_final_judgment', '=', null)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();
            $temp = DB::table('users')->where('users.id', $user->id)
                ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->where('standards.is_final_judgment', '=', null)->select('users.name as username', 'standards.*')->get();
            array_push($referees, $temp);
        }


//        $referees_final = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.id', 1)
//            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->where('standards.is_final_judgment', '=', 1)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();

        $referees_final = DB::table('users')->where('users.id', 1)
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->where('standards.is_final_judgment', '=', 1)->select('users.name as username', 'standards.*')->get();

        $project = project::find($id);
//return $referees_final;


        return view('finalGrades', compact('referees', 'referees_final', 'project'));

    }


    public function final_insert_grade($id, Request $request){
        $user_id = Auth::user()->id;
        $result = standard::where('project_id', $id)->where('is_final_judgment', 1)->get();
        $final_grade =0;
        for ($i=0; $i< 10; $i++){
            $final_grade += $request[$i]; /** نمرات جمع */
        }

        if (count($result->all()) != 0){
            foreach($result as $item => $value){ /** davari ro update mikone */
                $value->final_score = $request[$item];
                $value->user_id = $user_id;
                $value->save();
            }
            $selected_project = project::find($id);
            $selected_project->grade = $final_grade;
            $selected_project->save();
            Session::flash('message', '.داوری نهایی با موفقیت ویرایش شد');
            Session::flash('alert-class', 'alert-success');
            return back();
        } else

        standard::create([
            'st_name' => 'کار تیمی',
            'st_coefficient' => '1',
            'final_score' => $request[0],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1

        ]);

        standard::create([
            'st_name' => 'سطح برگزاری',
            'st_coefficient' => '1',
            'final_score' => $request[1],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'تبلیغات',
            'st_coefficient' => '1',
            'final_score' => $request[2],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'جذب مخاطب',
            'st_coefficient' => '1',
            'final_score' => $request[3],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'مدت زمان برگزاری',
            'st_coefficient' => '1',
            'final_score' => $request[4],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'نوآوری و ابتکار',
            'st_coefficient' => '1',
            'final_score' => $request[5],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'حامیان مالی و رفاهی',
            'st_coefficient' => '1',
            'final_score' => $request[6],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'مدعوین ویژه',
            'st_coefficient' => '1',
            'final_score' => $request[7],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'برنامه های جانبی',
            'st_coefficient' => '1',
            'final_score' => $request[8],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);

        standard::create([
            'st_name' => 'گواهی',
            'st_coefficient' => '1',
            'final_score' => $request[9],
            'project_id' => $id,
            'user_id' => $user_id,
            'is_final_judgment' => 1
        ]);


//        $final_grade = $request[0] + $request['level'] + $request['tablighat'] +  + $request['jazb_mokhatab'] + $request['modat_zaman_bargozari'] + $request['innovation'] + $request['sponsors'] + $request['madovin'] + $request['barname_janebi'] + $request['govahi'];
        $selected_project = project::find($id);
        $selected_project->grade = $final_grade;
        $selected_project->save();
        Session::flash('message', '.داوری نهایی با موفقیت ثبت شد');
        Session::flash('alert-class', 'alert-success');

//        return redirect('/projects/finalJudge/'.$id);
        return back();
    }



    public function insert_grade(Request $request, $id){

        $rules = [
            'teami1.final_score' => 'required'
        ];

        $messages = [
            'teami1.final_score.required' => '.لطفا نمرات را ثبت کنید',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = Auth::user()->id;
        $result = standard::where('project_id', $id)->where('is_final_judgment', null)->where('user_id', $user_id)->get();

        if (count($result) > 0){
//            return redirect('/projects');
            return redirect('/projects?status=duplicate');
        }

        $standard = standard::create([
                'st_name' => 'کار تیمی',
                'st_coefficient' => $request['teami1']['st_coefficient'],
                'final_score' => $request['teami1']['final_score'],
                'project_id' => $id,
                'user_id' => $user_id
            ]);

         subScore::create([
                'subject' => 'معیار اول',
                'coefficient' => $request['meyarAval2']['coefficient'],
                'sub_score' => $request['meyarAval2']['sub_score'],
                'standard_id' => $standard->id
            ]);
        $sub_score = subScore::create([
            'subject' => 'معیار دوم',
            'coefficient' => $request['meyarDovom2']['coefficient'],
            'sub_score' => $request['meyarDovom2']['sub_score'],
            'standard_id' => $standard->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'قبل از برگزاری',
            'coefficient_l2' => $request['ghablAzBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['ghablAzBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'حین از برگزاری',
            'coefficient_l2' => $request['heyneBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['heyneBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'بعد از برگزاری',
            'coefficient_l2' => $request['baadeBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['baadeBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'مشخص بودن کادر اجرایی',
            'coefficient_l2' => $request['kadr3']['coefficient_l2'],
            'sub_score_l2' => $request['kadr3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

         standard::create([
            'st_name' => 'سطح برگزاری',
            'st_coefficient' => $request['level1']['st_coefficient'],
            'final_score' => $request['level1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        $standard = standard::create([
            'st_name' => 'تبلیغات',
            'st_coefficient' => $request['tablighat1']['st_coefficient'],
            'final_score' => $request['tablighat1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'فضای مجازی',
            'coefficient' => $request['faza2']['coefficient'],
            'sub_score' => $request['faza2']['sub_score'],
            'standard_id' => $standard->id
        ]);

        subScore::create([
            'subject' => 'پوستر و بنر و استند',
            'coefficient' => $request['poster2']['coefficient'],
            'sub_score' => $request['poster2']['sub_score'],
            'standard_id' => $standard->id
        ]);
        subScore::create([
            'subject' => 'فایل اصلی',
            'coefficient' => $request['file2']['coefficient'],
            'sub_score' => $request['file2']['sub_score'],
            'standard_id' => $standard->id
        ]);
        subScore::create([
            'subject' => 'خوابگاه و محیط‌های دانشگاهی',
            'coefficient' => $request['khabgah2']['coefficient'],
            'sub_score' => $request['khabgah2']['sub_score'],
            'standard_id' => $standard->id
        ]);
        subScore::create([
            'subject' => 'آیدی کارت',
            'coefficient' => $request['id2']['coefficient'],
            'sub_score' => $request['id2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'بروشور',
            'coefficient' => $request['broshur2']['coefficient'],
            'sub_score' => $request['broshur2']['sub_score'],
            'standard_id' => $standard->id
        ]);
        subScore::create([
            'subject' => 'دعوتنامه اساتید',
            'coefficient' => $request['davatname2']['coefficient'],
            'sub_score' => $request['davatname2']['sub_score'],
            'standard_id' => $standard->id
        ]);

        standard::create([
            'st_name' => 'جذب مخاطب',
            'st_coefficient' => $request['jazb1']['st_coefficient'],
            'final_score' => $request['jazb1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        standard::create([
            'st_name' => 'مدت زمان برگزاری',
            'st_coefficient' => $request['modat1']['st_coefficient'],
            'final_score' => $request['modat1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id,
        ]);

        $standard = standard::create([
            'st_name' => 'نوآوری و ابتکار',
            'st_coefficient' => $request['noavari1']['st_coefficient'],
            'final_score' => $request['noavari1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);
        subScore::create([
            'subject' => 'در عنوان',
            'coefficient' => $request['darOnvan2']['coefficient'],
            'sub_score' => $request['darOnvan2']['sub_score'],
            'standard_id' => $standard->id,

        ]);
        subScore::create([
            'subject' => 'در محتوا',
            'coefficient' => $request['darMohtava2']['coefficient'],
            'sub_score' => $request['darMohtava2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $standard = standard::create([
            'st_name' => 'حامیان مالی و رفاهی',
            'st_coefficient' => $request['hami1']['st_coefficient'],
            'final_score' => $request['hami1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'همکاری استادان و مسئو‌لین',
            'coefficient' => $request['hamkari2']['coefficient'],
            'sub_score' => $request['hamkari2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'ارتباط با صنعت و جامعه',
            'coefficient' => $request['ertebat2']['coefficient'],
            'sub_score' => $request['ertebat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $sub_score = subScore::create([
            'subject' => 'جذب حامی',
            'coefficient' => $request['jazbHami2']['coefficient'],
            'sub_score' => $request['jazbHami2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScoreL2::create([
            'subject_l2' => 'تعداد حامیان',
            'coefficient_l2' => $request['tedadHamian3']['coefficient_l2'],
            'sub_score_l2' => $request['tedadHamian3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'نوع کمک',
            'coefficient_l2' => $request['noeKomak3']['coefficient_l2'],
            'sub_score_l2' => $request['noeKomak3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        $standard = standard::create([
            'st_name' => 'مدعوین ویژه‌ی خارج از دانشگاه',
            'st_coefficient' => $request['madovin1']['st_coefficient'],
            'final_score' => $request['madovin1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'درون دانشگاهی',
            'coefficient' => $request['darunUni2']['coefficient'],
            'sub_score' => $request['darunUni2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $sub_score = subScore::create([
            'subject' => 'برون دانشگاهی',
            'coefficient' => $request['borunUni2']['coefficient'],
            'sub_score' => $request['borunUni2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScoreL2::create([
            'subject_l2' => 'شهری',
            'coefficient_l2' => $request['shahri3']['coefficient_l2'],
            'sub_score_l2' => $request['shahri3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'استانی',
            'coefficient_l2' => $request['ostani3']['coefficient_l2'],
            'sub_score_l2' => $request['ostani3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'کشوری',
            'coefficient_l2' => $request['keshvari3']['coefficient_l2'],
            'sub_score_l2' => $request['keshvari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        $standard = standard::create([
            'st_name' => 'برنامه های جانبی',
            'st_coefficient' => $request['barnameJanebi1']['st_coefficient'],
            'final_score' => $request['barnameJanebi1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'غرفه',
            'coefficient' => $request['ghorfe2']['coefficient'],
            'sub_score' => $request['ghorfe2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'نمایشگاه',
            'coefficient' => $request['namayeshgah2']['coefficient'],
            'sub_score' => $request['namayeshgah2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'غیره',
            'coefficient' => $request['gheyre2']['coefficient'],
            'sub_score' => $request['gheyre2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $standard = standard::create([
            'st_name' => 'گواهی',
            'st_coefficient' => $request['govahi1']['st_coefficient'],
            'final_score' => $request['govahi1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'گواهی معاونت',
            'coefficient' => $request['govahiMoavenat2']['coefficient'],
            'sub_score' => $request['govahiMoavenat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی گروه',
            'coefficient' => $request['govahiGoruh2']['coefficient'],
            'sub_score' => $request['govahiGoruh2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی پژوهشی',
            'coefficient' => $request['govahiPajuheshi2']['coefficient'],
            'sub_score' => $request['govahiPajuheshi2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی شرکت‌ها',
            'coefficient' => $request['govahiSherkat2']['coefficient'],
            'sub_score' => $request['govahiSherkat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'غیره',
            'coefficient' => $request['govahiGheyre2']['coefficient'],
            'sub_score' => $request['govahiGheyre2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        Session::flash('message', '.داوری با موفقیت انجام شد');
        Session::flash('alert-class', 'alert-success');


        return redirect('/projects?status=done');




    }

}
