@extends('site.template.site')

@section('content')
<header class="header">
    <div class="container">
        <div class="logo">
            <img src="{{ url('/assets/site/imagens/wendel.png') }}" alt="ImobWeb" title="Sistema de apoio a gestão de vendas a imobiliárias" class="logo">
            <span class="logo">ImobWeb</span>
        </div>
        <nav>
            <ul class="menu">
                <li>
                    <a href="#home" class="scroll">HOME</a>
                </li>
                <li>
                    <a href="#diferencial" class="scroll">DIFERENCIAL</a>
                </li>
                <li>
                    <a href="#planos" class="scroll">PLANOS</a>
                </li>
                <li>
                    <a href="#contato" class="scroll">CONTATO</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="clear"></div>
<!--Final do Header-->

<section class="parallax text-center background-parallax color-white" id="home">
    <h1 class="titulo-parallax">ImobWeb</h1>
    <p class="descricao-parallax">Perfeito para apoio a gestão de vendas de sua imobiliária.</p>
    <p class="descricao-parallax2">Já é nosso cliente? Efetue seu acesso ao login<a class="login" href="#">clicando aqui.</a></p>

    <a class="btn-escolha-plano scroll" href="#planos">
        <i class="fa fa-shopping-cart fa-lg carrinho-compra" aria-hidden="true"></i>Escolha seu Plano</a>
</section>
<div class="clear"></div>
<!--Final da Section Home-->

<section class="diferencial" id="diferencial">

    <div class="container text-center padding-50">
        <h1 class="titulo">Diferêncial</h1>
        <div class="divider"></div>
        <p class="descricao">Confira nossos diferênciais em soluções para seu negócio.</p>

        <article class="col-md-3 detalhe-diferencial">
            <img src="{!! url('/assets/site/imgs/icones-detalhes/orientacao-especializati.png') !!}" alt="Eficiência" title="Eficiência">
            <h1 class="titulo-diferencial">Eficiência</h1>
            <p class="diferencial">Tenha a melhor agilidade e organização para encontrar o imóvel certo para seu cliente, a partir da preferência de seu cliente e as opções do imóvel.</p>
        </article>

        <article class="col-md-3 detalhe-diferencial">
            <img src="{!! url('/assets/site/imgs/icones-sobre/suporte-especializati.png') !!}" alt="Auxilio a Vendas" title="Auxilio a Vendas">
            <h1 class="titulo-diferencial">Auxilio a Vendas</h1>
            <p class="diferencial">Oferece melhor praticidade e facilidade para a concretização na venda de imóveis, vinculando imóvel, cliente, corretor e imobiliária, tudo em um tipo de contrato selecionado.</p>
        </article>

        <article class="col-md-3 detalhe-diferencial">
            <img src="{!! url('/assets/site/imgs/icones-sobre/conteudo-exclusivo-especializati.png') !!}" alt="Econômia e Suporte" title="Econômia e Suporte">
            <h1 class="titulo-diferencial">Econômia e Suporte</h1>
            <p class="diferencial">Tenha mais controle de seu negócio visando a econômia e lucro de sua imobiliária.</p>
        </article>

        <article class="col-md-3 detalhe-diferencial">
            <img src="{!! url('/assets/site/imgs/icones-detalhes/certificado-digital-especializati.png') !!}" alt="Relatórios" title="Relatórios">
            <h1 class="titulo-diferencial">Relatórios</h1>
            <p class="diferencial">Facilidade em gerar relatórios para maior controle, gestão e acompanhamento dos resultados para auxílio nas tomadas de decisões.</p>
        </article>
    </div>
</section>
<div class="clear"></div>
<!--Final da Section Diferencial-->

