<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpiceCloud Kitchens</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <br>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in") }}
                        {{ Auth::user()->username }}

                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="" style="max-width:700px;">
            <div class="card-body">
                <h2 class="card-title mb-4">Add New Recipe</h2>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @php
                $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'Others'];
                @endphp
                <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="pariDiv">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                        @error('name') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="description">Description</label>
                        <textarea name="description" required>{{ old('description') }}</textarea>
                        @error('description') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="type">Cuisine Type</label>
                        <select name="type" required>
                            <option value="">Select Type</option>
                            @foreach($types as $type)
                            <option value="{{ $type }}" @selected(old('type')==$type)>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('type') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="cookingtime">Cooking Time (minutes)</label>
                        <input type="number" name="cookingtime" value="{{ old('cookingtime') }}" required>
                        @error('cookingtime') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="servings">Servings</label>
                        <input type="number" name="servings" value="{{ old('servings') }}">
                        @error('servings') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="difficulty">Difficulty</label>
                        <select name="difficulty">
                            <option value="">Select Difficulty</option>
                            <option value="Easy" @selected(old('difficulty')=='Easy' )>Easy</option>
                            <option value="Medium" @selected(old('difficulty')=='Medium' )>Medium</option>
                            <option value="Hard" @selected(old('difficulty')=='Hard' )>Hard</option>
                        </select>
                        @error('difficulty') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="ingredients">Ingredients</label>
                        <textarea name="ingredients" required>{{ old('ingredients') }}</textarea>
                        @error('ingredients') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="instructions">Instructions</label>
                        <textarea name="instructions" required>{{ old('instructions') }}</textarea>
                        @error('instructions') <div>{{ $message }}</div> @enderror
                    </div>

                    <div class="pariDiv">
                        <label for="image">Image</label>
                        <input type="file" name="image">
                        @error('image') <div>{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn bg-success">Add Recipe</button>
                </form>

            </div>
        </div>

        <div>



            <h3>Your Recipes</h3>

            @foreach ($myRecipes as $recipe)
            <div class="myRecipes card mb-3 p-3">
                <h5>{{ $recipe->name }}</h5>
                <p>{{ Str::limit($recipe->description, 100) }}</p>
                <small>Cuisine: {{ $recipe->type }} | Servings: {{ $recipe->servings }} | Difficulty: {{ $recipe->difficulty }}</small>

                <div class="mt-3 d-flex gap-2">
                    <!-- Edit Button -->
                    <a href="{{ route('recipes.edit', ['recipe' => $recipe->rid]) }}" class="btn3 btn-sm btn-warning">Edit</a>


                    <!-- Delete Form -->
                    <div class="removeAllStyle">
                        <form action="{{ route('recipes.destroy', $recipe->rid) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class=" btn3 btn-sm btn-danger">Delete</button>
                        </form>

                    </div>

                </div>
            </div>
            @endforeach



        </div>
        <br><br>

    </x-app-layout>





</body>

</html>