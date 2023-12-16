<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Category;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        if(auth()->user()->hasRole('administrator')){
            $equipments = Equipment::all();

            return view('equipment.index',[
            'equipments' => Equipment::with('users','categories')->get()
        ]);}
        else{
            $user = auth()->user();
            $equipments = Equipment::where('user_id', $user->id)->get();
            return view('equipment.user_index',[
                'equipments' => Equipment::where('user_id', $user->id)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipment.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $equipment = new Equipment($request->all());

        $equipment-> save();
        return  redirect(route('equipment.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipment $equipment)
    {
        return view('equipment.edit',[
            'equipment' => $equipment

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipment $equipment, User $user)
    {
        $equipment->fill($request->all());
        $equipment->save();

        return  redirect(route('equipment.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipment $equipment)
    {
        try{
            $equipment->delete();
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
    public function add_user(Equipment $equipment)
    {
        return view('equipment.add_user',[
            'equipment' => $equipment

        ]);
    }

}
