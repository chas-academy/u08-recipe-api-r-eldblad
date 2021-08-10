<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use Illuminate\Http\Request;
use Validator;

class RecipeListController extends Controller
{

    protected $user;
    public function index(Request $request)
    {
        $recipe_list = auth()->user()->recipeLists;    
        return response()->json($recipe_list);
    }

    public function store(Request $request)
    {

    }

    public function delete(Request $request) 
    {

    }

    public function update(Request $request)
    {

    }
}
