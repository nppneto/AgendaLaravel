@extends('layouts.header')

@section('title', 'Página Inicial')

@section('content')

    <h2>Lista de Contatos</h2>

    {{-- {{ dd($contatos) }} --}}

    <br/>
    <br/>

    <table class="table">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Telefone Residencial</th>
                <th>Telefone Celular</th>
                <th>E-mail</th>
                <th>Data de Criação</th>
                <th>Ativo</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome_completo }}</td>
                    <td class="ddd_tel">{{ $contato->telefone_residencial }}</td>
                    <td>{{ $contato->telefone_celular }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->created_at }}</td>
                    <td>{{ ($contato->ativo == 1) ? "Sim" : "Não" }}</td>
                    <td>
                        <a class="btn btn-primary" href="contato/{{ $contato->id }}/edit">Editar</a>
                        <a class="btn btn-primary" href="contato/{{ $contato->id }}/delete">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        // jQuery.noConflict();
        // $(document).ready(function() {
        //     $(".ddd_tel").mask("(99) 9999-9999");
        // })
    </script>
    <script src="{{url('assets/js/jquery/jquery-3.3.1.min.js')}}"></script>
    {{-- <script src="{{url('assets/js/jquery/jquery.mask.min.js')}}"></script> --}}
    
@endsection

@extends('layouts.footer')