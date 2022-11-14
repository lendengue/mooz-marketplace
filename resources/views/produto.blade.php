@extends('template.layout')

@section('conteudo')
    <section class="produtos">
        <div class="bg-conteudo">
            <article class="produto-show">
                <div class="show-item">
                    <img src="data:image/png;base64,{{ chunk_split(base64_encode($produto['img'])) }}" alt="{{ $produto['nome'] }}">
                </div>
                <div class="show-item">
                    <div class="item-title">
                        <h2>{{ $produto['nome'] }}</h2>
                        R$ <b>{{ number_format($preco_loja['valor'], 2, ',', ' ') }}</b> 
                        @if(!empty($vendedor))
                            <span style="width: 205px" class="vendedor">
                                Vendido por: <a href="{{route('loja',last(Request::segments()))}}">  {{$vendedor[0]['nome']}}</a>
                            </span>
                        @endif
                    </div>
                    <div class="item-body">
                        @if (!$lojas_com_produto->isEmpty())
                            <p>Mais vendedores:</p>
                            <ul>
                                @forelse ($lojas_com_produto as $lcp)
                                    <li>
                                        <a href="{{route('loja',$lcp->id_loja)}}">{{$lcp->nome_loja}}</a>  - R$ {{number_format($lcp->valor, 2, ',', ' ')}}
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        @else
                            <p>Nenhum outro vendedor encontrado</p>
                        @endif
                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection
