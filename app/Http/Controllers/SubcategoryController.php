<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use DataTables;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $subcategories = Subcategory::with('category')->get();
            return DataTables::of($subcategories)
                ->addIndexColumn()
                ->addColumn('category', function($row) {
                    return $row->category->name;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        $categories = Category::all();
        return view('admin.subcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategories.index', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name,' . $id,
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $subCategory = Subcategory::findOrFail($id);
        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = Subcategory::findOrFail($id);
        $subCategory->delete();
    
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
