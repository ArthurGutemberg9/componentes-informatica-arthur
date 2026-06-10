<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Criar tabela de componentes de informática com todos os campos necessários
        Schema::create('componentes', function (Blueprint $table) {
            $table->id(); // ID do componente
            $table->string('nome'); // Nome do componente
            $table->text('descricao'); // Descrição detalhada
            $table->decimal('preco', 10, 2); // Preço do componente
            $table->integer('estoque')->default(0); // Quantidade em estoque
            $table->string('categoria'); // Categoria (CPU, GPU, RAM, etc.)
            $table->string('marca'); // Marca do fabricante
            $table->string('modelo'); // Modelo específico
            $table->string('imagem')->nullable(); // Caminho da imagem
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    // Reverter a migration (remover tabela)
    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};
