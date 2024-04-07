<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest as RequestsStoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.category.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.category.index', ['categories' => Category::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'isActive' => ['boolean']
        ]);
        

        Category::create($request->all());

        return to_route('category.index')->with('success', 'Categorie ajoute avec succes');
    }
    // public function store(StoreCategoryRequest $request)
    // {
    //     $request->validated($request->validated());

    //     Category::create($request->all());

    //     return to_route('category.index')->with('success', 'Categorie ajoute avec succes');

    // }

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
    public function edit(Category $category,string $id)
    {
        return view('back.category.create', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
