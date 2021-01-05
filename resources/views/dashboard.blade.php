@extends('layouts.main')

@section('title', 'Karoline Modas - Index')

@section('content')

<div>
    <div class="left">
        <div class="logo-index">
            <img src="/img/logo.svg" alt="Logo Karoline Modas">
        </div>
        <div class="info-topo">
            <a class="nome-usuario" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
            <p class="caixa-fechado">Caixa Aberto/Fechado</p>
        </div>
        <nav class="aside-menu">
            <ul>
                <li>
                    <a href="#">Produtos</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">Vendas</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">Clientes</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">Vendedores</a>
                </li>
            </ul>
        </nav>
        <div class="div-rodape">
            <p>05/01/2021  </br>  14:00:05</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="btn-sair" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a>
        </form>
        </div>
        
        
    </div>

</div>