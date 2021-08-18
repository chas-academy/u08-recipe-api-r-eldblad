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
            return $recipe_lists;
        } else {
            return response()->json([
                'success' => false,
                'message' => "No recipe lists found",
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

    public function delete($id) 
    {
        if(auth()->user()) {
            $recipeList = RecipeList::find($id);
            $recipeList->delete();
            return $recipeList;
        } else {
            return response()->json([
                'success' => false,
                'message' => 'The recipe list didnt get deleted'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()) {
        $recipeList = RecipeList::find($id);
        $recipeList->update($request->all());
        return $recipeList;
        } else {
            return response()->json([
                'success' => false,
                'message' => 'The recipe list didnt get updated'
            ]);
        }
    }
}
