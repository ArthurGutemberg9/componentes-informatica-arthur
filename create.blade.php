<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Componente - TechStore</title>
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
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Adicionar Novo Componente</h1>
            <p class="text-lg text-gray-600">Preencha os dados abaixo para adicionar um novo componente ao catálogo</p>
        </div>

        <!-- Formulário -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('componentes.store') }}" method="POST" enctype="multipart/form-data">
                <!-- Token CSRF para proteção contra ataques -->
                @csrf

                <!-- Erros de Validação -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <h3 class="font-bold mb-2"><i class="fas fa-exclamation-circle mr-2"></i>Erros de Validação:</h3>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Grid de Campos -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <!-- Nome -->
                    <div>
                        <label for="nome" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-tag mr-2"></i>Nome do Componente *
                        </label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>

                    <!-- Marca -->
                    <div>
                        <label for="marca" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-industry mr-2"></i>Marca *
                        </label>
                        <input type="text" id="marca" name="marca" value="{{ old('marca') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>

                    <!-- Modelo -->
                    <div>
                        <label for="modelo" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-cube mr-2"></i>Modelo *
                        </label>
                        <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="categoria" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-list mr-2"></i>Categoria *
                        </label>
                        <select id="categoria" name="categoria" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                            <option value="">Selecione uma categoria</option>
                            <option value="Processador" {{ old('categoria') == 'Processador' ? 'selected' : '' }}>Processador</option>
                            <option value="Placa de Vídeo" {{ old('categoria') == 'Placa de Vídeo' ? 'selected' : '' }}>Placa de Vídeo</option>
                            <option value="Memória RAM" {{ old('categoria') == 'Memória RAM' ? 'selected' : '' }}>Memória RAM</option>
                            <option value="Armazenamento" {{ old('categoria') == 'Armazenamento' ? 'selected' : '' }}>Armazenamento</option>
                            <option value="Placa Mãe" {{ old('categoria') == 'Placa Mãe' ? 'selected' : '' }}>Placa Mãe</option>
                            <option value="Fonte" {{ old('categoria') == 'Fonte' ? 'selected' : '' }}>Fonte</option>
                            <option value="Cooler" {{ old('categoria') == 'Cooler' ? 'selected' : '' }}>Cooler</option>
                            <option value="Gabinete" {{ old('categoria') == 'Gabinete' ? 'selected' : '' }}>Gabinete</option>
                        </select>
                    </div>

                    <!-- Preço -->
                    <div>
                        <label for="preco" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-dollar-sign mr-2"></i>Preço (R$) *
                        </label>
                        <input type="number" id="preco" name="preco" value="{{ old('preco') }}" step="0.01" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>

                    <!-- Estoque -->
                    <div>
                        <label for="estoque" class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fas fa-boxes mr-2"></i>Quantidade em Estoque *
                        </label>
                        <input type="number" id="estoque" name="estoque" value="{{ old('estoque') }}" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    </div>
                </div>

                <!-- Descrição (Full Width) -->
                <div class="mb-6">
                    <label for="descricao" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-align-left mr-2"></i>Descrição *
                    </label>
                    <textarea id="descricao" name="descricao" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">{{ old('descricao') }}</textarea>
                </div>

                <!-- Imagem -->
                <div class="mb-6">
                    <label for="imagem" class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-image mr-2"></i>Imagem do Componente
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-purple-600 transition">
                        <input type="file" id="imagem" name="imagem" accept="image/*" class="hidden" onchange="previewImage(this)">
                        <label for="imagem" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-700 font-bold">Clique para selecionar uma imagem</p>
                            <p class="text-sm text-gray-600">ou arraste uma imagem aqui</p>
                            <p class="text-xs text-gray-500 mt-2">Formatos aceitos: JPEG, PNG, JPG, GIF (máx. 2MB)</p>
                        </label>
                    </div>
                    <div id="preview" class="mt-4 hidden">
                        <img id="previewImage" src="" alt="Preview" class="max-w-xs rounded-lg">
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition font-bold text-lg">
                        <i class="fas fa-save mr-2"></i>Salvar Componente
                    </button>
                    <a href="{{ route('componentes.index') }}" class="flex-1 bg-gray-600 text-white py-3 rounded-lg hover:bg-gray-700 transition font-bold text-lg text-center">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 px-4 mt-12">
        <div class="max-w-7xl mx-auto text-center text-gray-400">
            <p>&copy; 2026 TechStore. Todos os direitos reservados. | Desenvolvido por Arthur Gutemberg</p>
        </div>
    </footer>

    <script>
        // Função para visualizar a imagem selecionada
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                    document.getElementById('preview').classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Drag and drop para upload de imagem
        const dropZone = document.querySelector('.border-dashed');
        const fileInput = document.getElementById('imagem');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-purple-600', 'bg-purple-50');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-purple-600', 'bg-purple-50');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            previewImage(fileInput);
        }
    </script>
</body>
</html>
