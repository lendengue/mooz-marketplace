<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> @yield('title') Mooz - Marketplace </title>

        @include('template.css')
        @yield('styles')
    </head>
    <body>
        @include('template.menu-superior')
        
        {{-- --}}
        @yield('conteudo')
        {{-- --}}
        <div class="bg-dados">
            <div class="dados">
                <ul></ul>
            </div>
        </div>
        
        <!-- <div class="bg-contato">
            <address><strong>Disciplina: Fundamentos de Banco de Dados </strong><br/>Trabalho AP2</address>
        </div> -->
        @include('template.script')
        @yield('scripts')
    </body>
</html>
