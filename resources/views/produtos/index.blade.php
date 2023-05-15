<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Produtos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>
                    <div class="flex justify-between mb-4">
                        <div class="text-gray-500 dark:text-gray-400">
                            <span>Produto</span>
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            <span>Valor</span>
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            <span>Categoria</span>
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                            <span>Ações</span>
                        </div>
                    </div>

                    @foreach ($produtos as $produto)
                        <div class="flex justify-between items-center py-2 border-t border-gray-200 dark:border-gray-600">
                            <div class="text-gray-900 dark:text-gray-100">
                                <span>{{ $produto->nome }}</span>
                            </div>
                            <div class="text-gray-900 dark:text-gray-100">
                                <span>{{ number_format($produto->valor, 2, ',', '.') }}</span>
                            </div>
                            <div class="text-gray-900 dark:text-gray-100">
                                <span>{{ $produto->nome_categoria }}</span>
                            </div>
                            <div>
                                <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('produtos.editar', $produto->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Editar</a>
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Excluir</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-8">
                        <a href="{{ route('produtos.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-dark-100">Novo Produto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
