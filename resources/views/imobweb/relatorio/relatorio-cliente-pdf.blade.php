<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Clientes</title>


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
                                    style="font-size: 15pt; font-family: quot, Verdana, sans-serif;">RELATÓRIO DE CLIENTES </span></u></b></p>
            </td>
        </tr>

        <tr style=""> </br>
            <td style="padding: 0cm;" valign="top">

                <!--RELATÓRIO DE CLIENTES-->
                <p class="Cont" style="text-align: justify; line-height: normal;"><b><span
                                style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">
                                    DATA: {{ date('d/m/Y') }}.</span></b>
                </p>

                <table class="ContTable" style="width: 750pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    <thead>
                    <tr>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">NOME / RAZÃO SOCIAL</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">CPF / CNPJ</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">TIPO PESSOA</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">TIPO CLIENTE</th>
                        <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">TELEFONE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$cliente->nome_razao}}</td>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$cliente->cpf_cnpj}}</td>
                            @if($cliente->tipo_pessoa == 'F')
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">FÍSICA</td>
                            @else
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">JURÍDICA</td>
                            @endif
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$cliente->tipo}}</td>
                            <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$cliente->telefone}}</td>
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