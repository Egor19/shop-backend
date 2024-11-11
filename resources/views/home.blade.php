@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    {{-- Проверка, является ли пользователь администратором --}}
                    
                    @can('view', auth()->user())
                    <p>Имя пользователя: {{ auth()->user()->name }}</p>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mt-3">
                            Войти в админку
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
