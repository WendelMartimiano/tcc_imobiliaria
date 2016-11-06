@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>
            <li class="active"><a href="/dashboard/reservas"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Reservas</a></li>
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
                <li><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg></li>
                <li class="active">Reservas</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Reservas</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Consulta de Reservas.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/reservas/pesquisar" send="">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">Código da reserva:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id" placeholder="Digite o código da reserva" value="{{old('id')}}">
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
                                    <a href="/dashboard/reservas/cadastra-reserva" class="btn btn-default">Novo</a>
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
                    <div class="panel-heading">{{$tituloTabela or 'Todos as Reservas:'}}</div>
                    <div class="panel-body">
                        <table class="table table-hover"  id="reservas-table">
                            <thead>
                            <tr>
                                <th>Código da Reserva</th>
                                <th>Vendedor</th>
                                <th>Comprador</th>
                                <th>Corretor</th>
                                <th>Código Imóvel</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservas as $reserva)
                                <tr>
                                    <td>{{$reserva->id}}</td>
                                    <td>{{$reserva->vendedor}}</td>
                                    <td>{{$reserva->comprador}}</td>
                                    <td>{{$reserva->corretor}}</td>
                                    <td>{{$reserva->codigo}}</td>
                                    <td>
                                        <a href="/dashboard/reservas/imprime-contrato/{{$reserva->id}}" class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                        </a>
                                        <a href="" onclick="modalDeleta('/dashboard/reservas/cancela-reserva/{{$reserva->id}}')" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                        <a href="" onclick="modalVenda('/dashboard/reservas/gera-venda/{{$reserva->id}}')" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $reservas->render() !!}
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
                    <h4 class="modal-title" id="myModalLabel">Cancelamento de Reserva</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" id="url-deletar" class="form-control" name="id" value="" style="display: none">
                    </form>
                    <p>Deseja realmente cancelar esta reserva?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="cancelaReserva">Confirmar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Efetuar Venda de Imóvel Reservado -->
    <div class="modal fade" id="modalVenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Efetuar Venda de Imóvel Reservado</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="text" id="url-venda" class="form-control" name="id" value="" style="display: none">
                    </form>
                    <p>Deseja realmente efetuar a venda deste imóvel reservado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="geraVenda">Confirmar</button>
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
        //Chama modal de cancelar reserva
        function modalDeleta(url){

            $('#url-deletar').val(url);
            $('#modalDeletar').modal('show');
        }

        //Efetua o cancelamento da reserva
        $("#cancelaReserva").click(function() {
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
                        title: "Reserva cancelada com sucesso!",
                        type: "success",
                        timer: 4000,
                        showConfirmButton: false
                    });
                    setTimeout("$(window.document.location).attr('href', '/dashboard/reservas'); ", 4000);
                }else{
                    $('#modalDeletar').modal('hide');
                    swal("Falha ao tentar cancelar reserva! Informe o erro a ImobWeb no contato (16)99999-9999.", "","error");
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
    <script>
        //Chama modal de gerar venda
        function modalVenda(url){

            $('#url-venda').val(url);
            $('#modalVenda').modal('show');
        }

        //Efetua a veda do imóvel reservado
        $("#geraVenda").click(function() {
            var url = $("#url-venda").val();

            var request = $.ajax({
                url: url,
                method: "GET",
                beforeSend: iniciaPreloader()
            });
            request.done(function(data){
                finalizaPreloader();

                if(data == "1"){
                    $('#modalVenda').modal('hide');

                    swal({
                        title: "Venda efetuada com sucesso!",
                        type: "success",
                        timer: 4000,
                        showConfirmButton: false
                    });
                    setTimeout("$(window.document.location).attr('href', '/dashboard/reservas'); ", 4000);
                }else{
                    $('#modalDeletar').modal('hide');
                    swal("Falha ao tentar efetuar venda de imóvel! Informe o erro a ImobWeb no contato (16)99999-9999.", "","error");
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