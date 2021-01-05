@extends('layouts.main')

@section('title', 'Karoline Modas - Login')

@section('content')
<div class="container logo">
    <img src="/img/logo.svg" alt="Logo Karoline Modas">
</div>
<div class="container login-form">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">E-mail<label/>
        <input id="email"  type="email" name="email" :value="old('email')" required />

        <label for="password">Senha<label/>
        <input id="password"  type="password" name="password" required/>

        <div class="btns">
            <button class="btn-entrar">
                {{ __('Entrar') }}
            </button>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif
        </div>
    </form>
</div>