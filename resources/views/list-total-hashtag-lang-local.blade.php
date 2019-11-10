@extends('layout.app', ['navbar' => true])

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="">Total de Tweets por Hashtag, Lingua e Local</h1>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12" style="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Hashtag</th>
                                    <th>Localidade</th>
                                    <th>Lingua</th>
                                    <th>Total Posts</th>
                                </tr>
                            </thead>
                            <tbody id="tb3">
                                <tr><td colspan="2">Aguarde..</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        sendRequest('GET', '/api/v1/total/hashtag/lang/local', true);

        function createTableBody(json){
            let html = "";

            for (const item in json.data) {
                html += "<tr>";
                    html += "<td>" + item.hashtag + "</td>";
                    html += "<td>" + item.localidade + "</td>";
                    html += "<td>" + item.lingua + "</td>";
                    html += "<td>" + item.total_posts + "</td>";
                html += "</tr>";
            }

            document.getElementById('tb3').innerHTML=html;
        }
    </script>
@endsection
