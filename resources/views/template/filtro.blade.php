<div class="sidebar-left">
        <h5 class="title__filtro"><strong>FILTROS</strong></h5>
    
    @php
        use App\Libraries\LinkBuilder;
        $lb = new LinkBuilder;
        
        if (request('em-breve')) {
            $curso_info = new App\IRC\Models\CursoEmBreve;
        } else {
            $curso_info = new App\IRC\Models\Curso;
        }
    @endphp
    
    @if (! empty($filtros_ativos))
        <nav class="filter-box">
         <p>Filtros selecionados:</p>
            <!--<h5 class="filter-title">SELECIONADOS</h5> -->
            <ol class="filter-content selecionados">

              {{--  @if (! empty(request('promocao'))) 
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('promocao') }}" title="Black Week">
                        <div class="text-ellipse">Black Week {{request('promocao')}}%</div>
                            <div class="exit">x</div>
                        </a>
                    </li>
                @endif
                --}}

                @if (! empty(getBusca(request('qs'))) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('qs') }}">
                            Busca: "{{ getBusca(request('qs')) }}"
                            <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                
                @if (! empty(request('cid')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('cid') }}">
                            @if(request('cid') == 'Maracana')
                                Maracanaú
                                <div class="exit">X</div>
                            @else
                                {{ request('cid') }}
                                <div class="exit">X</div>
                            @endif
                        </a>
                    </li>
                @endif
                @if (! empty(request('em-breve')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('em-breve') }}">
                            Cursos em Breve
                            <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @forelse ($areas_filtradas as $a)
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos{{ $lb->ignoreValue(['a' => $a->idarea])->get() }}">
                            {{ $a->area }}
                            <div class="exit">X</div>
                        </a>
                    </li>
                @empty
                @endforelse
                @if (! empty(request('u')) && $filtro_unidades->where('unidade_id', request('u'))->first())
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('u') }}">
                            {{ $filtro_unidades->where('unidade_id', request('u'))->first()->unidade_nome_comercial }}
                            <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @if (! empty(request('m')) )
                    @php
                      switch (request('m')) {
                          case '1.16':
                              $nome_modalidade = 'Cursos Técnicos';
                              break;
                          case '3.11':
                              $nome_modalidade = 'Cursos de Qualificação Profissional';
                              break;
                          case '4.5.8.19':
                              $nome_modalidade = 'Cursos de Curta Duração';
                              break;
                          default:
                              $nome_modalidade = '';
                      }
                    @endphp
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('m') }}">
                            {{ $nome_modalidade }}
                            <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @if (! empty(request('ead')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('ead') }}">
                            Cursos em EAD
                            <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @if (! empty(request('sabado')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('sabado', 'seg-sex') }}">
                            Aos Sábados
                           <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @if (! empty(request('seg-sex')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('seg-sex', 'sabado') }}">
                            Segunda a Sexta
                           <div class="exit">X</div>
                        </a>
                    </li>
                @endif
                @if (! empty(request('mes')) )
                    <li>
                        <a class="filtros filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('mes', 'sabado', 'em-breve') }}">
                            Mês: {{ request('mes') }}
                           <div class="exit">X</div>
                        </a>
                    </li>
                @endif
            </ol>
        </nav> <!-- FIM SELECIONADOS -->
    @endif
    <details class="filter-box collapse">
       {{-- <nav class="filter-box">
            <h5 class="filter-title">BLACK WEEK</h5>
            <ol class="filter-content">
                    <li><a class="filter__option loadable-div" href="para-voce/cursos?promocao=30">BLACKSENAI30%</a></li>
                    <li><a class="filter__option loadable-div" href="para-voce/cursos?promocao=40">BLACKSENAI40%</a></li>
                    <li><a class="filter__option loadable-div" href="para-voce/cursos?promocao=50">BLACKSENAI50%</a></li>  
            </ol>
        </nav>--}}
        <summary class="filter-title">CIDADE</summary>
            <ol class="filter-content">
                @forelse ($filtro_cidades as $c)
                  <li><a class="filter__option loadable-div" href="para-voce/cursos?cid={{ $c->cidade }}{{ GETasParams('cid') }}">{{ $c->cidade }} ({{ $c->total }}) </a></li>
                    @empty
                @endforelse
            </ol>
    </details>
    <details class="filter-box collapse">
        <summary class="filter-title">UNIDADE</summary>
        <ol class="filter-content">
            @forelse ($filtro_unidades as $u)
                <li><a class="filter__option loadable-div" href="para-voce/cursos?u={{ $u->unidade_id }}{{ GETasParams('u') }}">{{ $u->unidade_nome_comercial }} ({{ $u->total }})</a></li>
            @empty
            @endforelse
        </ol>
    </details>
    <details class="filter-box collapse">
        <summary class="filter-title">MODALIDADES</summary>
        <ol class="filter-content">
            <li><a class="filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('m') }}&m=1.16&amp;t=cursos-tecnicos">Cursos Técnicos</a></li>
            <li><a class="filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('m') }}&m=3.11&amp;t=qualificacao-profissional">Cursos de Qualificação Profissional</a></li>
            <li><a class="filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('m') }}&m=4.5.8.19&amp;t=curta-duracao">Cursos de Curta Duração</a></li>
            <li>
                <a class="filter__option loadable-div" href="para-voce/cursos?{{ GETasParams('ead') }}&amp;ead=1&amp;t=cursos-em-ead">
                    Cursos em EAD
                </a>
            </li>
        </ol>
    </details>
    <details class="filter-box collapse">
        <summary class="filter-title">ÁREAS</summary>
        <ol class="filter-content">
            @forelse ($filtro_areas as $a)
                <li>
                    <a class="filter__option loadable-div" href="para-voce/cursos{{ $lb->concat(['a' => $a->idarea])->get() }}">
                        {{ $a->area }} ({{ $a->total }})
                    </a>
                </li>
            @empty
            @endforelse
        </ol>
    </details>    
    <details class="filter-box collapse">
        <summary class="filter-title">DIAS DE CURSO</summary>
        <ol class="filter-content">
            <li>
                <a class="filter__option loadable-div" href="para-voce/cursos?sabado=1{{ GETasParams() }}">
                    Cursos aos Sábados
                </a>
            </li>
            <li>
                <a class="filter__option loadable-div" href="para-voce/cursos?seg-sex=1{{ GETasParams() }}">
                    Segunda a Sexta
                </a>
            </li>
        </ol>
    </details>

    {{-- @if (empty(request('em-breve')))
        <details class="filter-box">
            <summary class="filter-title">PERÍODO</summary>
            <ol class="filter-content">
                <li>
                    <form class="form__periodo">
                        <input readonly name="mes" id="escolher-mes" class='' type="text" />
                    </form>
                </li>
            </ol>
        </details>
    @endif --}}
    
    <details class="filter-box collapse">
        <summary class="filter-title">EM BREVE</summary>
        <ol class="filter-content">
            <li>
                <a class="filter__option loadable-div" href="para-voce/cursos?em-breve=1{{ GETasParams() }}">
                    Cursos em Breve
                </a>
            </li>
        </ol>
    </details>
    
    <nav style="display:none" class="filter-box">
        <h5 class="filter-title">INVESTIMENTO</h5>
        <ol class="filter-content">
            <li>
                <div class="slidecontainer">
                    19,90 <input type="range" min="1" max="100" value="50" class="slider" id="myRange" title="R$ 250"> 500,00
                </div>
            </li>
        </ol>
    </nav>
</div>
<script>
    window.addEventListener("load", function(event) {
        const filter__options = document.querySelectorAll('.filter__option')
        filter__options.forEach((option)=>{
            option.addEventListener('click',loadLoadableDivs)
        })
        function loadLoadableDivs(){
            const loadable_divs = document.querySelectorAll('.loadable-div')
            loadable_divs.forEach((div)=>{
                div.classList.add('loading-div')
            })
        }
    });
</script>
<style>
.loading-div{
    color:transparent !important ;
    /* background-color:lightgray !important ; */
    background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0),
        rgba(255, 255, 255, 0.5) 50%,
        rgba(255, 255, 255, 0) 80%
        ),
        #EEF8FF;
    background-repeat: repeat-y;
    background-size: 50px 500px ;
    background-position: 0 0 ;
    animation: shine 0.5s infinite;
}
@keyframes shine {
    to {
        background-position: 100% 0, /* move highlight to right */ 0 0;
    }
}
    
</style>
