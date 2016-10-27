@extends('imobweb.template.index')

@section('content')
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <ul class="nav menu">
            <li><a href="/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
            <li class="active"><a href="/dashboard/imoveis"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Imoveis</a></li>
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
                <li><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></li>
                <li><a href="/dashboard/imoveis">Imóveis</a></li>
                <li class="active">Cadastro de Imagem</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastro de Imagem</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Imóvel: {{$dadosImovel->codigo}}, localizado no: {{$dadosImovel->bairro}}.</div>
                    <div class="panel-body">
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Selecionar arquivos...</span>

                            <input id="fileupload" type="file" name="imagem"
                                   data-token="{!! csrf_token() !!}"
                                   data-id-imovel="{!! $imovel->id !!}">
				        </span>
                        <br>
                        <br>

                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped"></div>
                        </div>

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {!! Session::get('success') !!}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Enviado em</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($imovel->imagens as $imagem)
                                <tr>
                                    <td>{!! $imagem->caminho !!}</td>
                                    <td>{!! $imagem->created_at !!}</td>
                                    <td>
                                        <a href="/dashboard/imoveis/download-imagem/{{$imovel->id}}/{{$imagem->id}}" class="btn btn-xs btn-success">download</a>
                                        <a href="/dashboard/imoveis/deleta-imagem/{{$imovel->id}}/{{$imagem->id}}" class="btn btn-xs btn-danger">excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {{-- --}}
    <script>
        ;(function($)
        {
            'use strict';
            $(document).ready(function()
            {
                var $fileupload     = $('#fileupload');

                $fileupload.fileupload({
                    url: '/dashboard/imoveis/upload-imagem',
                    method: "POST",
                    formData: {_token: $fileupload.data('token'), idImovel: $fileupload.data('idImovel')},
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .progress-bar').css(
                                'width',
                                progress + '%'
                        );
                    },
                    done: function (e, data) {
                        /*setTimeout(function(){*/
                        location.reload();
                        /*}, 2000);*/
                    }
                });
            });
        })(window.jQuery);
    </script>
@endsection