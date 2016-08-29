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

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Informe os dados do Funcionário.</div>
                    <div class="panel-body">

                        <!--  Para o usuario não preencher na primeira linha do formulario (codigo do imovel) -->
                        <fieldset disabled>
                            <label class="col-md-3 control-label" for="disabledTextInput">Codigo do Funcionário: </label>
                            <div class="col-md-9">
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Preenchimento automatico">
                            </div>
                        </fieldset>

                        <div class="col-md-3 control-label">
                            <label>Função:</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control">
                                <option> Escolha uma opção</option>
                                <option>Administrativo</option>
                                <option>Auxiliar</option>
                                <option>Corretor</option>
                            </select>
                        </div>

                        <!--   Se for corretor habilita para colocar o Creci, se não for correto opção fica bloqueada ou não diponivel-->
                        <label class="col-md-3 control-label" for="name">Creci: </label>
                        <div class="col-md-9">
                            <input id="creci" name="creci" type="text" placeholder="Digite o Creci" class="form-control">
                        </div>

                        <label class="col-md-3 control-label" for="name">CPF / CNPJ: </label>
                        <div class="col-md-9">
                            <input id="cpf" name="cpf" type="text" placeholder="Digite o CFP ou CNPJ" class="form-control">
                        </div>
                        <label class="col-md-3 control-label" for="name">RG / Inscrição: </label>
                        <div class="col-md-9">
                            <input id="rg" name="rg" type="text" placeholder="Digite o RG ou Inscrição" class="form-control">
                        </div>
                        <label class="col-md-3 control-label" for="name">Data Nascimento: </label>
                        <div class="col-md-9">
                            <input id="dataNasc" name="dataNasc" type="text" placeholder="Informe a Data de Nascimento" class="form-control">
                        </div>
                        <label class="col-md-3 control-label" for="name">Nome: </label>
                        <div class="col-md-9">
                            <input id="nome" name="nome" type="text" placeholder="Nome completo" class="form-control">
                        </div>
                        <label class="col-md-3 control-label" for="name">Endereço: </label>
                        <div class="col-md-9">
                            <input id="endreco" name="endereco" type="text" placeholder="Digite o endereço" class="form-control">
                        </div>
                        <label class="col-md-3 control-label" for="name">Telefone / Celular: </label>
                        <div class="col-md-9">
                            <input id="telefone" name="telefone" type="text" placeholder="Digite o Telefone ou Celular" class="form-control">
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                Demitido (Este funcionário será inativado e todo seu acesso bloqueado)
                            </label>
                        </div>


                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="/dashboard/funcionarios" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection