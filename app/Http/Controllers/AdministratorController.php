<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministratorController extends Controller
{
    public function index() 
    {
        $countUsers = DB::table('users')->count();
        return view('administrator.index', [
            'countUsers' => $countUsers
        ]);
    }

    public function manageUsers(){
        $users = DB::table('users')->select('id','name','email')->get();
        dd($users);
        return view('administrator.manage-users', [
            'users' => $users
        ]);
    }
}
