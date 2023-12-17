<?php

namespace App\Http\Controllers;

use App\Mail\NewAccount;
use App\Mail\Protocol;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class NewAccountMailController extends Controller
{
    public function post(Request $request)
    {

        $userID = $request->get("user_id");
        $user = User::find($userID);
        $data = [ 'user'=>$user];
        redirect('new_account')->with($userID);

        Mail::to($user)->send(new NewAccount($data));
        return  '';


    }
    public function edit(User $user): View
    {
        return view('users.change_password',[
            'user' => $user

        ]);
    }


}
