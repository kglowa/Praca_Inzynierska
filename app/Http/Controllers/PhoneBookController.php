<?php

namespace App\Http\Controllers;
use App\Models\Equipment;
use Illuminate\Http\Response;

use JeroenDesloovere\VCard\VCard;

use App\Models\User;
use ZanySoft\Zip\Zip;
use ZipArchive;


class PhoneBookController extends Controller
{


   public function index( User $user){

       foreach (User::all() as $user) {
           $vcard = new VCard();

           $lastname = $user->lastname;
           $firstname = $user->firstname;
           $additional = '';
           $prefix = '';
           $suffix = '';


           $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
           $vcard->addCompany($user->departments->name,$user->departments->city );
           $vcard->addAddress(null, $user->departments->number , $user->departments->location ,$user->departments->city , null);
           $vcard->addJobtitle($user->positions->name);
           $vcard->addEmail($user->email);
           $vcard->addPhoneNumber($user->phone, 'PREF;WORK');


           $vcard->setSavePath(public_path('vcf'));
           $vcard->save();




       }



   }
    public function edit(Equipment $equipment): View
    {

        return view('equipment.index');

    }
}
