<div class="bg-gray-100 mt-10 flex flex-col justify-center items-center">

    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if(session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm">
            {{ session('mensaje')  }}
        </div>
    @else
        <form wire:submit.prevent="postularme" class="w-96 mt-5">
            <div class="mb-4">
                <x-text-input for="cv" class="bg-gray-100 w-full border-none" :value="__('Curriculum o Hoja de Vida (PDF)')" />
                <x-text-input id="cv" wire:model="cv"  type="file" accept=".pdf"  class="block mt-1 w-full border-none" />

                <x-input-error :messages="$errors->get('cv')"
                               class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
            </div>

            <x-primary-button class="my-5">
                {{ __('postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>
