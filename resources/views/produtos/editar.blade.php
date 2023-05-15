<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="nome" class="block font-medium text-sm text-gray-700">Nome</label>
                                            <input type="text" name="nome" id="nome" autocomplete="nome" value="{{ $produto->nome }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="valor" class="block font-medium text-sm text-gray-700">Valor</label>
                                            <input type="number" step="0.01" name="valor" id="valor" autocomplete="valor" value="{{ $produto->valor }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="categoria_id" class="block font-medium text-sm text-gray-700">Categoria</label>
                                            <select name="categoria_id" id="categoria_id" class="form-select rounded-md shadow-sm mt-1 block w-full">
                                                @foreach ($categorias as $id => $nome)
                                                    <option value="{{ $id }}" {{ $produto->categoria_id == $id ? 'selected' : '' }}>{{ $nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Atualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
