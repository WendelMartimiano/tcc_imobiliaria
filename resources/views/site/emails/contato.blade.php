<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-mail-ImobWeb</title>
</head>
<body style="margin: 5; padding: 0;" bgcolor="#E5E5E5">
<table bgcolor="#222" align="center" cellpadding="0" cellspacing="0" width="600" border="0" style="border-radius: 15px 15px 15px 15px; color: #333; ">

    <tr align="center">
        <td  style="padding: 5px 5px 5px 5px;">
            <img src="{{url('/assets/site/imagens/email-icon.png')}}" alt="" width="100" height="100" style="display: block;" />
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFF" style="padding: 20px 0 20px 0; font-size: 30px; font-weight: bold;">
            Contato ImobWeb
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFF" style="padding: 20px 0 20px 0; font-size: 16px;">
            {{$nome}}
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFF" style="font-size: 16px;">
            {{$email}}
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFF" style="padding: 20px 0 20px 0; font-size: 16px;">
            {{$mensagem}}
        </td>
    </tr>
    <tr align="center">
        <td  style="padding: 5px 5px 5px 5px; font-size: 30px; font-weight: bold;">
            <img src="{{url('/assets/site/imagens/home-icon.png')}}" alt="" width="100" height="100" style="display: block;" />
        </td>
    </tr>

</table>

</body>
</html>