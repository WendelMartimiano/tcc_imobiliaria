@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li class="active"><a href="/dashboard/imoveis"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Imoveis</a></li>
            <li><a href="/dashboard/funcionarios"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Funcionários</a></li>
            <li><a href="/dashboard/clientes"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Clientes</a></li>
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
                <li><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg></li>
                <li><a href="">Imóveis</a></li>
                <li class="active">Cadastro de Imóvel</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastro de Imóvel</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe os dados do novo imóvel.</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="" send="">
                            {!! csrf_field() !!}
                            <div class="form-group" hidden>
                                <label class="control-label col-sm-2" for="empresa">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_empresa" placeholder="empresa" value="{{Auth::user()->id_empresa}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tipo_imovel">Tipo de imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <select name="id_tipo_imovel" class="form-control">
                                        <option value="">Selecione uma opção</option>
                                        <option value="">Apartamento</option>
                                        <option value="">Casa</option>
                                        <option value="">Rancho</option>
                                        <option value="">Chacara</option>
                                        <option value="">Terreno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cpf_cnpj">CPF/CNPJ vendedor: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cpf_cnpj" placeholder="Digite CPF ou CNPJ do vendedor" value="{{old('cpf_cnpj')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cep">CEP: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cep" placeholder="Digite o CEP" value="{{old('cep')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="rua">Rua: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="rua" placeholder="Digite a rua" value="{{old('rua')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bairro">Bairro: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{old('bairro')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="cidade">Cidade: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade" value="{{old('cidade')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="estado">Estado: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="estado" placeholder="Digite o estado" value="{{old('estado')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="descricao">Descrição: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <textarea name="descricao" class="form-control" cols="30" rows="10" placeholder="Digite a descrição do imóvel"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="valor">Valor do Imóvel: <strong class="color-red">*</strong></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="valor" placeholder="Digite o valor do imóvel" value="{{old('valor')}}">
                                </div>
                            </div>
                            <div class="form-group form-inline">
                                <label for="situação" class="control-label col-sm-2">Situação: </label>
                                <label class="form-check-inline col-sm-2">
                                    <input class="form-check-input" type="radio" name="status" value="N"> Imóvel Novo
                                </label>
                                <label class="form-check-inline ">
                                    <input class="form-check-input" type="radio" name="status" value="U"> Imóvel Usado
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <a href="" class="btn btn-default">Cancelar</a>
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