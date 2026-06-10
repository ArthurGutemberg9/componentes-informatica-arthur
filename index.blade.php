<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Componentes - TechStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navegação -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-microchip text-purple-600 text-2xl"></i>
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900 hover:text-purple-600 transition">TechStore</a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 transition">Início</a>
                    <a href="{{ route('componentes.index') }}" class="text-purple-600 font-bold">Catálogo</a>
                </div>
                <a href="{{ route('componentes.create') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-plus mr-2"></i>Novo Componente
                </a>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Cabeçalho -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Catálogo de Componentes</h1>
            <p class="text-lg text-gray-600">Explore nossa seleção completa de componentes de informática de alta qualidade</p>
        </div>

        <!-- Mensagens de Sucesso/Erro -->
        @if ($message = Session::get('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <i class="fas fa-check-circle mr-2"></i>{{ $message }}
            </div>
        @endif

        <!-- Verificar se há componentes -->
        @if ($componentes->count())
            <!-- Grid de Componentes -->
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                @foreach ($componentes as $componente)
                    <div class="card-hover bg-white rounded-xl shadow-md overflow-hidden">
                        <!-- Imagem do Componente -->
                        <div class="bg-gradient-to-br from-purple-100 to-blue-100 h-48 flex items-center justify-center">
                            @if ($componente->imagem)
                                <img src="{{ asset('storage/' . $componente->imagem) }}" alt="{{ $componente->nome }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-microchip text-5xl text-purple-400"></i>
                            @endif
                        </div>

                        <!-- Informações do Componente -->
                        <div class="p-4">
                            <!-- Categoria -->
                            <span class="inline-block bg-purple-100 text-purple-600 text-xs font-bold px-3 py-1 rounded-full mb-2">
                                {{ $componente->categoria }}
                            </span>

                            <!-- Nome -->
                            <h3 class="text-lg font-bold text-gray-900 mb-2 truncate">{{ $componente->nome }}</h3>

                            <!-- Marca e Modelo -->
                            <p class="text-sm text-gray-600 mb-2">
                                <strong>{{ $componente->marca }}</strong> - {{ $componente->modelo }}
                            </p>

                            <!-- Descrição -->
                            <p class="text-sm text-gray-700 mb-4 line-clamp-2">{{ $componente->descricao }}</p>

                            <!-- Preço e Estoque -->
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <p class="text-2xl font-bold text-purple-600">R$ {{ number_format($componente->preco, 2, ',', '.') }}</p>
                                    <p class="text-sm text-gray-600">
                                        @if ($componente->estoque > 0)
                                            <span class="text-green-600"><i class="fas fa-check-circle"></i> Em Estoque</span>
                                        @else
                                            <span class="text-red-600"><i class="fas fa-times-circle"></i> Fora de Estoque</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Ações -->
                            <div class="flex space-x-2">
                                <a href="{{ route('componentes.show', $componente->id) }}" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition text-center text-sm font-bold">
                                    <i class="fas fa-eye mr-1"></i>Ver Detalhes
                                </a>
                                <a href="{{ route('componentes.edit', $componente->id) }}" class="flex-1 bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 transition text-center text-sm font-bold">
                                    <i class="fas fa-edit mr-1"></i>Editar
                                </a>
                                <form action="{{ route('componentes.destroy', $componente->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Tem certeza que deseja deletar este componente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition text-sm font-bold">
                                        <i class="fas fa-trash mr-1"></i>Deletar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginação -->
            <div class="flex justify-center">
                {{ $componentes->links() }}
            </div>
        @else
            <!-- Mensagem quando não há componentes -->
            <div class="text-center py-12">
                <i class="fas fa-inbox text-6xl text-gray-400 mb-4"></i>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Nenhum componente encontrado</h2>
                <p class="text-gray-600 mb-6">Comece adicionando seu primeiro componente à loja.</p>
                <a href="{{ route('componentes.create') }}" class="bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition inline-block">
                    <i class="fas fa-plus mr-2"></i>Adicionar Componente
                </a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 px-4 mt-12">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p>&copy; 2026 TechStore. Todos os direitos reservados. | Desenvolvido por Arthur Gutemberg</p>
        </div>
    </footer>
</body>
</html>
