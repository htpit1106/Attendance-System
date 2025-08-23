<?php

namespace App\Http\Controllers;

use App\Models\Lophocphan;
use App\Models\User;
use Illuminate\Http\Request;

class adminsHome extends Controller
{

    public function viewtksv(){
        $students = User::where('role', 'student')->get();
        return view('adminhomes/taikhoansv', compact('students'));
    }
    public function viewtkgv(){
        $giangviens =  User::where('role', 'teacher')->get();
        return view('adminhomes/taikhoangv', compact('giangviens'));
    }
    public function viewmonhoc_lophp(){
         $lophocphans = Lophocphan::all();
        return view('adminhomes/monhoc_lophp',  compact('lophocphans'));
    }
    public function viewdulieudiemdanh(){
        $students = [
            ['id' => 1, 'name' => 'Nguyễn Văn A', 'class' => '1' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 2, 'name' => 'Nguyễn Văn B', 'class' => '2' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 3, 'name' => 'Nguyễn Văn C', 'class' => '3' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 4, 'name' => 'Nguyễn Văn D', 'class' => '4' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 5, 'name' => 'Nguyễn Văn E', 'class' => '5' , 'email' => '', 'status' => 1,  'active'=> '1'],
        ];
        return view('adminhomes/dulieudiemdanh', compact('students'));
    }
    public function viewgiamsat_nhandien(){
        $students = [ ['id' => 1, 'name' => 'Nguyễn Văn A', 'class' => '1' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 2, 'name' => 'Nguyễn Văn B', 'class' => '2' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 3, 'name' => 'Nguyễn Văn C', 'class' => '3' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 4, 'name' => 'Nguyễn Văn D', 'class' => '4' , 'email' => '', 'status' => 1,  'active'=> '1'],
            ['id' => 5, 'name' => 'Nguyễn Văn E', 'class' => '5' , 'email' => '', 'status' => 1,  'active'=> '1'],
    ];
        return view('adminhomes/giamsat_nhandien', compact('students'));
    }

}
