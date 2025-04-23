<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;

Route::get('/', function () {
    return view('welcome');
})->name("main");

Route::get('/testdb', function () {
    return \App\Models\User::all();
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/create-recipe', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/dashboard/store-recipe', [RecipeController::class, 'store'])->name('recipes.store');

    // ✅ Add edit/update/delete
    Route::get('/dashboard/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/dashboard/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/dashboard/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/recipe', function () {
    $recipe = Recipe::all();
    return view('recipe', compact('recipe'));
})->name('recipe');

Route::get('/session-test', function (\Illuminate\Http\Request $request) {
    $oldValue = session('test');
    session(['test' => 'hello']);
    return response()->json([
        'old_value' => $oldValue,
        'new_value' => session('test'),
        'session_id' => $request->session()->getId(),
    ]);
});

require __DIR__.'/auth.php';
