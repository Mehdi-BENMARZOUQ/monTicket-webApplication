<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


    @if (session()->has('message'))
        <div class="mt-4">
            @if( session('message')  == 'You must be an organizer to create an event.')
                <p class="text-sm text-red-600">{{ session('message') }}</p>
            @else
                <p class="text-sm text-green-600">{{ session('message') }}</p>
            @endif
        </div>
    @endif

        @if (Auth::user()->role == 'event_organizer'|| AUTH::user->role == 'admin')
            <a href="{{ route('events.create') }}" class="text-sm text-gray-700 underline d-flex">
                <p>
                    Create event
                </p>

            </a>
        @endif

    Add Organization Details

    <form wire:submit.prevent="switchToOrganizer" enctype="multipart/form-data">


        <div class="mb-4">
            <x-label for="organization_logo" value="{{ __('Organization Logo') }}" />
            <div class="mt-1 block w-full">
                @if ($existing_logo)
                    <img src="{{ Storage::url($existing_logo) }}" alt="Organization Logo" class="h-20 w-20 object-cover mb-2">
                @else
                    <img src="{{ asset('default-logo.png') }}" alt="Default Logo" class="h-20 w-20 object-cover mb-2">
                @endif
            </div>
            <x-input id="organization_logo" type="file" class="mt-1 block w-full" wire:model="organization_logo" />
            <x-input-error for="organization_logo" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-label for="organization_name" value="{{ __('Organization Name') }}" />
            <x-input id="organization_name" type="text" class="mt-1 block w-full" wire:model.defer="organization_name" required />
            <x-input-error for="organization_name" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button wire:loading.attr="disabled">
                {{ __('Switch to Organizer') }}
            </x-button>
        </div>
    </form>


</div>
