<x-app-layout> 
    <br><br>
    <x-slot name="header">
        <h2 class="font-weight-semibold h4 text-light">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="form-container mx-left">
            <div class="pariDiv mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="pariDiv mb-4">
                @include('profile.partials.update-password-form')
            </div>

            <div class=" bg-danger text-dark rounded mb-4 ">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
