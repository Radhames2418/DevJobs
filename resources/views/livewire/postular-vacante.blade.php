<div class="bg-gray-100 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    <form class="w-96 mt-5">
        <div class="mb-4">
            <x-text-input for="cv" class="bg-gray-100 w-full border-none" :value="__('Curriculum o Hoja de Vida (PDF)')" />
            <x-text-input id="cv"  type="file" accept=".pdf"  class="block mt-1 w-full border-none" />
        </div>
    </form>
</div>
