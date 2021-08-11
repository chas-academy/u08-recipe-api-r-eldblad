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
    public function show($id)
    {
        $recipeList = $this->user->recipeList()->find($id);
        if (!$recipeList) {
            return response()->json([
                'success' => false,
                'message' => "Recipes list with id $id can't be found",
            ], 400);
        }
        return $recipeList;
    }

     public function store(Request $request)
    {
        $recipeList = new RecipeList();
        $recipeList->title = $request->title;

        if ($this->user->recipeLists()->save($recipeList)) {
            return response()->json([
                'success' => true,
                'recipeList' => $recipeList
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
