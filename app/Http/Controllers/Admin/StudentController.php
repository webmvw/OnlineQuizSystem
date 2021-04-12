<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
    	$allData = User::where('role_id', '2')->orderBy('id', 'desc')->get();
    	return view('admin.pages.student.view-student', compact('allData'));
    }


	 /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function add(){
    	return view('admin.pages.student.add-student');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // start generate student id number
        $student = User::where('role_id', '2')->orderBy('id','desc')->get()->count();
        if($student == 0){
            $firstReg = 0;
            $studentId = $firstReg+1;
            if($studentId<10){
                $id_no = '000'.$studentId;
            }elseif($studentId<100){
                $id_no = '00'.$studentId;
            }elseif ($studentId<1000) {
                $id_no = '0'.$studentId;
            }
        }else{
            $student = User::where('role_id', '2')->orderBy('id','desc')->first()->id;
            $studentId = $student+1;
            if($studentId<10){
                $id_no = '000'.$studentId;
            }elseif($studentId<100){
                $id_no = '00'.$studentId;
            }elseif ($studentId<1000) {
                $id_no = '0'.$studentId;
            }
        }
        $id_code = rand(0000, 9999);
        $final_id_no = $id_code.$id_no;
        // end generate student id number

        // start insert student data in user model
        $user = new User;
        $code = rand(0000, 9999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($code);
        $user->mobile = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->id_no = $final_id_no;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->code = $code;
        $user->role_id = '2';
        $user->status = '1';
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/students/',$filename);
            $user->image = $filename;
        }
        $user->save();
        // end insert student data in user model

        return redirect()->route('student.view')->with('success', 'Student Registration Successfully!!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$getStudent = User::find($id);
        return view('admin.pages.student.edit-student', compact('getStudent'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    	$user = User::find($id);
    	$user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        if($request->hasfile('image')){
        	if(File::exists('img/students/'.$user->image)){
                File::delete('img/students/'.$user->image);
            }
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('img/students/',$filename);
            $user->image = $filename;
        }
        $user->save();
    	return redirect()->route('student.view')->with('success', 'Student Updated Success');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
    	$user = User::find($id);
    	if(File::exists('img/students/'.$user->image)){
            File::delete('img/students/'.$user->image);
        }
    	$user->delete();
    	return redirect()->route('student.view')->with('success', 'Student Deleted Success');
    }



}
