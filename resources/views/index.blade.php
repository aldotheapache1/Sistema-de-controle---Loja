@extends('layouts.main')

@section('title', 'Karoline Modas - home')

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
        @if(isset($currentCashRegister))
            <div class="checkboxes">
                <input type="checkbox" id="payments" name="payments">
                <label for="payments">Pagamentos</label>

                <input type="checkbox" id="sales" name="sales" checked>
                <label for="sales">Vendas</label>
            </div>
            
            <div class="table-sales">
                <table >
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Tipo Venda</th>
                            <th>Vendedor</th>
                            <th>Cliente</th>
                            <th>Qtd</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>Nome produto</td>
                                @if($sale['sale_type'] == 1)  
                                    <td>À vista</td>
                                @elseif($sale['sale_type'] == 2)
                                    <td>A prazo</td>
                                @endif
                                <td>{{$sale['user_id']}}</td>      
                                <td>Cliente</td>      
                                <td>Qtd de produtos</td>      
                                <td>{{$sale['value']}}</td>      
                            </tr>
                        @endforeach
                        <tr>
                            <td class="table_total" colspan="3">Total em vendas: R$ {{$currentCashRegister['initial_value']}},00</td>      
                            <td class="table_total" colspan="3">Total em caixa: R$ {{$currentCashRegister['initial_value']}},00 <span>Vendas á vista(50,00) Pagamentos (50,00)</span></td>      
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-payments">
                <table >
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th>Cobrador</th>
                            <th>Total Restante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>Cliente</td>      
                                <td>R$ {{$payment['value']}}</td>      
                                <td>{{$payment['user_id']}}</td>      
                                <td>R$ 250,00</td>      
                            </tr>
                        @endforeach
                        <tr>
                            <td class="table_total" colspan="2">Total em vendas: R$ {{$currentCashRegister['initial_value']}},00</td>      
                            <td class="table_total" colspan="2">Total em caixa: R$ {{$currentCashRegister['initial_value']}},00 <span>Vendas á vista(50,00) Pagamentos (50,00)</span></td>      
                        </tr>
                    </tbody>
                </table>
            </div>        
        @else
            <div class="form-valor-caixa">
                <form action="/" method="POST">
                    @csrf
                    <label for="initial_value">Valor inicial do caixa</label>
                    <input name="initial_value" type="number" min="1" step="any" placeholder="R$ 100,00"/>
                    <div class="div-btn-form">
                        <button type="submit" class="btn btn-confirm">Abrir o Caixa</button>
                    </div>
                </form>
            </div>
        @endif
    </div>

</div>
