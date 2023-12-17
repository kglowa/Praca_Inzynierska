<?php

namespace App\Http\Controllers;
use App\Models\Equipment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\LaravelVcard\Facades\Vcard;
use Laratrust\Traits\HasRolesAndPermissions;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */

    public function index()
    {

        if(auth()->user()->hasRole('administrator')){
            $users = User::all();

            return view('users.index',[
                'users' => User::with('departments','equipments','positions')->get()
            ]);}
        else{
            $users = User::all();
            return view('users.user_index',[
                'users' => User::with('departments','equipments','positions')->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('users.create');


    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $user = new User($request->all());

        $user -> save();
        $user->addRole($request->get('role_id'), $user->id);
        return  redirect(route('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit',[
            'user' => $user

    ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->fill($request->all());
        $user->save();

        return  redirect(route('users'));

    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            return response()->json([
                'status'=>'success'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'=>'error',
                'message'=>'Wystąpił błąd!'

            ])->setStatusCode(500);
        }




    }

}
