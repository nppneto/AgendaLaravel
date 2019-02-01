@extends('layouts.header')

@section('title', 'Editar Contato')

@section('content')

<h2>Editar Contato</h2>

<div class="container">

    {{-- {{ dd($contato[0]->nome_completo) }} --}}

    <form id="frmEditContato">
        <input type="hidden" id="hiddenID" value="{{ $contato[0]->id }}">
        <input type="hidden" id="_method" value="PUT">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input id="inputNome" class="form-control" type="text" placeholder="Digite seu nome completo" value="{{ $contato[0]->nome_completo }}">
        </div>

        <div class="form-group">
            <label for="nome">Telefone Residencial:</label>
            <input id="inputTelRes" class="form-control" type="text" placeholder="Digite seu telefone residencial" value="{{ $contato[0]->telefone_residencial }}">
        </div>

        <div class="form-group">
            <label for="nome">Telefone Celular:</label>
            <input id="inputTelCel" class="form-control" type="text" placeholder="Digite seu telefone celular" value="{{ $contato[0]->telefone_celular }}">
        </div>

        <div class="form-group">
            <label for="nome">E-mail:</label>
            <input id="inputEmail" class="form-control" type="mail" placeholder="Digite e-mail" value="{{ $contato[0]->email }}">
        </div>

        <div class="form-group">
            <label for="nome">Criado em:</label>
            <input id="inputCreatedAt" class="form-control" type="date" placeholder="Digite e-mail" value="{{ $contato[0]->created_at }}" disabled>
        </div>

        <div class="botao form-group">
            <button class="btn btn-primary" type="submit">Salvar</button>
            <a class="btn btn-primary" href="{{ route('listContato') }}">Voltar</a>
        </div>

    </form>

</div>

<script>

    window.document.getElementById('frmEditContato').addEventListener('submit', function(e) {

        e.preventDefault();

        const _token = window.document.getElementById('_token').value;
        const _method = window.document.getElementById('_method').value;
        const hiddenID = window.document.getElementById('hiddenID').value;

        const form = {
            'nome': window.document.getElementById('inputNome').value,
            'telefone_residencial':  window.document.getElementById('inputTelRes').value,
            'telefone_celular': window.document.getElementById('inputTelCel').value,
            'email': window.document.getElementById('inputEmail').value,
            'criadoEm': window.document.getElementById('inputCreatedAt').value
        };

        $.ajax({
            method: _method,
            async: true,
            url: '/contato/' + hiddenID,
            headers: {
                'X-CSRF-TOKEN': _token
            },
            data: form
        })
        .done(e => {
            console.log(e);
            location.href = '/';
        })
        .fail(() => {
            console.log('Deu ruim!');
        })

    });

</script>
<script src="{{url('assets/js/jquery-3.3.1.min.js')}}"></script>

@endsection

@extends('layouts.footer')