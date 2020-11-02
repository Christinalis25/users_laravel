<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Users extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';

    public function getUser($id)
    {
        return Users::find($id);
    }

    public function getAll()
    {
        return Users::where('status', 1)->get();
    }

    public function addUser(Request $request)
    {
        $user = new Users();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        if ($request->has('profession')) {
            $user->profession = $request->profession;
        }
        $user->save();
        mkdir('storage/users/' . $user->id);
    }

    public function editUser(Request $request, $id)
    {
        $user = Users::find($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        if ($request->has('profession')) {
            $user->profession = $request->profession;
        }
        $user->save();
    }

    public function deleteUser($id)
    {
        Users::where('id', $id)->update(['status' => 0]);
    }
}