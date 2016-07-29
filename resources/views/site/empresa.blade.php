@extends('site.template.empresa')

@section('content')


    <div class="row container">
      <div class="row">
          <div class="col s6 offset-s3">
            <div class="card-panel">
              <div class="row">
                <h5 class="card-title indigo-text">Cadastre sua Empresa</h5>
                <div class="divider"></div>
              </div>              
              <form method="POST" action="/site/empresa" send="/site/empresa">
                {!! csrf_field() !!}
                <!--
                <div class="alert alert-warning mensagem-warning" role="alert" style="display: none"></div>
                <div class="alert alert-success mensagem-success" role="alert" style="display: none"></div>
                -->

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
                    <label for="razao_social">Razão Social</label>
                  </div>
                </div>                
                <div class="row">
                  <div class="input-field col s12">
                    <input name="cnpj" id="cnpj" type="text" class="validate" value="{{ old('cnpj') }}">
                    <label for="cnpj">CNPJ</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate" value="{{ old('email') }}">
                    <label for="email">E-mail</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="inscricao" id="inscricao" type="text" class="validate" value="{{ old('inscricao') }}">
                    <label for="inscricao">Inscrição</label>
                  </div>
                </div>
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="cep" id="cep" type="text" class="validate" value="{{ old('cep') }}">
                    <label for="cep">CEP</label>
                  </div>
                </div>                 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="rua" id="rua" type="text" class="validate" value="{{ old('rua') }}">
                    <label for="rua">Rua</label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="numero" id="num" type="text" class="validate" value="{{ old('numero') }}">
                    <label for="numero">Número</label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="bairro" id="bairro" type="text" class="validate" value="{{ old('bairro') }}">
                    <label for="bairro">Bairro</label>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="cidade" id="cidade" type="text" class="validate" value="{{ old('cidade') }}">
                    <label for="cidade">Cidade</label>
                  </div>
                </div>
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="uf" id="uf" type="text" class="validate" value="{{ old('uf') }}">
                    <label for="uf">UF</label>
                  </div>
                </div>  
                <div class="row">                  
                  <div class="input-field col s12">
                    <input name="creci" id="creci" type="text" class="validate" value="{{ old('creci') }}">
                    <label for="creci">CRECI</label>
                  </div>
                </div> 
                <button class="btn waves-effect waves-light indigo darken-2" type="submit" name="action">Cadastrar Empresa
                  <i class="material-icons right">send</i>
                </button>
              </form>
              <div class="loader" >Enviando os dados, por favor aguarde...
                <div class='preloader' >
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
              </div>
            </div>
          </div>
        </div>  




@endsection


<!--MASCARAS DOS CAMPOS E INTEGRAÇÃO COM API DE CEP-->
@section('script')
    <script>
        jQuery(function($){
            $("#cep").mask("99999-999");
            $("#cnpj").mask("99.999.999/9999-99");


            var last_cep = 0;

            $('#cep').on('keyup',function(){
                var cep = $.trim($('#cep').val()).replace('_','');
                if(cep.length >= 9){
                    if(cep != last_cep){
                        busca();
                    }
                }
            });


            function busca() {
                var cep = $.trim($('#cep').val());
                var url = 'http://clareslab.com.br/ws/cep/json/'+cep+'/';

                $.post(url,{
                            cep:cep
                        },
                        function (rs) {
                            console.log(rs)
                            if(rs != 0){
                                rs = $.parseJSON(rs);

                                $('#rua').val(rs.endereco);
                                $('#bairro').val(rs.bairro);
                                $('#cidade').val(rs.cidade);
                                $('#uf').val(rs.uf);
                                $('#cep').removeClass('invalid');
                                $('#num').focus();

                                last_cep = cep;
                            }
                            else{
                                $('#cep').addClass('invalid');
                                $('#cep').focus();
                                last_cep = 0;
                            }
                        })
            }
        });


    </script>

    <!--AJAX DO CADASTRO DE EMPRESA-->
    <script>
        $(function () {
            jQuery("form").submit(function () {
                jQuery(".mensagem-warning").hide();
                jQuery(".mensagem-success").hide();

                var dadosForm = jQuery(this).serialize();

                jQuery.ajax({
                    url: jQuery(this).attr("send"),
                    data: dadosForm,
                    type: "POST",
                    beforeSend: iniciaPreloader()
                }).done(function (data) {
                    if(data == 1){

                        setTimeout("jQuery(window.document.location).attr('href','/site/usuario');", 5000);

                    }else{
                        finalizaPreloader();
                        jQuery(".mensagem-warning").html(data);
                        jQuery(".mensagem-warning").show();

                        setTimeout("jQuery('.mensagem-warning').hide();", 5000);
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
            jQuery(".loader").show();
        }
        
        function finalizaPreloader() {
            jQuery(".loader").hide();
        }
    </script>
@endsection