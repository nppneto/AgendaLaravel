@extends('layouts.header')

@section('title', 'Novo Contato')


@section('content')

    <h2>Novo Contato</h2>

    <div class="container">

        <form id="frmCadContato">

            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input id="inputNome" class="form-control" type="text" placeholder="Digite seu nome completo">
            </div>

            <div class="form-group">
                <label for="nome">Telefone Residencial:</label>
                <input id="inputTelRes" class="form-control" type="text" placeholder="Digite seu telefone residencial">
            </div>

            <div class="form-group">
                <label for="nome">Telefone Celular:</label>
                <input id="inputTelCel" class="form-control" type="text" placeholder="Digite seu telefone celular">
            </div>

            <div class="form-group">
                <label for="nome">E-mail:</label>
                <input id="inputEmail" class="form-control" type="mail" placeholder="Digite e-mail">
            </div>

            <div class="botao form-group">
                <button class="btn btn-primary" type="submit">Cadastrar</button>
                <a class="btn btn-primary" href="{{ route('listContato') }}">Voltar</a>
            </div>

        </form>

    </div>

    <script>

        window.document.getElementById('frmCadContato').addEventListener('submit', function(e) {

            e.preventDefault();

            // Pegando o CSRF TOKEN do input hidden no formulário
            const _token = window.document.getElementById('_token').value;

            const form = {
                'nome': window.document.getElementById('inputNome').value,
                'telefone_residencial': window.document.getElementById('inputTelRes').value,
                'telefone_celular': window.document.getElementById('inputTelCel').value,
                'email': window.document.getElementById('inputEmail').value
            };

            $.ajax({
                method: 'POST',
                // async: true,
                url: '/contato',
                // Passando o _token pra dentro
                // Do objeto headers, para que
                // A chave do token vá no formato string
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
            });

        });

    </script>
    <script src="{{url('assets/js/jquery/jquery-3.3.1.min.js')}}"></script>

@endsection

@extends('layouts.footer')