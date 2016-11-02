<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="{{ url('/assets/site/imagens/icone-imob.png') }}" type="image/x-icon" />
    <title>ImobWeb - Imagem Imóvel</title>
</head>
<body>
<figure>
    <img src="{{url('/documentos/'.$imobiliaria->razao_social.'/imagens/imóvel - '.$codigoImovel.'/'.$item->titulo)}}"/>
</figure>
</body>
</html>
