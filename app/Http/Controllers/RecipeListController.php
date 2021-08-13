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
 /*    public function show($id)
    {
        $recipeList = $this->user->recipeClass()->find($id);
        if (!$recipeList) {
            return response()->json([
                'success' => false,
                'message' => "Recipes list with id $id can't be found",
            ], 400);
        }
        return $recipeList;
    } */

     public function __construct()
    {

    }

     public function store(Request $request)
    {
        return response()->json(auth()->user());
        $input = $request->all();
        if(auth()->user()) {
            $list = RecipeList::create(['title'->$title, 'user_id'->auth()->user()->id]);
            $input['user_id'] = $list->id;
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
