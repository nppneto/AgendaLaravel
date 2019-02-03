@extends('layouts.header')

@section('title', 'Deletar Contato')

@section('content')

    <h2>Deletar Contato</h2>

    <br/>
    
    <form id="frmDelContato">

        <input type="hidden" id="hiddenID" value="{{ $contato[0]->id }}">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="_method" value="PUT">
        <p style="text-align: center;"><strong>Você tem certeza que deseja deletar o contato {{ $contato[0]->nome_completo }}?<strong></p>

        <br/>

        <div class="botao">
            <button class="btn btn-primary" type="submit">Confirmar</button>
            <a class="btn btn-primary" href="{{ route('listContato') }}">Voltar</a>
        </div>

    </form>

    <script>

        window.document.getElementById('frmDelContato').addEventListener('submit', function(e) {

            e.preventDefault();

            const hiddenID = window.document.getElementById('hiddenID').value;
            const _token = window.document.getElementById('_token').value;
            const _method = window.document.getElementById('_method').value;

            // const form = {
            //     'id': window.document.getElementById('hiddenID').value
            // };

            // console.log(form);
            // return false;

            $.ajax({
                method: _method,
                async: true,
                url: '/contato/' + hiddenID,
                headers: {
                    'X-CSRF-TOKEN': _token
                }
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