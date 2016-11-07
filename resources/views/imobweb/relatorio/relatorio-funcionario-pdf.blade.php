<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Funcionários</title>


    <link href="{{url('assets/imobweb/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div align="center">
    <table class="ContTable" style="width: 750pt;" border="0"
           cellpadding="0" cellspacing="0" width="646">
        <tbody>
        <tr style="">
            <td style="padding: 0cm;">
                <p class="Cont"
                   style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><b><u><span
                                    style="font-size: 15pt; font-family: quot, Verdana, sans-serif;">RELATÓRIO DE FUNCIONÁRIOS </span></u></b></p>
            </td>
        </tr>

        <tr style=""> </br>
            <td style="padding: 0cm;" valign="top">

                <!--RELATÓRIO DE FUNCIONÁRIOS-->
                <p class="Cont" style="text-align: justify; line-height: normal;"><b><span
                                style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">
                                    DATA: {{ date('d/m/Y') }}.</span></b>
                </p>

                <table class="ContTable" style="width: 750pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    <thead>
                    <tr>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">NOME / RAZÃO SOCIAL</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">CPF / CNPJ</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">FUNÇÃO</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">TELEFONE</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">SITUAÇÃO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($funcionarios as $funcionario)
                        <tr>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$funcionario->nome_razao}}</td>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$funcionario->cpf_cnpj}}</td>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$funcionario->funcao}}</td>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$funcionario->telefone}}</td>
                            @if($funcionario->deleted_at == NULL)
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">ATIVO</td>
                            @else
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">DEMITIDO</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>
</body>
</html>