<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS do Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    {{-- CSS do layout --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layout.css') }}">
    {{-- CSS da Tela Principal --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/principal.css') }}">
    {{-- CSS de Pessoa --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pessoa.css') }}">
    {{-- CSS de Eleicao --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/chapa.css') }}">
    {{-- CSS de votacao --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/votacao.css') }}">

    <title>Document</title>
</head>
<body>
    <header class="header">

        <nav class="navbar navbar-expand-lg navbar-light barraMenu">
            <a href="{{ url('/principal') }}" class="navbar-brand" href="#">
                <span class="sys">Sys</span>  
                <span class="cpe">CPE</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown menuPerfil">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Meu Perfil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Dados Pessoais</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown menuEntidade">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Entidade
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ url('/pessoa') }}" class="dropdown-item" href="#">Membros</a>
                            <a href="{{ url('/eleicoes') }}" class="dropdown-item" href="#">Eleições</a>
                        </div>
                    </li>

                    <div class="spacer"></div>

                    <li class="nav-item dropdown userMenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $nome ?? '' or 'Usuário desconhecido' }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Alterar senha</a>
                            <a class="dropdown-item" href="#">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>