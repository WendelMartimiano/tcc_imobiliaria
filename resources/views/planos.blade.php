<h1>listagem dos planos e suas opções</h1>

@foreach($planos as $plano)
    @if($plano->id == 1)
        <p><strong>Plano: </strong>{{$plano->nome}}({{$plano->valor or 'é 100% gratuito'}})</p>
        @foreach($testecompleto as $completo)
            @foreach($opcoesfree as $free)
                @if($free->nome == $completo->nome)
                    <p>{{$completo->apelido}}(true)</p>
                @else
                    <p>{{$completo->apelido}}(false)</p>
                @endif
            @endforeach
        @endforeach
    @endif
@endforeach

@foreach($planos as $plano)
    @if($plano->id == 2)
        <p><strong>Plano: </strong>{{$plano->nome}}({{$plano->valor or 'é 100% gratuito'}})</p>
        @foreach($testecompleto as $completo)
            @foreach($opcoesbasico as $basico)
                @if($basico->nome == $completo->nome)
                    <p>{{$completo->apelido}}(true)</p>
                @else
                    <p>{{$completo->apelido}}(false)</p>
                @endif
            @endforeach
        @endforeach
    @endif
@endforeach



<!--
@foreach($planos as $plano)
    @if($plano->id == 1)
        <p><strong>Plano: </strong>{{$plano->nome}}({{$plano->valor or 'é 100% gratuito'}})</p>
        @foreach($opcoesfree as $free)
            <p>{{$free->apelido}}</p>
        @endforeach
    @endif
@endforeach

@foreach($planos as $plano)
    @if($plano->id == 2)
        <p><strong>Plano: </strong>{{$plano->nome}}({{$plano->valor or 'é 100% gratuito'}})</p>
        @foreach($opcoesbasico as $basico)
            <p>{{$basico->apelido}}</p>
        @endforeach
    @endif
@endforeach

@foreach($planos as $plano)
    @if($plano->id == 3)
        <p><strong>Plano: </strong>{{$plano->nome}}({{$plano->valor or 'é 100% gratuito'}})</p>
        @foreach($opcoescompleto as $completo)
            <p>{{$completo->apelido}}</p>
        @endforeach
    @endif
@endforeach

-->