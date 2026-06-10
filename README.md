# TechStore - Loja de Componentes de Informática

Este projeto foi desenvolvido por **Arthur Gutemberg** como parte da Atividade de 10 de Junho de 2026. Trata-se de um sistema completo de gerenciamento de componentes de informática utilizando o framework **Laravel**.

## 🚀 Tecnologias Utilizadas

- **Framework:** Laravel 11.x
- **Linguagem:** PHP 8.3
- **Banco de Dados:** SQLite (configurado para facilidade de execução)
- **Frontend:** Tailwind CSS, Font Awesome
- **Segurança:** CSRF Protection, Validação de Dados

## 📋 Requisitos Implementados

Conforme solicitado no exercício, as seguintes funcionalidades foram implementadas:

1.  **ROTA FALLBACK:** Implementada para capturar URLs inexistentes e redirecionar para uma página de erro 404 personalizada e amigável.
2.  **MIGRATIONS:** Estrutura de banco de dados definida através de migrations, incluindo a tabela `componentes` com campos para nome, descrição, preço, estoque, categoria, marca, modelo e imagem.
3.  **FORMULÁRIO COM AUTENTICAÇÃO CSRF PROTECTION:** Todos os formulários de criação e edição utilizam a diretiva `@csrf` do Laravel para proteção contra ataques Cross-Site Request Forgery.
4.  **COMENTÁRIO NO ALGORITMO:** O código fonte (Controllers, Models, Routes) está devidamente comentado em português, explicando a função de cada bloco.
5.  **INTERFACE MODERNA:** Design responsivo e estético utilizando Tailwind CSS, com animações e componentes visuais modernos.

## 🖼️ Views Publicadas

O sistema conta com as seguintes views principais:

-   **Home (`/`):** Página inicial com design moderno, hero section e destaques da loja.
-   **Catálogo (`/componentes`):** Lista todos os componentes cadastrados em formato de cards elegantes.
-   **Novo Componente (`/componentes/create`):** Formulário completo para cadastro de novos produtos com upload de imagem.
-   **Detalhes (`/componentes/{id}`):** Visualização detalhada de um componente específico.
-   **Edição (`/componentes/{id}/edit`):** Interface para atualizar dados de componentes existentes.
-   **Erro 404:** Página personalizada exibida quando uma rota não é encontrada.

## 🛠️ Como Executar o Projeto

1.  Clone o repositório.
2.  Instale as dependências: `composer install`.
3.  Configure o ambiente: `cp .env.example .env` e `php artisan key:generate`.
4.  Execute as migrations: `php artisan migrate`.
5.  Inicie o servidor: `php artisan serve`.

---
Desenvolvido com ❤️ por **Arthur Gutemberg**
