<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Protocol;
use App\Models\Equipment;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderShipmentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function post(Request $request)
    {

        $userID = $request->post("user_id");
        $user = User::find($userID);
        Mail::to($user)->send(new Protocol());
        return ' ';


    }
}
