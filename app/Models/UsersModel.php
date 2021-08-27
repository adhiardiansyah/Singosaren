<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersModel extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    public function allData()
    {
        return DB::table('users')->select('users.*', 'auth_groups.role')->join('auth_groups', 'auth_groups.id', '=', 'users.id_group')->get();
    }

    public function getData()
    {
        return DB::table('users')->where('id', Auth::user()->id)->first();
    }

    public function getUser($id)
    {
        return DB::table('users')->select('users.*', 'auth_groups.role')->join('auth_groups', 'auth_groups.id', '=', 'users.id_group')->where('users.id', $id)->first();
    }

    public function getRole()
    {
        return DB::table('auth_groups')->get();
    }

    public function ubahRole($id, $data)
    {
        DB::table('users')->where('id', $id)->update($data);
    }
}
