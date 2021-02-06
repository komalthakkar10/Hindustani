<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use DB;
use Session;
class JobController extends Controller
{
    public $view = 'job';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::get();
        return view($this->view.'.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view.'.jobApplication');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
                'name'              => 'required',
                'email'             => 'required',
                'address'           => 'required',
                'gender'            => 'required',
                'contact'           => 'required|numeric|min:10',
                'ssc'               => 'required',
                'hsc'               => 'required',
                'graduation'        => 'required',
                'prefered_location' => 'required',
                'expected_ctc'      => 'required|numeric',
                'current_ctc'       => 'required|numeric',
                'notice_period'     => 'required',
            ]);
        $job                    = new Job;
        $job->name              = $request->name;
        $job->email             = $request->email;
        $job->address           = $request->address;
        $job->gender            = $request->gender;
        $job->contact           = $request->contact;
        $job->ssc               = $request->ssc;
        $job->hsc               = $request->hsc;
        $job->graduation        = $request->graduation;
        $job->master_degree     = $request->master;
        $job->prefered_location = $request->prefered_location;
        $job->expected_ctc      = $request->expected_ctc;
        $job->current_ctc       = $request->current_ctc;
        $job->notice_period     = $request->notice_period;
        $job->save();
        $sr_no = $request->sr_no;
        $WorkExperienceArr = array();
                for($i=0;$i<$sr_no;$i++){
                    $WorkExperienceArr[] = array(
                        'company_name' => $request->company_name[$i],
                        'start_date'   => $request->start_date[$i],
                        'end_date'   => $request->end_date[$i],
                    );
                }
                if(!empty($WorkExperienceArr)){
                    foreach ($WorkExperienceArr as $key => $value){
                        $work_experience = DB::table('work_experience')->insert(
                            [
                                'job_id'      => $job->id,
                                'company_name' => $value['company_name'],
                                'start_date'   => $value['start_date'],
                                'end_date'     => $value['end_date'],
                                'sr_no'        => $sr_no,
                                'created_at'   => Carbon\Carbon::now(),
                                'updated_at'   => Carbon\Carbon::now(),
                            ]
                        );
                    }   
                }
            
            $languages = DB::table('languages')->insert([
                [
                    'job_id'        => $job->id,
                    'language' => $request->language_hindi,
                    'read'          => $request->hindi_read != null ? $request->hindi_read : 0,
                    'write'         => $request->hindi_write != null ? $request->hindi_write : 0,
                    'speak'         => $request->hindi_speak != null ? $request->hindi_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ],
                [
                    'job_id'        => $job->id,
                    'language' => $request->language_english,
                    'read'          => $request->english_read != null ? $request->english_read : 0,
                    'write'         => $request->english_write != null ? $request->english_write : 0,
                    'speak'         => $request->english_speak != null ? $request->english_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ],
                [
                    'job_id'        => $job->id,
                    'language' => $request->language_gujarati,
                    'read'          => $request->gujarati_read != null ? $request->gujarati_read : 0,
                    'write'         => $request->gujarati_write != null ? $request->gujarati_write : 0,
                    'speak'         => $request->gujarati_speak != null ? $request->gujarati_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ]
            ]);

             $technical_experience = DB::table('technical_experience')->insert([
                [
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_php,
                    'experience'          => $request->php_experience != null ? $request->php_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ],
                [
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_mysql,
                    'experience'          => $request->mysql_experience != null ? $request->mysql_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ],
                [
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_laravel,
                    'experience'          => $request->laravel_experience != null ? $request->laravel_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ]
            ]);
             Session::flash('message', 'Form submited Successfuly!'); 
             Session::flash('alert-class', 'alert-danger'); 
             return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $work_experience = DB::table('work_experience')->where('job_id',$id)->get();
        $languages = DB::table('languages')->where('job_id',$id)->get();
        $experience = DB::table('technical_experience')->where('job_id',$id)->get();
        // dd($languages);
        return view($this->view.'.show',compact('job','work_experience','languages','experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findorFail($id);
        $work_experience = DB::table('work_experience')->where('job_id',$id)->get();
        $languages = DB::table('languages')->where('job_id',$id)->get();

        $experience = DB::table('technical_experience')->where('job_id',$id)->get();
        
        return view($this->view.'.edit',compact('job','work_experience','languages','experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $job = Job::find($id);
        $job->name              = $request->name;
        $job->email             = $request->email;
        $job->address           = $request->address;
        $job->gender            = $request->gender;
        $job->contact           = $request->contact;
        $job->ssc               = $request->ssc;
        $job->hsc               = $request->hsc;
        $job->graduation        = $request->graduation;
        $job->master_degree     = $request->master;
        $job->prefered_location = $request->prefered_location;
        $job->expected_ctc      = $request->expected_ctc;
        $job->current_ctc       = $request->current_ctc;
        $job->notice_period     = $request->notice_period;
        $job->save();
        $sr_no = $request->sr_no;

        $WorkExperienceArr = array();
                for($i=0;$i<$sr_no;$i++){
                    $WorkExperienceArr[] = array(
                        'company_name' => $request->company_name[$i],
                        'start_date'   => $request->start_date[$i],
                        'end_date'     => $request->end_date[$i],
                    );
                }
                if(!empty($WorkExperienceArr)){
                    foreach ($WorkExperienceArr as $key => $value){
                        $work_experience = DB::table('work_experience')->where('job_id',$id)->update(
                            [
                                'job_id'       => $job->id,
                                'company_name' => $value['company_name'],
                                'start_date'   => $value['start_date'],
                                'end_date'     => $value['end_date'],
                                'sr_no'        => $sr_no,
                                'created_at'   => Carbon\Carbon::now(),
                                'updated_at'   => Carbon\Carbon::now(),
                            ]
                        );
                    }   
                }
                // dd($request->all());
            $languages = DB::table('languages')->where('job_id',$id)->where('id',$request->languages_hindi_id)->update([
                    'id'       =>  $request->languages_hindi_id,
                    'job_id'   => $job->id,
                    'language' => $request->language_hindi,
                    'read'     => $request->hindi_read != null ? $request->hindi_read : 0,
                    'write'    => $request->hindi_write != null ? $request->hindi_write : 0,
                    'speak'    => $request->hindi_speak != null ? $request->hindi_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ]);
            $languages1 = DB::table('languages')->where('job_id',$id)->where('id',$request->languages_english_id)->update([
                    'id'       =>  $request->languages_english_id,
                    'job_id'   => $job->id,
                    'language' => $request->language_english,
                    'read'     => $request->english_read != null ? $request->english_read : 0,
                    'write'    => $request->english_write != null ? $request->english_write : 0,
                    'speak'    => $request->english_speak != null ? $request->english_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ]);
            $languages2 = DB::table('languages')->where('job_id',$id)->where('id',$request->languages_gujarati_id)->update([
                    'id'       =>  $request->languages_gujarati_id,
                    'job_id'   => $job->id,
                    'language' => $request->language_gujarati,
                    'read'     => $request->gujarati_read != null ? $request->gujarati_read : 0,
                    'write'    => $request->gujarati_write != null ? $request->gujarati_write : 0,
                    'speak'    => $request->gujarati_speak != null ? $request->gujarati_speak : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                ]);
            // dd($request->all());
            $technical_experience = DB::table('technical_experience')->where('job_id',$id)->where('id',$request->technology_php_id)->update([
                     'id'          => $request->technology_php_id,
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_php,
                    'experience'          => $request->php_experience != null ? $request->php_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ]);
            $technical_experience1 = DB::table('technical_experience')->where('job_id',$id)->where('id',$request->technology_mysql_id)->update([
                'id'          => $request->technology_mysql_id,
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_mysql,
                    'experience'          => $request->mysql_experience != null ? $request->mysql_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ]);
            $technical_experience2 = DB::table('technical_experience')->where('job_id',$id)->where('id',$request->technology_laravel_id)->update([
                'id'          => $request->technology_laravel_id,
                    'job_id'        => $job->id,
                    'technology_name' => $request->technology_name_laravel,
                    'experience'          => $request->laravel_experience != null ? $request->laravel_experience : 0,
                    'created_at'   => Carbon\Carbon::now(),
                    'updated_at'   => Carbon\Carbon::now(),
                  
                ]);
            return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function delete($id){

        $job = Job::find($id);
        $languages = DB::table('languages')->where('job_id',$id)->delete();
        $work_experience = DB::table('work_experience')->where('job_id',$id)->delete();
        $experience = DB::table('technical_experience')->where('job_id',$id)->delete();
        $job->delete();
        return redirect('job');   
    }
}
