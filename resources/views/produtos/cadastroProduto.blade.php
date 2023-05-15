<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('produtos.store') }}">
                        @csrf
                        <div>
                            <label for="nome_produto">{{ __('Nome Produto') }}</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{ old('nome_produto') }}" required>
                            @error('nome_produto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="categoria">{{ __('Categoria') }}:</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">Selecione...</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="valor">{{ __('Valor') }}:</label>
                            <input type="number" id="valor" name="valor" min="0" step="0.01" value="{{ old('valor') }}" required>
                        </div>
                        <div>
                            <button type="submit">{{ __('Cadastrar') }}</button>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
