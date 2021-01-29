<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;

class UsersController extends Controller
{
    public $view = 'users';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        if($users){
            return view($this->view.'.index',compact('users'));
        }else{
            return "Records not Found";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();

        return view($this->view.'.create',compact('users'));
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
                'name'          => 'required',
                'father_name'   => 'required',
                'mother_name'   => 'required',
                'aadhar'        => 'required|min:12',
                'birth_date'    => 'required',
                'f_name'        => 'required',
                'f_father_name' => 'required',
                'f_mother_name' => 'required',
                'f_aadhar'      => 'required|min:12',
                'f_birth_date'  => 'required',
                'm_name'        => 'required',
                'm_father_name' => 'required',
                'm_mother_name' => 'required',
                'm_aadhar'      => 'required|min:12',
                'm_birth_date'  => 'required',
                'c_name'        => 'required',
                'c_father_name' => 'required',
                'c_mother_name' => 'required',
                'c_aadhar'      => 'required|min:12',
                'c_birth_date'  => 'required',
            ]);
          /* if ($validated->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validated->getMessageBag()->toArray()

                ), 422);
            }*/
            $users              = new User;
            $users->name        = $request->name;
            $users->father_name = $request->father_name;
            $users->mother_name = $request->mother_name;
            $users->child_name  = $request->child_name;
            $users->aadhar      = $request->aadhar;
            $users->birth_date  = Carbon::parse($request->birth_date)->format('Y-m-d');
            $users->save();
        
            $fatherDetails = DB::table('father_details')->insert(
                 array(
                         'user_id'     =>   $users->id,
                         'name'        =>   $request->f_name,
                         'father_name' =>   $request->f_father_name,
                         'mother_name' =>   $request->f_mother_name,
                         'child_name'  =>   $request->f_child_name,
                         'aadhar'      =>   $request->f_aadhar,
                         'birth_date'  =>   Carbon::parse($request->f_birth_date)->format('Y-m-d'),
                         'created_at'  =>   Carbon::now(),
                         'updated_at'  =>   Carbon::now(),
                 )
            );
        
            $motherDetails = DB::table('mother_details')->insert(
                 array(
                         'user_id'     =>   $users->id,
                         'name'        =>   $request->m_name,
                         'father_name' =>   $request->m_father_name,
                         'mother_name' =>   $request->m_mother_name,
                         'child_name'  =>   $request->m_child_name,
                         'aadhar'      =>   $request->m_aadhar,
                         'birth_date'  =>    Carbon::parse($request->m_birth_date)->format('Y-m-d'),
                         'created_at'  =>   Carbon::now(),
                         'updated_at'  =>   Carbon::now(),
                 )
            );
        
            $childDetails = DB::table('child_details')->insert(
                 array(
                         'user_id'     =>   $users->id,
                         'name'        =>   $request->c_name,
                         'father_name' =>   $request->c_father_name,
                         'mother_name' =>   $request->c_mother_name,
                         'child_name'  =>   $request->c_child_name,
                         'aadhar'      =>   $request->c_aadhar,
                         'birth_date'  =>    Carbon::parse($request->c_birth_date)->format('Y-m-d'),
                         'created_at'  =>   Carbon::now(),
                         'updated_at'  =>   Carbon::now(),
                 )
            );
      
        
         return response()->json(['success' => true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        $father_details = DB::table('father_details')->where('user_id',$id)->first();
        $mother_details = DB::table('mother_details')->where('user_id',$id)->first();
        $child_details = DB::table('child_details')->where('user_id',$id)->first();
        
        return view($this->view.'.show_details',compact('users','father_details','mother_details','child_details'));
    }
    
    public function FatherDetails(Request $request)
    {
        
        $users = DB::table('father_details')->where('id', $request->fid )->first();
        
        
        return view($this->view.'.father_details',compact('users'));
    }

    public function MotherDetails(Request $request)
    {
        
        $users = DB::table('mother_details')->where('id', $request->mid )->first();
        
        
        return view($this->view.'.mother_details',compact('users'));
    }

    public function ChildDetails(Request $request)
    {
        
        $users = DB::table('child_details')->where('id', $request->cid )->first();
        
        
        return view($this->view.'.child_details',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
