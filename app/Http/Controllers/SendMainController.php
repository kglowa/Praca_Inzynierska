<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Protocol;
use App\Models\Equipment;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SendMainController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function post(Request $request)
    {

        $userID = $request->get("user_id");
        $user = User::find($userID);
        $data = ['user'=>$user];
        redirect('protocol')->with($userID);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('Mails/protocol', $data);

        $data["pdf"] = $pdf;
        Mail::to($user)->send(new Protocol($data));
        return  '';


    }




}