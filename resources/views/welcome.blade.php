@extends('layout.app', ['navbar' => false])

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Tweets App
            </div>

            <div class="links">
                <a href="{{ route('web.index') }}">Tweets List</a>
                <a href="{{ route('web.top.users') }}">Top Users By Followers</a>
                <a href="{{ route('web.total.hour') }}">Total Posts By Hour</a>
                <a href="{{ route('web.total.tag.lang.local') }}">Total Posts By Hashtag, Lang and Local</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>sendRequest('GET', '/api/v1/tweets/batch-save');</script>
@endsection
