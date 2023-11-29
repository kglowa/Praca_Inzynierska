<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $category = Category::with('equipments')->get();
        return view('category.index',[
            'category'=>$category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('category.create');


    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $category = new Category($request->all());
        $category -> save();
        return  redirect(route('equipment.index'));
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
    public function edit(Category $category): View
    {
        return view('category.edit',[
            'category' => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->fill($request->all());
        $category->save();
        return  redirect(route('users'));

    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
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
