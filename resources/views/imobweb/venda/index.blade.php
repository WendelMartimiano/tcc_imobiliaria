@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li class="active"><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>
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
                <li><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></li>
                <li class="active">Vendas</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vendas</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Consulta de Vendas.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/vendas/pesquisar" send="">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">Código da venda:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" placeholder="Digite o código da venda" value="{{old('id')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Vendedor:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="vendedor" placeholder="Digite o CPF/CNPJ do vendedor" value="{{old('vendedor')}}">
                                </div>
                            </div>

                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{Auth::user()->id_empresa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                    <a href="/dashboard/vendas/cadastra-venda" class="btn btn-default">Novo</a>
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
                    <div class="panel-heading">{{$tituloTabela or 'Todos as Vendas:'}}</div>
                    <div class="panel-body">
                        <table class="table table-hover"  id="vendas-table">
                            <thead>
                            <tr>
                                <th>Código da Venda</th>
                                <th>Vendedor</th>
                                <th>Comprador</th>
                                <th>Corretor</th>
                                <th>Código Imóvel</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vendas as $venda)
                                <tr>
                                    <td>{{$venda->id}}</td>
                                    <td>{{$venda->vendedor}}</td>
                                    <td>{{$venda->comprador}}</td>
                                    <td>{{$venda->corretor}}</td>
                                    <td>{{$venda->codigo}}</td>
                                    <td>
                                        <a href="/dashboard/vendas/imprime-contrato/{{$venda->id}}" class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                        </a>
                                        <a href="" onclick="modalDeleta('/dashboard/vendas/cancela-venda/{{$venda->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $vendas->render() !!}
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
                    <h4 class="modal-title" id="myModalLabel">Cancelamento de Venda</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" id="url-deletar" class="form-control" name="id" value="" style="display: none">
                    </form>
                    <p>Deseja realmente cancelar esta venda?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="cancelaVenda">Confirmar</button>
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

@section('scripts')
    <script>
        //Chama modal de cancelar venda
        function modalDeleta(url){

            $('#url-deletar').val(url);
            $('#modalDeletar').modal('show');
        }

        //Efetua o cancelamento da venda
        $("#cancelaVenda").click(function() {
            var url = $("#url-deletar").val();

            var request = $.ajax({
                url: url,
                method: "GET",
                beforeSend: iniciaPreloader()
            });
            request.done(function(data){
                finalizaPreloader();

                if(data == "1"){
                    $('#modalDeletar').modal('hide');

                    swal({
                        title: "Venda cancelada com sucesso!",
                        type: "success",
                        timer: 4000,
                        showConfirmButton: false
                    });
                    setTimeout("$(window.document.location).attr('href', '/dashboard/vendas'); ", 4000);
                }else{
                    $('#modalDeletar').modal('hide');
                    swal("Falha ao tentar cancelar venda! Informe o erro a ImobWeb no contato (16)99999-9999.", "","error");
                }

            });
            request.fail(function(){
                finalizaPreloader();
                swal("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.", "","error");
            });

            return false;
        });

        function iniciaPreloader(){
            $('#modalPreloader').modal({backdrop: 'static',  keyboard: false})
        }

        function finalizaPreloader(){
            $('#modalPreloader').modal('hide');
        }

    </script>
@endsection