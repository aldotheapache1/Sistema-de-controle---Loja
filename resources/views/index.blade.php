@extends('layouts.main')

@section('title', 'Karoline Modas - Index')

@section('content')

<div class="index">
    <aside class="left">
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

        <div class="div-baixo">
            <div id="planoclock">
                <div class="clock">	
                    <span id="hours" class="hours"></span>
                    <span>:</span>
                    <span id="minutes" class="minutes"></span>
                    <span>:</span>
                    <span id="seconds" class="seconds"></span>
                </div>
            </div>	

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="btn btn-sair" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();">Sair</a>
            </form>
        </div>
    </aside>

    <div class="right">
        <div class=" cart-logo">
            <a href="#">
                <img src="/img/cart.svg" alt="Imagem Carrinho">
            </a>
        </div>
        <div class="form-valor-caixa">
            <form action="#">
                @csrf
                <label for="valor-caixa">Valor inicial do caixa</label>
                <input type="number" min="1" step="any" placeholder="R$ 100,00"/>
                <div class="div-botao-caixa">
                    <button type="submit" class="btn btn-caixa">Abrir o Caixa</button>
                </div>
            </form>
        </div>
    </div>

</div>
