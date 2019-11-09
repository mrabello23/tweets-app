@extends('layout.app', ['navbar' => true])

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="">Top Usuários por Seguidores</h1>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12" style="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome Usuario</th>
                                    <th>Usuario</th>
                                    <th>Seguidores</th>
                                    <th>Localidade</th>
                                    <th>Lingua</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tweets as $key => $tweet)
                                    <tr>
                                        <td>{{ $tweet->usuario_nome }}</td>
                                        <td>{{ $tweet->usuario_apelido }}</td>
                                        <td>{{ number_format($tweet->seguidores, 0, ',', '.') }}</td>
                                        <td>{{ $tweet->localidade }}</td>
                                        <td>{{ $tweet->lingua }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
