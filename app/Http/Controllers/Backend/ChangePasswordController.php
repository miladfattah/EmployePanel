<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ; 
class ChangePasswordController extends Controller
{
    public function change_password(Request $request , User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => $request->password  , 
        ]);

        return to_route('users.index')->with('message' , 'رمز عبور با موفقیت  ویرایش شد');
    }
}
