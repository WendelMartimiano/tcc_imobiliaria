@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            @shield('view.imovel')<li  class="active"><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>@endshield
            @shield('view.funcionario')<li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>@endshield
            @shield('view.cliente')<li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>@endshield
            @shield('view.venda')<li><a href="/dashboard/vendas"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"/></svg> Vendas</a></li>@endshield
            @shield('view.reserva')<li><a href="/dashboard/reservas"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Reservas</a></li>@endshield
            @shield('view.contrato')<li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>@endshield
            @shield('view.relatorio')<li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>@endshield

            <li role="presentation" class="divider"></li>
            @shield('view.imobiliaria')<li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>@endshield
            @shield('view.usuario')<li><a href="/dashboard/usuarios"><svg class="glyph stroked key"><use xlink:href="#stroked-key"></use></svg> Usuários</a></li>@endshield
        </ul>

    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></li>
                <li><a href="/dashboard/imoveis">Imóveis</a></li>
                <li class="active">Edição de Imóvel</li>
            </ol>
        </div><!--/.row-->
        @shield('edit.imovel')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edição de Imóvel</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe os dados a serem alterados.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/imoveis/edita-imovel/{{$imovel->id}}" send="/dashboard/imoveis/edita-imovel/{{$imovel->id}}">
                            {!! csrf_field() !!}
                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2" for="empresa">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{$imovel->id_empresa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="codigo">Código do Imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="codigo" placeholder="Digite o código do imóvel" value="{{$imovel->codigo}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="tipo_imovel">Tipo de imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="id_tipo_imovel" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($tiposImoveis as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $imovel->id_tipo_imovel) selected="selected" @endif>{{$tipo->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label class="control-label col-sm-2" for="cpf_cnpj">CPF/CNPJ vendedor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="cpf_cnpj" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($vendedores as $vendedor)
                                            <option value="{{$vendedor->cpf_cnpj}}" @if($vendedor->cpf_cnpj == $imovel->cpf_cnpj) selected="selected" @endif>{{$vendedor->nome_razao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cep">CEP: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cep" placeholder="Digite o CEP" value="{{$imovel->cep}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="rua">Rua: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="rua" placeholder="Digite a rua" value="{{$imovel->rua}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="numero">Número: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="numero" placeholder="Digite o número" value="{{$imovel->numero}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bairro">Bairro: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{$imovel->bairro}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cidade">Cidade: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade" value="{{$imovel->cidade}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="estado">Estado: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uf" placeholder="Digite o estado" value="{{$imovel->uf}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="descricao">Descrição: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Digite a descrição do imóvel">{{$imovel->descricao}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="valor">Valor do Imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="valor" placeholder="Digite o valor do imóvel" value="{{$imovel->valor}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="situação" class="control-label col-sm-2">Situação: </label>
                                <label class="form-check-inline col-sm-2">
                                    <input class="form-check-input" type="radio" name="situacao" value="NOVO" @if($imovel->situacao == "NOVO") checked="checked" @endif> Imóvel Novo
                                </label>
                                <label class="form-check-inline ">
                                    <input class="form-check-input" type="radio" name="situacao" value="USADO" @if($imovel->situacao == "USADO") checked="checked" @endif> Imóvel Usado
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="/dashboard/imoveis" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endshield
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
                            title: "Imóvel alterado com sucesso!",
                            type: "success",
                            timer: 4000,
                            showConfirmButton: false
                        });
                        setTimeout("$(window.document.location).attr('href', '/dashboard/imoveis'); ", 4000);
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
@endsection