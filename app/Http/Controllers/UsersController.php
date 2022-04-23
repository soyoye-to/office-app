<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Added the hash and user model to be able to hash the password and access the database respectively
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function changePassword(Request $request) {
        // dd($request->input("oldPassword"));
        //selecting all where user.id is equal to that of the authenticated user
        $user = User::where('id', auth()->user()->id)->first();
        //encrypting the ui password and checking it with the password coming from the database
        if (!Hash::check($request->input("oldPassword"), $user->password)) {
            return response(['error' =>'Invalid Old Password'], 404);
        }
        //Updating password in the database
        $changed = $user->update([
            'password'=> Hash::make($request->passowrd)
        ]);
        if ($changed) {
            return response(['success' =>'Pasword Changed'], 200);
        }else {
            return 'Unable to update password';

        }
    }

}
