<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Setor $setor)
    {
        $setores = $setor->all();
        return view('setores/setores', compact('setores'));
    }


    public function show(string|int $id)
    {
        if (!$setor = Setor::find($id)) {
            return back();
        }
        $setores = $setor->all();
        return view('setores/edit', compact('setor', 'setores'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Setor::create($data);
        return redirect()->route('setores.index')->with('mensagem', 'Setor cadastrado com sucesso!');
    }

    public function update(Request $request, Setor $setor, string $id)
    {
        if (!$setor = $setor->find($id)) {
            return back()->with('mensagem', 'Erro');
        }

        $setor->update($request->only([
            'setor_descricao', 'setor_ativo'
        ]));

        return redirect()->route('setores.index')->with('mensagem', 'Setor atualizado com sucesso!');
    }

    public function destroy(string|int $id)
    {
        if (!$setor = Setor::find($id)) {
            return back()->with('mensagem', 'Error');
        }
        $setor->delete();
        return redirect()->route('setores.index')->with('mensagem', 'Setor excluido com sucesso!');
    }
}
