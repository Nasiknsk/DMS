<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;



class CategoryController extends Controller
{
    public function addCat(Request $request)
    {
        $catName = $request->input('name');

        // Check if the category already exists
        $catCount = Categorie::where('cat_name', $request->input('name'))->count();


        if ($catCount == 0) {
            $cat = new Categorie;
            $cat->cat_name = $catName;
            $cat->save();

            return redirect('/addcat')->with('message', 'Category added successfully!');


        } else {
            return redirect('/addcat')->with('message', 'Category already exists!');
        }



    }
    public function showCat()
    {
        $cat = new Categorie;
        $cat = Categorie::all(); // Fetch all users from the database

        // Pass data to the view
        return view('task', ['categorie' => $cat]);
    }
    public function deleteCat($id)
    {
        try {
            // Find the category by ID
            $cat = Categorie::find($id);

            // Check if the category exists
            if ($cat) {
                // Delete the category
                $cat->delete();

                return redirect()->route('addcat')->with('message', 'Category deleted successfully');
            } else {
                return redirect()->route('addcat')->with('error', 'Category not found');
            }
        } catch (\Exception $e) {
            // Handle exceptions, log them, or return an error message
            return redirect()->route('addcat')->with('error', 'Error deleting category');
        }
    }

    public function displayCat()
    {
        try {
            $cat = new Categorie;
            $categories = Categorie::all();

            return view('addcat', ['categories' => $categories]);
        } catch (\Exception $e) {
            // Handle the exception, log it, or display an error message
            return view('addcat', ['categories' => []])->with('error', 'Error fetching categories');
        }
    }
    public function editCat($id)
    {

        $cat = Categorie::find($id);
        return view('editcat', ['editcat' => $cat]);
    }
    public function updateCat(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');

        // Check if the category name already exists (excluding the current category being updated)
        $existingCat = Categorie::where('cat_name', $name)->where('id', '<>', $id)->first();

        if ($existingCat) {
            // Category name already exists, return an error message
            return redirect()->route('addcat')->with('message', 'Category name already exists. Please choose another name.');

        }

        // Category name is unique, proceed with the update
        $cat = Categorie::find($id);

        if (!$cat) {
            // Handle the case where the category with the given ID is not found
            return redirect()->route('addcat')->with('message', 'Category not found.');
        }

        $cat->cat_name = $name;
        $cat->save();

        return redirect()->route('addcat')->with('message', 'Category Updated Successfully');
    }


}
