<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class giangvienHomes extends Controller
{
    public function viewDashboard()
    {
        return view('tkgiangvienHomes.dashboard');
    }
    public function viewdanhsachsv(){

        return view('tkgiangvienHomes.danhsachsv');
    }
    public function viewxuatbaocao(){
        return view('tkgiangvienHomes.xuatbaocao');
    }
}
