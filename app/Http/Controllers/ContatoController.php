<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContatoClass;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatosClass = new ContatoClass();
        $params = $contatosClass->ListarContatos();

        return view('index', ['contatos' => $params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = array(
            ':nome' => $request->nome,
            ':telres' => $request->telefone_residencial,
            ':telcel' => $request->telefone_celular,
            ':email' => $request->email
        );

        // var_dump($response);

        $contatosClass = new ContatoClass();
        $contatosClass->InserirContatos($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contatosClass = new ContatoClass();
        $contato = $contatosClass->ListarContatoByID($id);

        return view('edit', ['contato' => $contato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = array(
            'nome' => $request->post('nome'),
            'telres' => $request->post('telefone_residencial'),
            'telcel' => $request->post('telefone_celular'),
            'email' => $request->post('email')
        );

        $contatosClass = new ContatoClass();
        $contatosClass->AtualizarContato($dados, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contatosClass = new ContatoClass();
        $contato = $contatosClass->ListarContatoByID($id);

        return view('delete', ['contato' => $contato]);
    }

    public function destroy($id)
    {
        $contatosClass = new ContatoClass();
        $contatosClass->DeletarContato($id);
    }
}
