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
                            <tbody id="tb2">
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
        sendRequest('GET', '/api/v1/top/users', true);

        function createTableBody(json){
            let html = "";

            for (const item in json.data) {
                html += "<tr>";
                    html += "<td>" + item.usuario_nome + "</td>";
                    html += "<td>" + item.usuario_apelido + "</td>";
                    html += "<td>" + item.seguidores + "</td>";
                    html += "<td>" + item.localidade + "</td>";
                    html += "<td>" + item.lingua + "</td>";
                html += "</tr>";
            }

            document.getElementById('tb2').innerHTML=html;
        }
    </script>
@endsection
