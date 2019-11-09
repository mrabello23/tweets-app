@extends('layout.app', ['navbar' => true])

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="">Todos de Tweets por Hora</h1>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12" style="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hora Tweet</th>
                                    <th>Total Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tweets as $key => $tweet)
                                    <tr>
                                        <td>{{ str_pad($tweet->hora_tweet, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $tweet->total_posts }}</td>
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
