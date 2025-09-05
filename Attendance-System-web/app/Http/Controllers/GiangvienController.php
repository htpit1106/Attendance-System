<?php

namespace App\Http\Controllers;

use App\Models\Giangvien;
use App\Models\User;
use Illuminate\Http\Request;

class GiangvienController extends Controller
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
        $monhocs = \App\Models\Monhoc::all();
        return view('giangviens.create', compact('monhocs'));
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
            'khoa' => 'required|string|max:255',
            'monhoc_id' => 'nullable|exists:monhocs,id',
        ]);

        User::create([
         
            'masv' => $request->masv,
            'khoa' => $request->khoa,
            'status' => 1, // Active status
            'name' => $request->name,
            'email' => $request->email,
            'monhoc_id' => $request->monhoc_id,
            'password' => bcrypt($request->password), // Hash the password
            'role' => 'teacher', // Set role to student
            'class_id' => $request->class_id, // Assign class ID
            'email_verified_at' => now(), // Set email verification timestamp
   
        ]);
        return redirect()->route('adminhomes.taikhoangv')->with('success', 'Tài khoản giảng viên đã được tạo thành công.');
    }

    public function getByIdMonhoc($id){
        $giangviens = User::where('role', 'teacher')->where('monhoc_id', $id)->get();
        return response()->json($giangviens);
    }

    /**
     * Display the specified resource.
     */
    public function show(Giangvien $giangvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Giangvien $giangvien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Giangvien $giangvien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Giangvien $giangvien)
    {
        //
    }
}
