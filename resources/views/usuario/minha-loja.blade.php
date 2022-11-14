@extends('template.layout')




@section('conteudo')
    <section class="produtos">
        <div class="form-pesquisa">
            <div class="conteudo outros-filtros">
                <div class="busca-rapida">
                    <form class="form-selects" action="" method="" style="margin-top: 0">
                        <div class="top-form">
                            <h1>SUA LOJA - {{mb_strtoupper($loja['nome'])}}</h1>
                        </div>
                        <div class="top-form">
                            <a href="{{route('usuario-loja-produto')}}"><div style="border: 1px solid ;border-radius: 0.15em;padding:5px">CADASTRAR ANÚNCIO</div></a>
                            <a href="{{route('usuario-produto')}}"><div style="border: 1px solid ;border-radius: 0.15em;padding:5px">CADASTRAR PRODUTO</div></a>
                        </div>
                        <div class="form-group">
                            <input type="text" maxlength="60" id="dev-table-filter" data-action="filter" data-filters=".grupo-box" placeholder="Buscar Produtos" value="{{-- $busca --}}" name="qs">
                            <button type="submit" class="btn-search">Pesquisar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-conteudo">
            <article class="conteudo filtro">
                <!-- include('template.filtro') -->
                @if (!$produtos_loja->isEmpty())
                    <div class="grupo-box">
                        @forelse ($produtos_loja as $pl) 
                            <a href="{{route('produto', ['id_produto' => $pl->id_produto, 'id_loja' => $pl->id_loja])}}">
                                <div class="box-lista"><br>
                                    <div class="box-lista-grupo" style="max-height: 350px;">
                                        <img src="data:image/png;base64,{{ chunk_split(base64_encode($pl->img)) }}" alt="{{ $pl->nome_produto }}">
                                        <h4 style="text-transform:" class="">{{ $pl->nome_produto }}</h4>
                                        R$ <b>{{ number_format($pl->valor, 2, ',', ' ') }}</b>
                                    </div>
                                </div>
                            </a>
                        @empty
                        @endforelse
                    </div>
                @else
                    <div class="grupo-box" style="height: 200px">
                        <div class="box-lista-grupo">
                            <p>A filtragem selecionada não retornou nenhum resultado. Tente outra combinação de filtros ou busca</p>
                        </div>
                    </div>
                @endif

            </article>
        </div>
    </section>

@endsection
