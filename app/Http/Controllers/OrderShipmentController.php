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
       // $order = Request::createFromGlobals()->get("user_id");
        //$user = DB::table('equipment')->where('user_id', $order)->first();
        dd($request->all());
//        var_dump($request->post("user_id"));
//        var_dump($request->only(["user_id"]));
//        var_dump($request->user_id);
$userID = 1;
$user = User::find($userID);

//        dd($request->all());
        Mail::to($user)->send(new Protocol());
        return ' ';


    }
}
