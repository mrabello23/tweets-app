@extends('layout.app', ['navbar' => true])

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h1 class="">Total de Tweets por Hora</h1>
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
                            <tbody id="tb1">
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
        sendRequest('GET', '/api/v1/total/hour', createTableBody);

        function createTableBody(json){
            let html = "";

            for (const item in json.data) {
                html += "<tr>";
                    html += "<td>" + json.data[item].hora_tweet + "</td>";
                    html += "<td>" + json.data[item].total_posts + "</td>";
                html += "</tr>";
            }

            document.getElementById('tb1').innerHTML=html;
        }
    </script>
@endsection
