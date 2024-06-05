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


    <h3 style="font-size: 35px;
    font-weight: 700;
    text-align: center;
    margin-top: 25px;
    color: #4d4d4d;">

        Add Organization Details
    </h3>

    <form wire:submit.prevent="switchToOrganizer" enctype="multipart/form-data">


        <div class="mb-4">
            <x-label for="organization_logo" value="{{ __('Organization Logo') }}" />
            <div class="mt-1 block w-full">
                <img id="organization-logo-preview"  class="">
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


    <script>
        const organizationLogoInput = document.getElementById('organization_logo');
        const organizationLogoPreview = document.getElementById('organization-logo-preview');

        organizationLogoInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (event) {
                organizationLogoPreview.src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    </script>
</div>
