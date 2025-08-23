<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = \App\Models\Lophoc::all(); // Get all classes for the dropdown
        return view('students.create', compact('classes')); // Return view to create student
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'masv' => 'required|string|max:255|unique:users', // Validate student ID
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'class_id' => 'required|exists:lophocs,id', // Validate class_id
        ]);

        User::create([
         
            'masv' => $request->masv,
            'name' => $request->name,
            'email' => $request->email,
            'status' => 1, // Active status
            'password' => bcrypt($request->password), // Hash the password
            'role' => 'student', // Set role to student
            'class_id' => $request->class_id, // Assign class ID
            'email_verified_at' => now(), // Set email verification timestamp
   
        ]);
        return redirect()->route('adminhomes.taikhoansv')->with('success', 'Tài khoản sinh viên đã được tạo thành công.');

    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
