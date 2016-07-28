@extends('site.template.empresa')

@section('content')

    <section class="container-fluid col-md-11 col-md-offset-2">

        <div class="col-sm-90 col-sm-offset-30 col-lg-10 col-lg-offset-1 main">
            <div class="row">
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cadastro de Usuário</div>
                        <div class="panel-body">
                            <div class="col-md-12">

                                <form method="POST" action="">
                                    {!! csrf_field() !!}


                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="password" class="form-control" placeholder="Senha" value="{{ old('password') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="empresa"  class="form-control" placeholder="Empresa" value="{{ old('cep') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="plano"  class="form-control" placeholder="Plano" value="{{ old('rua') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="{{ old('numero') }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary"> Cadastrar Usuário</button>
                                    <!--<button type="reset" class="btn btn-default">Limpar</button>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->

        </div><!--/.main-->
    </section>

@endsection