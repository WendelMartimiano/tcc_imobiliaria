@extends('site.template.empresa')

@section('content')


<section class="container-fluid col-md-11 col-md-offset-2">

    <div class="col-sm-90 col-sm-offset-30 col-lg-10 col-lg-offset-1 main">
        <div class="row">
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastre sua Empresa</div>
                    <div class="panel-body">
                        <div class="col-md-12">

                            <form method="POST" action="/site/empresa" send="/site/empresa">
                                {!! csrf_field() !!}

                                <div class="alert alert-warning mensagem-warning" role="alert" style="display: none"></div>
                                <div class="alert alert-success mensagem-success" role="alert" style="display: none"></div>

                                {{--validando e listando o plano selecionado no site--}}
                                @if($plano->id == 1)

                                    <div class="form-group">
                                        <input type="text" name="nome_plano" class="form-control" placeholder="Plano selecionado" value="{{$plano->nome}} - 100% {{$plano->valor}}" disabled>
                                        <input type="hidden" name="id_plano" class="form-control" placeholder="Plano selecionado" value="{{$plano->id}}">
                                    </div>

                                @else

                                    <div class="form-group">
                                        <input type="text" name="nome_plano" class="form-control" placeholder="Plano selecionado" value="{{$plano->nome}} - R${{$plano->valor}}" disabled>
                                        <input type="hidden" name="id_plano" class="form-control" placeholder="Plano selecionado" value="{{$plano->id}}">
                                    </div>

                                @endif

                                <div class="form-group">
                                    <input type="text" name="razao_social" class="form-control" placeholder="Razão Social *" value="{{ old('razao_social') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ *" value="{{ old('cnpj') }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail *" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="inscricao" class="form-control" placeholder="Inscrição *" value="{{ old('inscricao') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP *" value="{{ old('cep') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="rua" id="rua" class="form-control" placeholder="Rua *" value="{{ old('rua') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="numero" id="num" class="form-control" placeholder="Número *" value="{{ old('numero') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro *" value="{{ old('bairro') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade *" value="{{ old('cidade') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="uf" id="uf" class="form-control" placeholder="UF *" value="{{ old('uf') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="creci" class="form-control" placeholder="CRECI *" value="{{ old('creci') }}">
                                </div>

                                <button type="submit" class="btn btn-primary"> Cadastrar Empresa</button>
                                <!--<button type="reset" class="btn btn-default">Limpar</button>-->
                            </form>

                            <div class="loader" style="display: none">Enviando os dados, por favor aguarde...
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
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div><!--/.main-->
</section>
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