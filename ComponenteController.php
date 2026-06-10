<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use Illuminate\Http\Request;

/**
 * ComponenteController
 * 
 * Controlador responsável por gerenciar as operações CRUD (Create, Read, Update, Delete)
 * dos componentes de informática. Implementa todas as ações RESTful padrão.
 */
class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Exibe uma lista paginada de todos os componentes cadastrados.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Busca todos os componentes paginados (15 por página)
        $componentes = Componente::paginate(15);
        
        // Retorna a view com os componentes
        return view('componentes.index', compact('componentes'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * Exibe o formulário para criar um novo componente.
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retorna a view do formulário de criação
        return view('componentes.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Valida e armazena um novo componente no banco de dados.
     * Utiliza CSRF protection para segurança.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Se houver imagem, salva no storage
        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('componentes', 'public');
        }

        // Cria o novo componente com os dados validados
        Componente::create($validated);

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('componentes.index')
                        ->with('success', 'Componente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     * 
     * Exibe os detalhes de um componente específico.
     * 
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        // Busca o componente pelo ID ou retorna erro 404
        $componente = Componente::findOrFail($id);
        
        // Retorna a view com os detalhes do componente
        return view('componentes.show', compact('componente'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * Exibe o formulário para editar um componente existente.
     * 
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        // Busca o componente pelo ID
        $componente = Componente::findOrFail($id);
        
        // Retorna a view do formulário de edição com os dados do componente
        return view('componentes.edit', compact('componente'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * Valida e atualiza um componente existente no banco de dados.
     * Utiliza CSRF protection para segurança.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // Busca o componente
        $componente = Componente::findOrFail($id);

        // Validação dos dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'categoria' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Se houver nova imagem, salva no storage
        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('componentes', 'public');
        }

        // Atualiza o componente com os dados validados
        $componente->update($validated);

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('componentes.index')
                        ->with('success', 'Componente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * Deleta um componente do banco de dados.
     * 
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Busca o componente
        $componente = Componente::findOrFail($id);
        
        // Deleta o componente
        $componente->delete();

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('componentes.index')
                        ->with('success', 'Componente deletado com sucesso!');
    }
}
