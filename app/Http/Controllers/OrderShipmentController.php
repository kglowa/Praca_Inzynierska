<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Protocol;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderShipmentController extends Controller
{
    /**
     * Ship the given order.
     */
    public function store(Request $request): RedirectResponse
    {
        $order = Request::createFromGlobals()->get("user_id");
        //$user = DB::table('equipment')->where('user_id', $order)->first();
        dd($request->all());
        Mail::to($request->user())->send(new Protocol($order));
        return redirect('equipment/');
    }
}
