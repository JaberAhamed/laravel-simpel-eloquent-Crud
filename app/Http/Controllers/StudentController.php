<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $student = Student::all();
     return view('studentview.allstudent',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('studentview.student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valide = $request->validate([
        'name' => 'required|max:30',
        'email' => 'required|max:50',
        'phone' => 'required|max:12|min:11',
        
        ]);

       $student = new Student;
       $student->name = $request->name;
       $student->email = $request->email;
       $student->phone = $request->phone;
       $student->save();
      $notification = array(
                    'message' => 'User Info Inserted Successfully !',
                    'info-type' => 'success'
                );
      return Redirect()->to('student')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $student = Student::findorfail($id);

      return view('studentview.singleStudentPage',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student  = Student::findorfail($id);

    return view('studentview.editform',compact('student'));
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

        $student  = Student::findorfail($id);
        
       $student->name = $request->name;
       $student->email = $request->email;
       $student->phone = $request->phone;
       $student->save();
       $notification = array(
                    'message' => 'User info Update Successfully !',
                    'info-type' => 'success'
                );
        return Redirect()->to('student')->with($notification);
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

        $student  = Student::findorfail($id);
        $student->delete();
        $notification = array(
                    'message' => 'User info Delete Successfully !',
                    'info-type' => 'success'
                );
        return Redirect()->to('student')->with($notification);
    }
}