<section class="planos text-center padding-1 color-grey" id="planos">

    <!--Triangulo da Página-->
    <svg class="triangle" width="100" height="48" >
        <path d="m0,0l50,43l50,-43l-100,0z" class="triangle-white"></path>
    </svg>

    <div class="container padding-50">
        <h1 class="titulo color-white">Planos</h1>
        <div class="divider"></div>
        <p class="descricao color-white">Escolha o plano que irá atender a sua necessidade.</p>

    {{--validando e listando o plano "STARTER" e suas opções --}}
        @foreach($planos as $plano)
            @if($plano->id == 1)
                <article class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading color-plano2">
                            <h2 class="panel-title font30 color-white">{{$plano->nome}}<p class="bold font-money">100% {{$plano->valor}}</p></h2>
                        </div>
                        <div class="panel-body">
                            <table class="table-condensed margem-esquerda">
                                @foreach($opcoes as $opcao)
                                   <!-- {{$cor = "red"}} -->
                                   <!-- {{$icone = 'close'}} -->
                                    @foreach($opcoesfree as $free)
                                        @if($opcao->id == $free->id)
                                            <!-- {{$cor = "green"}} -->
                                            <!-- {{$icone = 'check'}} -->
                                        @endif
                                    @endforeach
                                        <tr>
                                            <th><i class="material-icons Material-icons-{{$cor}}">{{$icone}}</i></th>
                                            <th class="font16">{{$opcao->apelido}}</th>
                                        </tr>
                                @endforeach
                            </table>
                            <a class="btn-compra" href="site/empresa/{{$plano->id}}"><i class="fa fa-share fa-lg carrinho-compra" aria-hidden="true"></i>Adquirir</a>
                        </div>
                    </div>
                </article>
            @endif
        @endforeach

    {{--validando e listando o plano "STANDARD" e suas opções --}}
        @foreach($planos as $plano)
            @if($plano->id == 2)
                <article class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading color-plano1">
                            <h2 class="panel-title font30 color-white">{{$plano->nome}} <p class="bold font-money">R$ {{$plano->valor}}/mês</p></h2>
                        </div>
                        <div class="panel-body">
                            <table class="table-condensed margem-esquerda">
                                @foreach($opcoes as $opcao)
                                    <!-- {{$cor = "red"}} -->
                                    <!-- {{$icone = 'close'}} -->
                                    @foreach($opcoesbasico as $basico)
                                        @if($opcao->id == $basico->id)
                                            <!-- {{$cor = "green"}} -->
                                            <!-- {{$icone = 'check'}} -->
                                        @endif
                                    @endforeach
                                        <tr>
                                            <th><i class="material-icons Material-icons-{{$cor}}">{{$icone}}</i></th>
                                            <th class="font16">{{$opcao->apelido}}</th>
                                        </tr>
                                @endforeach
                            </table>
                            <a class="btn-compra" href="site/empresa/{{$plano->id}}"><i class="fa fa-share fa-lg carrinho-compra" aria-hidden="true"></i>Adquirir</a>
                        </div>
                    </div>
                </article>
            @endif
        @endforeach

    {{--validando e listando o plano "PREMIUM" e suas opções --}}
        @foreach($planos as $plano)
            @if($plano->id == 3)
                <article class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading color-plano2">
                            <h2 class="panel-title font30 color-white">{{$plano->nome}} <p class="bold font-money">R$ {{$plano->valor}}/mês</p></h2>
                        </div>
                        <div class="panel-body">
                            <table class="table-condensed margem-esquerda">
                                @foreach($opcoes as $opcao)
                                    <!-- {{$cor = "red"}} -->
                                    <!-- {{$icone = 'close'}} -->
                                    @foreach($opcoescompleto as $completo)
                                        @if($opcao->id == $completo->id)
                                            <!-- {{$cor = "green"}} -->
                                            <!-- {{$icone = 'check'}} -->
                                        @endif
                                    @endforeach
                                        <tr>
                                            <th><i class="material-icons Material-icons-{{$cor}}">{{$icone}}</i></th>
                                            <th class="font16">{{$opcao->apelido}}</th>
                                        </tr>
                                @endforeach
                            </table>
                            <a class="btn-compra" href="site/empresa/{{$plano->id}}"><i class="fa fa-share fa-lg carrinho-compra" aria-hidden="true"></i>Adquirir</a>
                        </div>
                    </div>
                </article>
            @endif
        @endforeach
    </div>
</section>
<div class="clear"></div>
<!--Final da Section Planos-->

<section class="contato" id="contato">

    <!--Triangulo da Página-->
    <svg class="triangle" width="100" height="48" >
        <path d="m0,0l50,43l50,-43l-100,0z" class="triangle-grey"></path>
    </svg>

    <div class="container text-center padding-50">
        <h1 class="titulo color-white">Contato</h1>
        <div class="divider"></div>
        <p class="descricao color-white">Dúvidas, reclamações ou sugestões envie-nos sua mensagem.<br>Somos gratos em ajudar. <br>Mais informações: (16)99999-9999</p>

        <form class="imobweb-form" method="POST" action="/site/send_mail" send="/site/send_mail">
            {!! csrf_field() !!}
            <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}">
            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
            <textarea name="mensagem" placeholder="Mensagem" value="{{ old('mensagem') }}"></textarea>

            <p class="message-danger" style="display: none"></p>

            <div class="loader" style="display: none">Enviando os dados, por favor aguarde...
                <div class='preloader' >
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <button type="submit" class="btn-compra btn-envia">Enviar</button>
        </form>
    </div>

</section>
<div class="clear"></div>
<!--Final da Section Contato-->

<footer>
    <section>
        <div class="copyright text-center">
            <p class="copyrigth">CopyRigth <a id="endsystem" href="http://www.endsystem.com.br">EndSystem 2016</a> - Todos os direitos reservados</p>
        </div>
    </section>
</footer>

@endsection

{{--Ajax de envio de e-mail--}}
@section('scripts')
    <script>
        $(function () {
            jQuery("form").submit(function () {
                jQuery(".message-danger").hide();

                var dadosForm = jQuery(this).serialize();

                jQuery.ajax({
                    url: jQuery(this).attr("send"),
                    data: dadosForm,
                    type: "POST",
                    beforeSend: iniciaPreloader()
                }).done(function (data) {

                    if(data == "1") {
                        setTimeout("alert('Mensagem enviada com sucesso! Entraremos em contato através do e-mail enviado.');location.reload();", 5000);

                    }else{
                        finalizaPreloader();
                        jQuery(".message-danger").html(data);
                        jQuery(".message-danger").show();

                        setTimeout("jQuery('.message-danger').hide();", 5000);
                    }
                }).fail(function () {
                    finalizaPreloader();
                    alert("Falha ao enviar a mensagem! Informe o erro a ImobWeb no contato (16)99999-9999.");
                });

                return false;
            });
        });
        
        function iniciaPreloader() {
            jQuery(".loader").show();
        };

        function finalizaPreloader() {
            jQuery(".loader").hide();
        };
    </script>

@endsection
