<form class="md:w-1/2 space-y-8" wire:submit.prevent="editarVacante">

    @php
        $classes = "border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full";
    @endphp

    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')"/>
        <x-text-input
            id="titulo"
            class="block mt-1 w-full"
            type="text"
            wire:model="titulo"
            :value="old('titulo')"
            placeholder="Titulo Vacante"
        />
        <x-input-error :messages="$errors->get('titulo')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')"/>
        <select
            id="salario"
            wire:model="salario_id"
            class="{{ $classes . " cursor-pointer " }}"
        >
            <option value="">-- Seleccione --</option>
            @foreach($salarios as $key => $salario)
                <option value="{{ $key }}">{{ $salario }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')"/>
        <select
            id="categoria"
            wire:model="categoria_id"
            class="{{ $classes . " cursor-pointer " }}"

        >

            <option value="">-- Seleccione la categoria --</option>
            @foreach($categorias as $key => $categoria)
                <option value="{{ $key }}">{{ $categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')"/>
        <x-text-input
            id="empresa"
            class="block mt-1 w-full"
            type="text"
            wire:model="empresa"
            :value="old('empresa')"
            placeholder="Empresa: ej. Sonic, Microsoft, Netflix"
        />
        <x-input-error :messages="$errors->get('empresa')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo Dia para  Postularse')"/>
        <x-text-input
            id="ultimo_dia"
            class="block mt-1 w-full"
            type="date"
            wire:model="ultimo_dia"
            :value="old('ultimo_dia')"
        />
        <x-input-error :messages="$errors->get('ultimo_dia')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')"/>
        <textarea
            class="{{ $classes . " resize-none h-72" }}"
            id="descripcion"
            name="descripcion"
            placeholder="Descripcion general del puesto, experencia"
            wire:model="descripcion"
        ></textarea>
        <x-input-error :messages="$errors->get('descripcion')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')"/>
        <x-text-input
            id="imagen"
            class="block mt-1 w-full p-2"
            type="file"
            wire:model="imagen"
            accept="image/*"
        />

        <div class="my-5 w-80">
{{--            @if($imagen)--}}
{{--                Imagen:--}}
{{--                <img src="{{ $imagen->temporaryUrl() }}" alt="Image">--}}
{{--            @endif--}}
        </div>

        <x-input-error :messages="$errors->get('imagen')"
                       class="mt-2 border-red-500 border bg-red-100 text-red-600 font-bold uppercase p-2 mt-2 text-sm"/>
    </div>

    <x-primary-button
    >
        Crear Vacante
    </x-primary-button>
</form>
