<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     */


     public function store(Request $request)
     {
        if (Category::where('name', $request->name)->exists()) {
            return response()->json([
                'message' => 'Kategória s týmto menom už existuje'
            ], Response::HTTP_CONFLICT); // 409 Conflict
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

         $category = Category::create(['name' => $validated['name']]);
 
         return response()->json([
             'message' => 'Kategória bola úspešne vytvorená',
             'category' => $category
         ], Response::HTTP_CREATED);
     }


    /*public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories']);

        $category = Category::create(['name' => $request->name]);

        return response()->json($category, 201);
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Category::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         try {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update(['name' => $validated['name']]);

        return response()->json([
            'message' => 'Kategória bola úspešne aktualizovaná',
            'category' => $category
        ], Response::HTTP_OK);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Chyba pri aktualizácii kategórie',
            'errors' => $e->getMessage()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    }

    /*public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $request->validate(['name' => 'required|unique:categories']);

        $category->update(['name' => $request->name]);

        return response()->json($category);
    }*/

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }

    public function getByName($name)
    {
        $category = Category::getByName($name);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }
}
