<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-5">Deletar categoria</h1>
                    <form action="{{ route('categoriaProdutos.destroy', $categoria->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mb-3">
                            <label for="nome" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nome:</label>
                            <span class="text-gray-900 dark:text-gray-100">{{ $categoria->nome }}</span>
                        </div>
                        <div class="mb-3">
                            <label for="confirmacao" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Confirmação:</label>
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-2" id="confirmacao" name="confirmacao" required>
                                <label for="confirmacao" class="font-medium text-sm text-gray-700 dark:text-gray-300">Confirmo que desejo deletar essa categoria e seus produtos cadastrados.</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Senha:</label>
                            <input type="password" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="senha" name="senha" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:bg-red-600">Deletar</button>
                            <a href="{{ route('categoriaProdutos.index') }}" class="ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>