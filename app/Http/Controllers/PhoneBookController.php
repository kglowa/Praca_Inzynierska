<?php

namespace App\Http\Controllers;
use App\Models\Equipment;
use Illuminate\Http\Response;

use JeroenDesloovere\VCard\VCard;

use App\Models\User;
use ZipArchive;
use File;

class PhoneBookController extends Controller
{


   public function Create_Vcards( User $user){
       File::delete(public_path('KsiążkaTelefoniczna.zip'));

       File::makeDirectory(public_path('vcf'));

       foreach (User::all() as $user) {
           $vcard = new VCard();
           $lastname = $user->lastname;
           $firstname = $user->name;
           $additional = '';
           $prefix = '';
           $suffix = '';
           $vcard->setFilename($lastname);
           $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
           $vcard->addCompany($user->departments->name,$user->departments->city );
           $vcard->addAddress(null, $user->departments->number , $user->departments->location ,$user->departments->city , null);
           $vcard->addJobtitle($user->positions->name);
           $vcard->addEmail($user->email);
           $vcard->addPhoneNumber($user->phone, 'PREF;WORK');
           $vcard->setSavePath(public_path('vcf'));
           $vcard->save();
       }
       $zip = new ZipArchive;
       $fileName = 'KsiążkaTelefoniczna.zip';
       if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
       {
           $files = File::files(public_path('vcf'));

           foreach ($files as $key => $value) {
               $relativeNameInZipFile = basename($value);
               $zip->addFile($value, $relativeNameInZipFile);
           }

           $zip->close();
       }
       File::deleteDirectory(public_path('vcf'));

       return response()->download(public_path($fileName));
   }

}
