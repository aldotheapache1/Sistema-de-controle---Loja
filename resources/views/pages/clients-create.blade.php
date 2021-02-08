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
      <div class="form-client">
        <form action="/clients" method="POST">
            @csrf
            <label for="name">Nome</label>
            <input name="name" type="text" placeholder="João da Silva" required/>
            <label for="CPF">CPF</label>
            <input name="CPF" type="text" placeholder="Insira o CPF (somente números)" required/>

            <label for="client_type">Tipo de cliente</label>
            <select name="client_type" id="client_type">
              <option value="1">À vista</option>
              <option value="2">A prazo</option>
            </select>

            <div class="div-btn-form">
              <button type="submit" class="btn btn-confirm">Cadastrar Usuário</button>
            </div>
        </form>
      </div>
    </div>
</div>
