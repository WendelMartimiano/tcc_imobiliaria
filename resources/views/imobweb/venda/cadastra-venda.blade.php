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
                    <div class="panel-heading">Elaboração de contrato de venda.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/vendas/cadastra-venda" send="" target="_blank">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="control-label col-sm-2">Tipos de Cotratos: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="tipo de contrato" value="CONTRATO DE {{$contrato->descricao}}" disabled>
                                    <input type="hidden" name="id_tipo_contrato" value="{{$contrato->id}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="id_imovel" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($imoveis as $imovel)
                                            <option value="{{$imovel->id}}">{{$imovel->codigo}} | {{$imovel->bairro}} | {{$imovel->cidade}}, {{$imovel->uf}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2">Corretor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="corretor" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($corretores as $corretor)
                                            <option value="{{$corretor->cpf_cnpj}}">{{$corretor->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="email">Cliente Vendedor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="vendedor" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($vendedores as $vendedor)
                                            <option value="{{$vendedor->cpf_cnpj}}">{{$vendedor->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="name">Cliente Comprador: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="comprador" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($compradores as $comprador)
                                            <option value="{{$comprador->cpf_cnpj}}">{{$comprador->nome_razao}}</option>
                                        @endforeach
                                    </select>
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
                                    <button type="submit" class="btn btn-primary">Finalizar Venda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<!-- Modal Preloader -->
    <div class="modal fade bs-example-modal-sm" id="modalPreloader" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="spinner"></div>
                <p class="spinner-text">carregando..</p>
            </div>
        </div>
    </div>--}}
@endsection

{{--
@section('scripts')
    <script>
        $(function(){
            $("form").submit(function(){
                var dadosForm = $(this).serialize();

                jQuery.ajax({
                    method:"POST",
                    url: jQuery(this).attr("send"),
                    data: dadosForm,
                    beforeSend: iniciaPreloader()
                }).done(function(data){
                    finalizaPreloader();

                    if(data == 1){
                        swal({
                            title: "Venda finalizada com sucesso!",
                            type: "success",
                            timer: 4000,
                            showConfirmButton: false
                        });
                        setTimeout("$(window.document.location).attr('href', '/dashboard/vendas'); ", 4000);
                    }else{
                        for(var t in data){
                            swal(data[t], "","warning");
                        }
                    }

                }).fail(function(){
                    finalizaPreloader();
                    swal("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.", "","error");
                });
                return false;
            });
        });

        function iniciaPreloader(){
            $('#modalPreloader').modal({backdrop: 'static',  keyboard: false})
        }

        function finalizaPreloader(){
            $('#modalPreloader').modal('hide');
        }
    </script>
@endsection--}}
