<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpiceCloud Kitchens-Recipe</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.js') }}"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


</head>

<body>
    <div>
        @include('layouts.default')
    </div>

    <h1>Recipe List</h1>


    <div id="recipeContainer">
        <input type="text" id="searchBox" class="search-input" placeholder="Search by name or cuisine...">

        @foreach($recipe as $r)
        @php
        $recipeData = [
        addslashes($r->name),
        addslashes($r->type),
        $r->Cookingtime,
        addslashes($r->ingredients),
        addslashes($r->instructions),
        addslashes($r->user->username),
        addslashes($r->description),
        $r->servings,
        $r->difficulty
        ];
        @endphp

        <div class="recipe-card" onclick='showModal(...@json($recipeData))'>
            <div class="recipeImg">
                <img src="images/{{ $r->image }}" class="recipeImg" alt="{{ $r->image }}">
            </div>
            <div class="recipeContent">
                <h3>{{ $r->name }}</h3>
                <p><strong>Cuisine: </strong>{{ $r->type }}</p>
                <p><strong>Cooking Time:</strong> {{ $r->Cookingtime }} minutes</p>
                <i>
                    <p>{{ $r->description }}</p>
                </i>
            </div>
        </div>
        @endforeach

    </div>


    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('dashboard') }}" class="btn3">Add More Recipes</a>
    </div>

    <!-- Recipe Detail Modal -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>

            <h2 id="modalTitle"></h2>
            <hr>
            <p><strong>Cuisine:</strong> <span id="modalCuisine"></span></p>
            <p><strong>Cooking Time:</strong> <span id="modalTime"></span></p>
            <p><strong>Servings:</strong> <span id="modalServ"></span></p>
            <p><strong>Difficulty:</strong> <span id="modalDiff"></span></p>
            <hr>
            <p><strong>Description:</strong></p>
            <p id="modalDesc"></p>
            <p><strong>Ingredients:</strong></p>
            <p id="modalIngredients"></p>
            <p><strong>Instructions:</strong></p>
            <p id="modalInstructions"></p>
            <hr>
            <p><strong>By:</strong> <span id="modalUser"></span></p>
        </div>

    </div>







    <footer>
        @include('layouts.footer')
    </footer>



</body>

</html>