<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class DashboardController extends Controller
{
    public function index()
    {
        $myRecipes = Recipe::where('uid', auth()->user()->uid)->latest()->get();

        return view('dashboard', compact('myRecipes'));
    }
}
