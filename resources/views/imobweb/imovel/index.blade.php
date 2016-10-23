@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li class="active"><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
            <li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>

            <li role="presentation" class="divider"></li>
            <li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
            <li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg></li>
                <li class="active">Imoveis</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Imoveis</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Consulta de Imoveis!</div>
                    <div class="panel-body">
                        <form class="form-horizontal form-pesquisa" method="post" action="">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id">Código do Imóvel:</label>
                                <div class="col-sm-10">
                                    <input name="id" type="text" placeholder="Digite o código do imóvel" class="form-control" value="{{old('id')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tipo_imovel">Tipo de Imóvel:</label>
                                <div class="col-sm-10">
                                    <select name="id_tipo_imovel" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="">Apartamento</option>
                                        <option value="">Casa</option>
                                        <option value="">Rancho</option>
                                        <option value="">Chacara</option>
                                        <option value="">Terreno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="/dashboard/imoveis/cadastra-imovel" class="btn btn-default">Novo</a>
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
                        <table class="table table-hover"  id="imovel-table">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th>CEP</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($usuarios as $usuario)--}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a href="" onclick="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                        {{--{!! $usuarios->render() !!}--}}
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>


    <!-- Modal de Deletar -->
    <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header header-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Exclusão de Imóvel</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" id="url-deletar" class="form-control" name="id" value="" style="display: none">
                    </form>
                    <p>Deseja realmente excluir este imóvel?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="deletaImovel">Confirmar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preloader -->
    <div class="modal fade bs-example-modal-sm" id="modalPreloader" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="spinner"></div>
                <p class="spinner-text">carregando..</p>
            </div>
        </div>
    </div>
@endsection