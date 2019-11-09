@extends('layout.app', ['navbar' => true])

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="">Todos os Tweets</h1>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12" style="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tweet</th>
                                    <th>Data Tweet</th>
                                    <th>Hashtag</th>
                                    <th>Seguidores</th>
                                    <th>Localidade</th>
                                    <th>Lingua</th>
                                    <th>Usuario</th>
                                    <th>Nome Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tweets as $key => $tweet)
                                    <tr>
                                        <td>{{ $tweet->tweet }}</td>
                                        <td>{{ $tweet->tweet_data }}</td>
                                        <td>{{ $tweet->hashtag }}</td>
                                        <td>{{ $tweet->seguidores }}</td>
                                        <td>{{ $tweet->localidade }}</td>
                                        <td>{{ $tweet->lingua }}</td>
                                        <td>{{ $tweet->usuario_apelido }}</td>
                                        <td>{{ $tweet->usuario_nome }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $tweets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
