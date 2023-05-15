<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Eloquent\GeneralRepository;

class CategoryController extends Controller
{
    protected $genericRepository;

    public function __construct(GeneralRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->genericRepository->all(new Category());

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->genericRepository->create(new Category(), $request->validated());

        return redirect()->back()->with($category ? "success" : "error", true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = $this->genericRepository->update($category, $category->id, $request->validated());

        return redirect()->back()->with($category ? "success" : "error", true);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
