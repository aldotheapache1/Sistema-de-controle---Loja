@extends('layouts.main')

@section('title', 'Karoline Modas - clientes')

@section('content')

<div class="index" >
    <aside class="left">
        <div class="logo-index">
            <a href="/">
              <img src="/img/logo.svg" alt="Logo Karoline Modas">
            </a>
        </div>

        <div class="info-topo">
            <a class="nome-usuario" href="#">{{ Auth::user()->name }}</a>
            @if(isset($currentCashRegister))
                <p class="caixa-aberto">Caixa Aberto</p>
                <form action="/index/close/{{ $currentCashRegister['id'] }}" method="GET">
                @csrf
                    <a href="/index/close/{{ $currentCashRegister['id'] }}" 
                        class="btn btn-fechar-caixa" >
                        Fechar Caixa
                    </a>
                </form>
            @else
                <p class="caixa-fechado">Caixa Fechado</p>
            @endif
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
                    <a href="/clients">Clientes</a>
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
        <div class="clients">
          <div class="client">
            <img src="img/person.svg" alt="Avatar" style="width:100%">
            <div class="infos-client">
              <p class="name-client">Teste</p> 
              <p class="cpf-client">CPF: 12345678910</p> 
              <p class="debt-client">Débito: R$ 250,00</p> 
              <p class="type-client">Tipo: Normal</p> 
            </div>
          </div>

          <a href="clients/create">
            <div class="add-client">
              <img src="img/plus.svg" alt="Avatar" style="width:100%">
              <div class="infos-client">
                <p>Adicionar cliente</p> 
              </div>
           </div>
           </a>

        </div>
    </div>
</div>
