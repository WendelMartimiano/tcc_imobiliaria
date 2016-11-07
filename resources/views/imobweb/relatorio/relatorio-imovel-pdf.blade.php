<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório de Imóveis</title>


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
                                        style="font-size: 15pt; font-family: quot, Verdana, sans-serif;">RELATÓRIO DE IMÓVEL </span></u></b></p>
                </td>
            </tr>

            <tr style=""> </br>
                <td style="padding: 0cm;" valign="top">

                    <!--RELATÓRIO DE IMÓVEIS-->
                    <p class="Cont" style="text-align: justify; line-height: normal;"><b><span
                                    style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">
                                    DATA: {{ date('d/m/Y') }}.</span></b>
                    </p>

                    <table class="ContTable" style="width: 750pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                        <thead>
                            <tr>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">CÓD. IMÓVEL</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">TIPO DE IMÓVEL</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">ENDEREÇO</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">STATUS</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">SITUAÇÃO</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">VALOR</th>
                                <th style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">VENDEDOR</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($imoveis as $imovel)
                            <tr>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->codigo}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->tipo}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->rua}}, {{$imovel->numero}} - {{$imovel->cidade}}, {{$imovel->uf}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->status}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->situacao}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->valor}}</td>
                                <td style="font-size: 7.5pt; text-align: center; font-family: quot, Verdana, sans-serif;">{{$imovel->vendedor}}</td>
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