<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\RecipeList;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class RecipeListController extends Controller
{

    protected $user;

    public function __construct()
    {

    }

    public function index()
    {
        if (auth()->user()) {
            $recipe_lists = RecipeList::all()->toArray();
            return response()->json([
                'success' => true,
                'recipeLists' => $recipe_lists,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'recipeList' => $recipe_lists
            ]);
        }
    }

     public function store(Request $request)
    {
        $input = $request->all();
        if(auth()->user()) {
            $list = RecipeList::create(['title' => $request->input('title'), 'user_id' => auth()->user()->id]);
            return response()->json([
                'success' => true,
                'recipeList' => $list
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'sorry, recipe list could not be added'
            ]);
        }
    }

    public function delete(Request $request) 
    {
        
    }

    public function update(Request $request)
    {

    }
}
