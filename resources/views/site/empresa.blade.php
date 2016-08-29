@extends('site.template.empresa')

@section('content')
    <div class="row container">
      <div class="row">
          <div class="col s6 offset-s3">
            <div class="card-panel">
              <div class="row">
                <h5 class="card-title center-align"><strong>Cadastre sua Empresa</strong></h5>
              </div>

              <form method="POST" id="formValidate" action="/site/empresa" send="/site/empresa">
                {!! csrf_field() !!}

                {{--validando e listando o plano selecionado no site--}}
                @if($plano->id == 1)
                    <div class="row">
                    <div class="input-field col s12">
                        <input disabled name="nome_plano" value="{{$plano->nome}} - 100% {{$plano->valor}}" id="disabled" type="text" class="validate">
                        <input name="id_plano" value="{{$plano->id}}" type="hidden">
                        <label for="disabled">Plano</label>
                    </div>
                    </div>
                @else 
                    <div class="row">
                    <div class="input-field col s12">
                        <input disabled name="nome_plano" value="{{$plano->nome}} - R${{$plano->valor}}" id="disabled" type="text" class="validate">
                        <input name="id_plano" value="{{$plano->id}}" type="hidden">
                        <label for="disabled">Plano</label>
                    </div>
                    </div>
                @endif

                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="razao_social" id="razao_social" type="text" class="validate" value="{{ old('razao_social') }}">
                    <label for="razao_social">Razão Social <strong style="color: red">*</strong></label>
                  </div>
                </div>                
                <div class="row">
                  <div class="input-field col s12">
                    <input name="cnpj" id="cnpj" type="text" class="validate" value="{{ old('cnpj') }}">
                    <label for="cnpj">CNPJ <strong style="color: red">*</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate" value="{{ old('email') }}">
                    <label for="email">E-mail <strong style="color: red">*</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="telefone" id="telefone" type="text" class="validate" value="{{ old('telefone') }}">
                    <label for="telefone">Telefone / Celular: <strong style="color: red">*</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="inscricao" id="inscricao" type="text" class="validate" value="{{ old('inscricao') }}">
                    <label for="inscricao">Inscrição <strong style="color: red">*</strong></label>
                  </div>
                </div>
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="cep" id="cep" type="text" class="validate" value="{{ old('cep') }}">
                    <label for="cep">CEP <strong style="color: red">*</strong></label>
                  </div>
                </div>                 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="rua" id="rua" type="text" class="validate" value="{{ old('rua') }}">
                    <label for="rua">Rua <strong style="color: red">*</strong></label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="numero" id="num" type="text" class="validate" value="{{ old('numero') }}">
                    <label for="numero">Número <strong style="color: red">*</strong></label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="bairro" id="bairro" type="text" class="validate" value="{{ old('bairro') }}">
                    <label for="bairro">Bairro <strong style="color: red">*</strong></label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="cidade" id="cidade" type="text" class="validate" value="{{ old('cidade') }}">
                    <label for="cidade">Cidade <strong style="color: red">*</strong></label>
                  </div>
                </div>
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="uf" id="uf" type="text" class="validate" value="{{ old('uf') }}">
                    <label for="uf">UF <strong style="color: red">*</strong></label>
                  </div>
                </div>  
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="creci" id="creci" type="text" class="validate" value="{{ old('creci') }}">
                    <label for="creci">CRECI <strong style="color: red">*</strong></label>
                  </div>
                </div> 
                <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Cadastrar Empresa
                  <i class="material-icons right">send</i>
                </button>
              </form>

                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <div class="progress">
                            <div class="indeterminate"></div>
                        </div>
                        <p class="center-align">Enviando dados, por favor aguarde..</p>
                    </div>
                </div>
            </div>
          </div>
        </div>  
@endsection


@section('script')

    {{-- API DE CEP --}}
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("num").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>

      {{-- AJAX PARA CADASTRO DE EMPRESA --}}
      <script>
          $(function () {
              jQuery("form").submit(function () {

                  var dadosForm = jQuery(this).serialize();

                  jQuery.ajax({
                      url: jQuery(this).attr("send"),
                      data: dadosForm,
                      type: "POST",
                      beforeSend: iniciaPreloader()
                  }).done(function (data) {
                      if(!isNaN(data)){

                          $(window.document.location).attr('href', "/site/usuario/" + data);

                      }else{
                          finalizaPreloader();

                          for(var t in data){
                              console.log(data);
                              Materialize.toast(data[t], 5000, "toast-warnning");
                          }
                      }
                  }).fail(function () {
                      finalizaPreloader();
                      alert("Falha Inesperada! Informe o erro a ImobWeb no contato (16)99999-9999.");
                     jQuery(window.document.location).attr('href','/site');
                  });

                  return false;
              });
          });

          function iniciaPreloader() {
              $('#modal1').openModal({dismissible: false});
          }

          function finalizaPreloader() {
              $('#modal1').closeModal({dismissible: false});
          }
      </script>
@endsection