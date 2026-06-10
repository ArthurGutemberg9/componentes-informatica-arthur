<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Loja de Componentes de Informática</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Animações personalizadas */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

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
                    <span class="text-2xl font-bold text-gray-900">TechStore</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-purple-600 transition">Início</a>
                    <a href="{{ route('componentes.index') }}" class="text-gray-700 hover:text-purple-600 transition">Catálogo</a>
                    <a href="#sobre" class="text-gray-700 hover:text-purple-600 transition">Sobre</a>
                    <a href="#contato" class="text-gray-700 hover:text-purple-600 transition">Contato</a>
                </div>
                <a href="{{ route('componentes.create') }}" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-plus mr-2"></i>Novo Componente
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in-up">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">
                        Componentes de Informática Premium
                    </h1>
                    <p class="text-xl text-purple-100 mb-8">
                        Encontre os melhores componentes para montar seu computador dos sonhos. Qualidade garantida, preços competitivos.
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ route('componentes.index') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
                            Ver Catálogo
                        </a>
                        <a href="#sobre" class="border-2 border-white text-white px-8 py-3 rounded-lg font-bold hover:bg-white hover:text-purple-600 transition">
                            Saiba Mais
                        </a>
                    </div>
                </div>
                <div class="animate-slide-in-left">
                    <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20">
                        <i class="fas fa-server text-6xl text-purple-200 mb-4"></i>
                        <p class="text-lg text-purple-100">
                            Componentes de alta performance para gaming, produção e uso profissional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Categorias -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-900">
                Categorias de Produtos
            </h2>
            <div class="grid md:grid-cols-4 gap-6">
                <!-- Processadores -->
                <div class="card-hover bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 text-center">
                    <i class="fas fa-cpu text-4xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Processadores</h3>
                    <p class="text-gray-700">CPUs Intel e AMD de última geração</p>
                </div>

                <!-- Placas de Vídeo -->
                <div class="card-hover bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 text-center">
                    <i class="fas fa-video text-4xl text-green-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Placas de Vídeo</h3>
                    <p class="text-gray-700">GPUs NVIDIA e AMD para gaming e criação</p>
                </div>

                <!-- Memória RAM -->
                <div class="card-hover bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 text-center">
                    <i class="fas fa-memory text-4xl text-purple-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Memória RAM</h3>
                    <p class="text-gray-700">DDR4 e DDR5 com alta velocidade</p>
                </div>

                <!-- Armazenamento -->
                <div class="card-hover bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 text-center">
                    <i class="fas fa-hdd text-4xl text-orange-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Armazenamento</h3>
                    <p class="text-gray-700">SSDs NVMe e HDDs de alta capacidade</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Sobre -->
    <section id="sobre" class="py-16 px-4 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold mb-6 text-gray-900">
                        Por que escolher a TechStore?
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Produtos Originais</h3>
                                <p class="text-gray-700">Todos os componentes são 100% originais e com garantia</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Preços Competitivos</h3>
                                <p class="text-gray-700">Oferecemos os melhores preços do mercado</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Suporte Especializado</h3>
                                <p class="text-gray-700">Equipe pronta para ajudar na escolha correta</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="space-y-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600">1000+</div>
                            <p class="text-gray-700">Produtos em Estoque</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600">5000+</div>
                            <p class="text-gray-700">Clientes Satisfeitos</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-purple-600">24/7</div>
                            <p class="text-gray-700">Atendimento Disponível</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">
                Pronto para começar?
            </h2>
            <p class="text-xl text-purple-100 mb-8">
                Explore nosso catálogo completo de componentes de informática e encontre exatamente o que você precisa.
            </p>
            <a href="{{ route('componentes.index') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition inline-block">
                Acessar Catálogo Completo
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">TechStore</h3>
                    <p class="text-gray-400">Sua loja de componentes de informática online.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Produtos</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Processadores</a></li>
                        <li><a href="#" class="hover:text-white transition">Placas de Vídeo</a></li>
                        <li><a href="#" class="hover:text-white transition">Memória RAM</a></li>
                        <li><a href="#" class="hover:text-white transition">Armazenamento</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Suporte</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Contato</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Políticas</a></li>
                        <li><a href="#" class="hover:text-white transition">Termos</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Redes Sociais</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition text-xl">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition text-xl">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition text-xl">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition text-xl">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2026 TechStore. Todos os direitos reservados. | Desenvolvido por Arthur Gutemberg</p>
            </div>
        </div>
    </footer>
</body>
</html>
