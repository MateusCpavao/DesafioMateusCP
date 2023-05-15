<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <h1>Editar Categoria: {{ $categoria->nome }}</h1>
                        <form action="{{ route('categoriaProdutos.update', $categoria->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                <label for="nome">Nome</label>
                                <input type="text" class="block font-medium text-sm text-gray-700 dark:text-gray-300" id="nome" name="nome" value="{{ $categoria->nome }}" maxlength="64" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
