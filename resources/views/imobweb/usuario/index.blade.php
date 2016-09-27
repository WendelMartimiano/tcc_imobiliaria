@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
            <li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>

            <li role="presentation" class="divider"></li>
            <li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
            <li class="active"><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg></a></li>
                <li class="active">Usuários</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Usuários</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Consulta de Usuários!</div>
                    <div class="panel-body">
                        <form class="form-horizontal form-pesquisa" method="post" action="" send="">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nome de Usuário:</label>
                                <div class="col-sm-10">
                                    <input id="name" name="name" type="text" placeholder="Digite o nome de usuário" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="" class="btn btn-default">Novo</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$tituloTabela or 'Todos os Usuários:'}}</div>
                    <div class="panel-body">
                        <table class="table table-hover"  id="usuarios-table">
                            <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Nome do Usuário</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a href="" onclick="modalDeleta('dashboard/usuarios/exclui-usuario/{{$usuario->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>

    <!-- Modal de Exclusão -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header header-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Exclusão de Usuário</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" id="url-excluir" class="form-control" name="id" value="" style="display: none">
                    </form>
                    <p>Deseja realmente excluir este usuário(a)?</p>
                    <div class="text-warning preloader-demitir" role="alert" style="display: none">Excluindo usuário, por favor aguarde...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="excluiUsuario">Confirmar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        //Chama modal de exclusão
        function modalDeleta(url){

            $('#url-excluir').val(url)

            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').focus()
            })
        }
    </script>
@endsection