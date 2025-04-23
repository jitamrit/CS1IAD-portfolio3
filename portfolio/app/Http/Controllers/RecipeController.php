<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function create()
    {
        $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'Others'];
        return view('recipes.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'type'         => 'required|in:French,Italian,Chinese,Indian,Mexican,Others',
            'cookingtime'  => 'required|integer|min:1',
            'servings'     => 'nullable|integer|min:1',
            'difficulty'   => 'nullable|in:Easy,Medium,Hard',
            'ingredients'  => 'required|string',
            'instructions' => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

       $data['uid'] = Auth::user()->uid;

        Recipe::create($data);

        return redirect()->route('dashboard')->with('success', 'Recipe added successfully!');
    }

    public function edit(Recipe $recipe)
    {

        if ($recipe->uid !== auth()->user()->uid) {
            abort(403, 'Unauthorized action.');
        }

       $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'others'];

        return view('edit', compact('recipe', 'types'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'cookingtime' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
        ]);

        $recipe->update($data);

        return redirect()->route('dashboard')->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('dashboard')->with('success', 'Recipe deleted successfully!');
    }
}
