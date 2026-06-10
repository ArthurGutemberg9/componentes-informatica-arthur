<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $componente->nome }} - TechStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navegação -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-microchip text-purple-600 text-2xl"></i>
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 hover:text-purple-600 transition">TechStore</a>
                </div>
                <a href="{{ route('componentes.index') }}" class="text-gray-700 hover:text-purple-600 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Voltar ao Catálogo
                </a>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-purple-600">Início</a>
            <span class="mx-2">/</span>
            <a href="{{ route('componentes.index') }}" class="hover:text-purple-600">Catálogo</a>
            <span class="mx-2">/</span>
            <span class="text-gray-900 font-bold">{{ $componente->nome }}</span>
        </div>

        <!-- Conteúdo do Componente -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid md:grid-cols-2 gap-8 p-8">
                <!-- Imagem -->
                <div class="flex items-center justify-center bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl p-8 min-h-96">
                    @if ($componente->imagem)
                        <img src="{{ asset('storage/' . $componente->imagem) }}" alt="{{ $componente->nome }}" class="max-w-full max-h-96 object-contain">
                    @else
                        <i class="fas fa-microchip text-8xl text-purple-400"></i>
                    @endif
                </div>

                <!-- Informações -->
                <div>
                    <!-- Categoria -->
                    <span class="inline-block bg-purple-100 text-purple-600 text-sm font-bold px-4 py-2 rounded-full mb-4">
                        {{ $componente->categoria }}
                    </span>

                    <!-- Nome -->
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $componente->nome }}</h1>

                    <!-- Marca e Modelo -->
                    <p class="text-lg text-gray-600 mb-6">
                        <strong>Marca:</strong> {{ $componente->marca }} | <strong>Modelo:</strong> {{ $componente->modelo }}
                    </p>

                    <!-- Preço -->
                    <div class="mb-6 p-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl">
                        <p class="text-sm text-gray-600 mb-2">Preço</p>
                        <p class="text-5xl font-bold text-purple-600">R$ {{ number_format($componente->preco, 2, ',', '.') }}</p>
                    </div>

                    <!-- Estoque -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-600 mb-2">Disponibilidade</p>
                        @if ($componente->estoque > 0)
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                                <div>
                                    <p class="text-lg font-bold text-green-600">Em Estoque</p>
                                    <p class="text-sm text-gray-600">{{ $componente->estoque }} unidade(s) disponível(is)</p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-times-circle text-red-600 text-2xl"></i>
                                <div>
                                    <p class="text-lg font-bold text-red-600">Fora de Estoque</p>
                                    <p class="text-sm text-gray-600">Este componente não está disponível no momento</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Ações -->
                    <div class="flex space-x-4">
                        <a href="{{ route('componentes.edit', $componente->id) }}" class="flex-1 bg-yellow-600 text-white py-3 rounded-lg hover:bg-yellow-700 transition font-bold text-center">
                            <i class="fas fa-edit mr-2"></i>Editar
                        </a>
                        <form action="{{ route('componentes.destroy', $componente->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Tem certeza que deseja deletar este componente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition font-bold">
                                <i class="fas fa-trash mr-2"></i>Deletar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Descrição -->
            <div class="border-t border-gray-200 p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Descrição do Componente</h2>
                <p class="text-gray-700 leading-relaxed text-lg">{{ $componente->descricao }}</p>
            </div>

            <!-- Informações Adicionais -->
            <div class="border-t border-gray-200 p-8 bg-gray-50">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informações Técnicas</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Categoria</p>
                        <p class="text-lg font-bold text-gray-900">{{ $componente->categoria }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Marca</p>
                        <p class="text-lg font-bold text-gray-900">{{ $componente->marca }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Modelo</p>
                        <p class="text-lg font-bold text-gray-900">{{ $componente->modelo }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Preço</p>
                        <p class="text-lg font-bold text-purple-600">R$ {{ number_format($componente->preco, 2, ',', '.') }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Estoque</p>
                        <p class="text-lg font-bold text-gray-900">{{ $componente->estoque }} unidade(s)</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Data de Cadastro</p>
                        <p class="text-lg font-bold text-gray-900">{{ $componente->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Componentes Relacionados -->
        <div class="mt-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Outros Componentes da Categoria</h2>
            <div class="grid md:grid-cols-4 gap-6">
                @php
                    $relacionados = \App\Models\Componente::where('categoria', $componente->categoria)
                        ->where('id', '!=', $componente->id)
                        ->limit(4)
                        ->get();
                @endphp

                @forelse ($relacionados as $item)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="bg-gradient-to-br from-purple-100 to-blue-100 h-40 flex items-center justify-center">
                            @if ($item->imagem)
                                <img src="{{ asset('storage/' . $item->imagem) }}" alt="{{ $item->nome }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-microchip text-4xl text-purple-400"></i>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 truncate mb-2">{{ $item->nome }}</h3>
                            <p class="text-2xl font-bold text-purple-600 mb-4">R$ {{ number_format($item->preco, 2, ',', '.') }}</p>
                            <a href="{{ route('componentes.show', $item->id) }}" class="block w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition text-center font-bold">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-4 text-center py-8">Nenhum outro componente nesta categoria</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 px-4 mt-12">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p>&copy; 2026 TechStore. Todos os direitos reservados. | Desenvolvido por Arthur Gutemberg</p>
        </div>
    </footer>
</body>
</html>
