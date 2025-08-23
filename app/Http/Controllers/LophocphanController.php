<?php

namespace App\Http\Controllers;

use App\Models\Lophocphan;
use Illuminate\Http\Request;

class LophocphanController extends Controller
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
        // giang vien mon hoc
        // get user role teacher
        return view('lophocphans.create', compact('monhocs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'malophp' => 'required|unique:lophocphans,malophp',
            'monhoc_id' => 'required|exists:monhocs,id',
            'giangvien_id' => 'required|exists:users,id',
            'tenlophp' => 'required|string|max:255',
            'mota' => 'nullable|string',
            'sotinchi' => 'required|integer|min:1|max:10',
            'ngaybatdau' => 'required|date',
            'ngayketthuc' => 'required|date|after:ngaybatdau',
        ]);

        Lophocphan::create($request->all());

        return redirect()->route('adminhomes.monhoc_lophp')->with('success', 'Lớp học phần đã được tạo thành công.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lophocphan $lophocphan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lophocphan $lophocphan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lophocphan $lophocphan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lophocphan $lophocphan)
    {
        //
    }
}
