<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Recipe: {{ $recipe->name }}
        </h2>
    </x-slot>


    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="py-4">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('recipes.update', ['recipe' => $recipe->rid]) }}">
                    <h4 class="card-title mb-4">Update Your Recipe</h4>
                    @csrf
                    @method('PUT')

                    @php
                    $fields = [
                    ['label'=>'Name','name'=>'name','type'=>'text'],
                    ['label'=>'Description','name'=>'description','type'=>'textarea'],
                    ['label'=>'Type','name'=>'type','type'=>'select','options'=>$types],
                    ['label'=>'Cooking Time (mins)','name'=>'cookingtime','type'=>'number'],
                    ['label'=>'Servings','name'=>'servings','type'=>'number'],
                    ['label'=>'Difficulty','name'=>'difficulty','type'=>'select','options'=>['Easy','Medium','Hard']],
                    ['label'=>'Ingredients','name'=>'ingredients','type'=>'textarea'],
                    ['label'=>'Instructions','name'=>'instructions','type'=>'textarea'],
                    ];
                    @endphp

                    @foreach ($fields as $field)
                    <div class="mb-3">
                        <label class="form-label">{{ $field['label'] }}</label>

                        @if($field['type'] === 'textarea')
                        <textarea name="{{ $field['name'] }}" class="form-control @error($field['name']) is-invalid @enderror" rows="4">{{ old($field['name'], $recipe->{$field['name']}) }}</textarea>

                        @elseif($field['type'] === 'select')
                        <select name="{{ $field['name'] }}" class="form-select @error($field['name']) is-invalid @enderror">
                            <option value="">Choose…</option>
                            @foreach($field['options'] as $opt)
                            <option value="{{ $opt }}" @selected(old($field['name'], $recipe->{$field['name']}) == $opt)>
                                {{ $opt }}
                            </option>
                            @endforeach
                        </select>
                        @else
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
                            value="{{ old($field['name'], $recipe->{$field['name']}) }}"
                            class="form-control @error($field['name']) is-invalid @enderror">
                        @endif

                        @error($field['name'])
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label">Replace Image (optional)</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        @if ($recipe->image)
                        <div class="mt-2">
                            <small>Current Image:</small><br>
                            <img src="{{ asset('storage/recipes/' . $recipe->image) }}" class="img-fluid rounded" style="max-width: 200px;" alt="Current Image">
                        </div>
                        @endif
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Recipe</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
</x-app-layout>