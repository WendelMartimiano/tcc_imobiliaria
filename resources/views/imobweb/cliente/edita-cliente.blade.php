@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li class="active"><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
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
                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
                <li class="active">Clientes / Edição de Cliente</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edição de Cliente</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe os dados a serem alterados.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/clientes/edita-cliente/{{$cliente->id}}" send="/dashboard/clientes/edita-cliente/{{$cliente->id}}">
                            {!! csrf_field() !!}
                            <div class="form-group form-inline">
                                <label for="tipo_pessoa" class="control-label col-sm-2">Tipo Pessoa: </label>
                                <label class="form-check-inline col-sm-1">
                                    <input class="form-check-input" type="radio" name="tipo_pessoa" id="radio_cpf" value="F" @if($cliente->tipo_pessoa == "F") checked="checked" @endif> CPF
                                </label>
                                <label class="form-check-inline ">
                                    <input class="form-check-input" type="radio" name="tipo_pessoa" id="radio_cnpj" value="J" @if($cliente->tipo_pessoa == "J") checked="checked" @endif> CNPJ
                                </label>
                            </div>
                            <div class="form-group form-inline">
                                <label for="cargo" class="control-label col-sm-2">Tipo Cliente: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="id_tipo_cliente">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($tiposClientes as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $cliente->id_tipo_cliente) selected="selected" @endif>{{$tipo->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" id="label_cpfCnpj"  for="cpf_cnpj"></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control cpf_cnpj" name="cpf_cnpj" placeholder="" value="{{$cliente->cpf_cnpj}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" id="label_nomeRazao"  for="nome_razao"></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control nome_razao" name="nome_razao" placeholder="" value="{{$cliente->nome_razao}}">
                                </div>
                            </div>
                            <div id="tipo_cpf" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rg">RG: <strong class="color-red">*</strong></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="rg" placeholder="Digite o RG" value="{{$cliente->rg}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="tipo_cnpj" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="nome_fantasia">Nome Fantasia:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nome_fantasia" placeholder="Digite o nome fantasia" value="{{$cliente->nome_fantasia}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rep_legal">Representante legal: <strong class="color-red">*</strong></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="rep_legal" placeholder="Digite o representante legal" value="{{$cliente->rep_legal}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="inscricao">Inscrição: <strong class="color-red">*</strong></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inscricao" placeholder="Digite o número de inscrição" value="{{$cliente->inscricao}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="data_nascimento">Data de Nascimento: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="data_nascimento" placeholder="Digite a data de nascimento" value="{{$cliente->data_nascimento}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="telefone">Telefone: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telefone" placeholder="Digite o número de telefone" value="{{$cliente->telefone}}">
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2" for="empresa">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{$cliente->id_empresa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cep">CEP: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cep" placeholder="Digite o número de cep" value="{{$cliente->cep}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="rua">Rua: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="rua" placeholder="Digite a rua" value="{{$cliente->rua}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="numero">Número: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="numero" placeholder="Digite o número da residência" value="{{$cliente->numero}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bairro">Bairro: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{$cliente->bairro}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cidade">Cidade: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade" value="{{$cliente->cidade}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="uf">Estado: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uf" placeholder="Digite o estado" value="{{$cliente->uf}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="/dashboard/clientes" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
        $(document).ready(function(){

            if ($("#radio_cpf").prop("checked")){

                $("#radio_cnpj").attr('disabled', true);
                $("#tipo_cnpj input").val("");
                $("#tipo_cnpj").hide();
                $("#tipo_cpf").show();
                $("#label_cpfCnpj").html('CPF: <strong class="color-red">*</strong>');
                $(".cpf_cnpj").attr('placeholder', 'Digite o número do CPF');
                $("#label_nomeRazao").html('Nome: <strong class="color-red">*</strong>');
                $(".nome_razao").attr('placeholder', 'Digite o nome');

            }else{

                $("#radio_cpf").attr('disabled', true);
                $("#tipo_cpf input").val("");
                $("#tipo_cpf").hide();
                $("#tipo_cnpj").show();
                $("#label_cpfCnpj").html('CNPJ: <strong class="color-red">*</strong>');
                $(".cpf_cnpj").attr('placeholder', 'Digite o número do CNPJ');
                $("#label_nomeRazao").html('Razão Social: <strong class="color-red">*</strong>');
                $(".nome_razao").attr('placeholder', 'Digite a razão social');
            }

            $("#radio_cpf").click(function () {
                $(".cpf_cnpj").val("");
                $("#tipo_cnpj input").val("");
                $("#tipo_cnpj").hide();
                $("#tipo_cpf").show();
                $("#label_cpfCnpj").html('CPF: <strong class="color-red">*</strong>');
                $(".cpf_cnpj").attr('placeholder', 'Digite o número do CPF');
                $("#label_nomeRazao").html('Nome: <strong class="color-red">*</strong>');
                $(".nome_razao").attr('placeholder', 'Digite o nome');
            });

            $("#radio_cnpj").click(function () {
                $(".cpf_cnpj").val("");
                $("#tipo_cpf input").val("");
                $("#tipo_cpf").hide();
                $("#tipo_cnpj").show();
                $("#label_cpfCnpj").html('CNPJ: <strong class="color-red">*</strong>');
                $(".cpf_cnpj").attr('placeholder', 'Digite o número do CNPJ');
                $("#label_nomeRazao").html('Razão Social: <strong class="color-red">*</strong>');
                $(".nome_razao").attr('placeholder', 'Digite a razão social');
            });

        });
    </script>

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
                        title: "Cliente alterado com sucesso!",   
                        type: "success",   
                        timer: 4000,   
                        showConfirmButton: false 
                        });
                        setTimeout("$(window.document.location).attr('href', '/dashboard/clientes'); ", 4000);                   				    	
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