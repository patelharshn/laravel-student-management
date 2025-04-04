<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function studentForm()
    {
        return view('addStudForm');
    }

    function studentInsert(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ], [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'city.required' => 'City is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
        ]);

        DB::table('students')->insert([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('addStudForm')->with('success', 'Student added successfully!');
    }

    function studentList()
    {
        $students = DB::table('students')->get();
        return view('studentList', ['students' => $students]);
    }

    function studentEdit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('studentEdit', ['data' => $student]);
    }

    function studentUpdate(Request $request)
    {
        $id = $request->input('stud_id');
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ], [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'city.required' => 'City is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
        ]);

        DB::table('students')->where('id', $id)->update([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('studentList')->with('success', 'Student updated successfully!');
    }

    function studentDelete(Request $request)
    {
        $id = $request->input('delid');
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('studentList')->with('success', 'Student deleted successfully!');
    }
}