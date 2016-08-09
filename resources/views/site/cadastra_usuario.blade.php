@extends('site.template.empresa')

@section('content')
    <div class="row container">
        <div class="row">
            <div class="col s6 offset-s3">
                <div class="card-panel">
                    <div class="row">
                        <h5 class="card-title center-align"><strong>Cadastre seu Usuário</strong></h5>

                    </div>

                    <form method="POST" id="formValidate" action="" send="">
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
                                <select>
                                    <option value="" disabled selected>Selecione uma opção</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label for="cargo">Cargo <strong style="color: red">*</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input disabled name="empresa" id="empresa" type="text" class="validate" value="{{$empresa->razao_social }}">
                                <label for="empresa">Empresa</label>
                            </div>
                        </div>

                        <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action">Cadastrar Usuário
                            <i class="material-icons right">send</i>
                        </button>
                    </form>

                    <div class="row">
                        <div class="col s12 m12 table-alert" style="display: none">
                            <div class="card amber lighten-3">
                                <div class="card-content ">
                                    <div class="message-error" role="alert"></div>
                                </div>
                            </div>
                        </div>

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
    {{-- ATIVANDO O SELECT DO MATERIALIZE --}}
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

    {{-- AJAX PARA CADASTRO DE EMPRESA --}}
    <script>
        $(function () {
            jQuery("form").submit(function () {
                jQuery(".table-alert").hide();

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
                        jQuery(".message-error").html(data);
                        jQuery(".table-alert").show();
                        jQuery(".table-alert").focus();
                        setTimeout("jQuery('.table-alert').hide();", 6000);
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