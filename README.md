# Sistema de Gerenciamento de Componentes de Informática

Este repositório contém o projeto desenvolvido por Arthur Gutemberg como parte da atividade acadêmica de 10 de Junho de 2026. O sistema consiste em uma plataforma de gerenciamento para uma loja de componentes de informática, implementada utilizando o framework Laravel 11.

## Descrição do Projeto

O objetivo deste projeto é demonstrar a aplicação prática de conceitos fundamentais do desenvolvimento web moderno, incluindo arquitetura MVC (Model-View-Controller), persistência de dados, rotas personalizadas e segurança de aplicações. A interface foi projetada para ser estética e moderna, utilizando Tailwind CSS para garantir responsividade e uma experiência de usuário profissional.

## Requisitos Técnicos Implementados

Em conformidade com as diretrizes do exercício, as seguintes funcionalidades foram rigorosamente implementadas:

1. **Tratamento de Exceções de Rota (Fallback):** Implementação de uma rota de contingência que captura solicitações para URLs inexistentes, redirecionando o usuário para uma página de erro 404 personalizada e integrada à identidade visual do sistema.
2. **Migrações de Banco de Dados (Migrations):** Definição da estrutura de dados através de migrations do Laravel, garantindo a integridade e portabilidade do banco de dados SQLite. A tabela de componentes inclui campos detalhados como nome, descrição, preço, estoque, categoria, marca, modelo e referências de imagem.
3. **Segurança de Formulários (CSRF Protection):** Todos os pontos de entrada de dados via formulários estão protegidos contra ataques Cross-Site Request Forgery através da implementação da diretiva de segurança nativa do framework.
4. **Documentação de Código:** O algoritmo e a lógica de negócios contidos em Controllers, Models e arquivos de rotas foram extensivamente comentados em língua portuguesa, facilitando a manutenção e compreensão do fluxo de dados.
5. **Interface de Usuário:** Desenvolvimento de views Blade com design contemporâneo, utilizando componentes estéticos e funcionais.

## Instruções para Execução

Para executar este projeto em ambiente local, siga os procedimentos descritos abaixo:

### Pré-requisitos

* PHP 8.2 ou superior
* Composer
* Extensão SQLite para PHP

### Procedimento de Instalação

1. Clone este repositório para o seu ambiente local:
   ```bash
   git clone https://github.com/ArthurGutemberg9/componentes-informatica-arthur.git
   ```

2. Acesse o diretório do projeto:
   ```bash
   cd componentes-informatica-arthur
   ```

3. Instale as dependências do projeto via Composer:
   ```bash
   composer install
   ```

4. Configure o arquivo de ambiente:
   ```bash
   cp .env.example .env
   ```

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Execute as migrações para preparar o banco de dados (o arquivo SQLite será criado automaticamente):
   ```bash
   php artisan migrate
   ```

7. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

O sistema estará acessível através do endereço `http://localhost:8000`.

## Estrutura de Pastas Principal

* `app/Http/Controllers`: Lógica de controle do sistema.
* `app/Models`: Definições de entidades e regras de negócio.
* `database/migrations`: Histórico de evolução do banco de dados.
* `resources/views`: Templates Blade da interface do usuário.
* `routes/web.php`: Definição de rotas e lógica de fallback.

## Licença

Este projeto foi desenvolvido exclusivamente para fins educacionais.
