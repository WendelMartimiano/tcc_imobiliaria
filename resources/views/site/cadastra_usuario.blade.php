@extends('site.template.empresa')

@section('content')
    <div class="row container">
        <div class="row">
            <div class="col s6 offset-s3">
                <div class="card-panel">
                    <div class="row">
                        <h5 class="card-title center-align"><strong>Cadastre seu Usuário</strong></h5>
                    </div>

                    <form method="POST" id="formValidate" action="/site/usuario" send="/site/usuario">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="name" id="nome" type="text" class="validate" value="{{ old('name') }}">
                                <label for="nome">Nome <strong style="color: red">*</strong></label>
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
                                <input name="password" id="senha" type="password" class="validate" value="{{ old('password') }}">
                                <label for="senha">Senha <strong style="color: red">*</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="password_confirmation" id="confirma_senha" type="password" class="validate" >
                                <label for="confirma_senha">Confirmar Senha <strong style="color: red">*</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select id="select_cargo" onchange="pegaCargo(this)">
                                    <option value="">Selecione uma opção</option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
                                    @endforeach
                                </select>
                                <input name="id_cargo" value="" type="hidden">
                                <label for="cargo">Cargo <strong style="color: red">*</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input disabled name="empresa" id="empresa" type="text" class="validate" value="{{$empresa->razao_social }}">
                                <input name="id_empresa" value="{{$empresa->id}}" type="hidden">
                                <label for="empresa">Empresa</label>
                            </div>
                        </div>

                        <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Cadastrar Usuário
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
@endsection

@section('script')
    {{-- ATIVANDO O SELECT DO MATERIALIZE --}}
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    {{-- AJAX PARA CADASTRO DE USUÁRIO --}}
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
                        $(window.document.location).attr('href', "/site");
                    }else{
                        finalizaPreloader();
                        for(var t in data){
                            Materialize.toast(data[t], 10000, "toast-warnning");
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

        function pegaCargo(param) {

            $('[name=id_cargo]').val($(param).val());
        }
    </script>

@endsection