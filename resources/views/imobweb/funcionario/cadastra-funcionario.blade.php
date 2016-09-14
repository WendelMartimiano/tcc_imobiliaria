@extends('imobweb.template.index')

@section('content')

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li class="active"><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
            <li><a href="/dashboard/contratos"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Contratos</a></li>
            <li><a href="/dashboard/relatorios"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Relatórios</a></li>

            <li role="presentation" class="divider"></li>
            <li><a href="/dashboard/imobiliaria"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Imobiliaria</a></li>
        </ul>

    </div><!--/.sidebar-->
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
                <li class="active">Funcionários / Cadastro de Funcionário</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastro de Funcionário</h1>
            </div>
        </div><!--/.row-->

        <!--Messages 
        <div class="alert alert-success" id="message-success" role="alert" style="display: none"></div>
        <div class="alert alert-danger" id="message-danger" role="alert" style="display: none"></div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe os dados do novo funcionário.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/dashboard/cadastra-funcionario" send="/dashboard/cadastra-funcionario">
                            {!! csrf_field() !!}
                            <div class="form-group form-inline">
                                <label for="tipo_pessoa" class="control-label col-sm-2">Tipo Pessoa: </label>
                                <label class="form-check-inline col-sm-1">
                                    <input class="form-check-input" type="radio" name="tipo_pessoa" id="radio_cpf" value="F"> CPF
                                </label>
                                <label class="form-check-inline ">
                                    <input class="form-check-input" type="radio" name="tipo_pessoa" id="radio_cnpj" value="J"> CNPJ
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" id="label_tipoPessoa"  for="cpf_cnpj"></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control cpf_cnpj" name="cpf_cnpj" placeholder="" value="{{old('cpf_cnpj')}}">
                                </div>
                            </div>
                            <div id="tipo_cpf" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="nome">Nome:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nome" placeholder="Digite o nome" value="{{old('nome')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rg">RG:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="rg" placeholder="Digite o RG" value="{{old('rg')}}">
                                    </div>
                                </div>
                            </div>
                            <div id="tipo_cnpj" style="display: none;">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="razao_social">Razão Social:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="razao_social" placeholder="Digite a razão social" value="{{old('razao_social')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rep_legal">Representante legal:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="rep_legal" placeholder="Digite o representante legal" value="{{old('rep_legal')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="inscricao">Inscrição:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inscricao" placeholder="Digite o número de inscrição" value="{{old('inscricao')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="creci">CRECI:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="creci" placeholder="Digite o número de creci" value="{{old('creci')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="data_nascimento">Data de Nascimento:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="data_nascimento" placeholder="Digite a data de nascimento" value="{{old('data_nascimento')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="telefone">Telefone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telefone" placeholder="Digite o número de telefone" value="{{old('telefone')}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="usuario" class="control-label col-sm-2">Usuário do Sistema:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="select_user" onchange="pegaUser(this)">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <input name="id_user" value="" type="hidden">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="cargo" class="control-label col-sm-2">Cargo:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="select_cargo" onchange="pegaCargo(this)">
                                        <option value="">Selecione uma opção</option>
                                        @foreach($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                                        @endforeach
                                    </select>
                                    <input name="id_cargo" value="" type="hidden">
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2" for="empresa">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{$empresa->id}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cep">CEP:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cep" placeholder="Digite o número de cep" value="{{old('cep')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="rua">Rua:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="rua" placeholder="Digite a rua" value="{{old('rua')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="numero">Número:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="numero" placeholder="Digite o número da residência" value="{{old('numero')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{old('bairro')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade" value="{{old('cidade')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="uf">Estado:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="uf" placeholder="Digite o estado" value="{{old('uf')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="/dashboard/funcionarios" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>
                        </div>                                               
                    </div>
                </div>
            </div>            
        </div>        
    </div>
    
    <!-- Modal Preloader -->
    <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="spinner"></div>
            <p class="spinner-text">carregando..</p>
            </div>
        </div>
    </div>

    <!-- Modal Status Success-->
	<div class="modal fade bs-example-modal-sm" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header header-success">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>					 
                    <h4 class="modal-title" id="message-success"></h4>
				</div>								
			</div>
		</div>
	</div>

    <!-- Modal Status Warning-->
	<div class="modal fade bs-example-modal-sm" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header header-warning">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>					 
                    <h4 class="modal-title" id="message-warning"></h4>
				</div>								
			</div>
		</div>
	</div>

@endsection

@section('cadastra-funcionario')
<script>
    $(document).ready(function(){
        

         $("#radio_cpf").attr('checked', true);

         if ($("#radio_cpf").prop("checked")){
             $("#tipo_cnpj").hide();
             $("#tipo_cpf").show();
             $("#label_tipoPessoa").html('CPF:');
             $(".cpf_cnpj").attr('placeholder', 'Digite o número do CPF');
         }else{
             $("#tipo_cpf").hide();
             $("#tipo_cnpj").show();
             $("#label_tipoPessoa").html('CNPJ:');
             $(".cpf_cnpj").attr('placeholder', 'Digite o número do CNPJ');
         }

        $("#radio_cpf").click(function () {
            $("#tipo_cnpj").hide();
            $("#tipo_cpf").show();
            $("#label_tipoPessoa").html('CPF:');
            $(".cpf_cnpj").attr('placeholder', 'Digite o número do CPF');
        });
        $("#radio_cnpj").click(function () {
            $("#tipo_cpf").hide();
            $("#tipo_cnpj").show();
            $("#label_tipoPessoa").html('CNPJ:');
            $(".cpf_cnpj").attr('placeholder', 'Digite o número do CNPJ');
        });           

    });

    function pegaCargo(param) {
        $('[name=id_cargo]').val($(param).val());
    }
    function pegaUser(param) {
        $('[name=id_user]').val($(param).val());
    }
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
                    $('#message-success').html("Funcionário cadastrado com sucesso!");
                    $('#modalSuccess').modal('show');                     				    	
                }else{
                    $('#message-warning').html(data);
                    $('#modalWarning').modal('show');	
                }
                
            }).fail(function(){
                finalizaPreloader();			    
			    alert("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.");
            });
            return false;
        });
    });

    function iniciaPreloader(){
        $('#myModal').modal({backdrop: 'static',  keyboard: false})
    }

    function finalizaPreloader(){        
        $('#myModal').modal('hide');
    }
</script>
@endsection