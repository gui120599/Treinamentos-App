@extends('layouts.app')

@section('content')
    
    <!-- Insights -->
    <ul class="insights">
        <li onclick="window.location.href ='{{route('setores.index')}}'">
            <i class='bx bx-map'></i>
            <span class="info">
                <h3>{{__('Sectors')}}</h3>
                <p>{{ __('To manage') }}</p>
            </span>
        </li>
        <li onclick="window.location.href ='{{route('dashboard')}}'">
            <i class='bx bx-calendar-check'></i>
            <span class="info">
                <h3>1,074</h3>
                <p>{{ __('Paid Order') }}</p>
            </span>
        </li>
        <li onclick="window.location.href ='{{route('dashboard')}}'">
            <i class='bx bx-calendar-check'></i>
            <span class="info">
                <h3>1,074</h3>
                <p>{{ __('Paid Order') }}</p>
            </span>
        </li>
        <li onclick="window.location.href ='{{route('dashboard')}}'">
            <i class='bx bx-calendar-check'></i>
            <span class="info">
                <h3>1,074</h3>
                <p>{{ __('Paid Order') }}</p>
            </span>
        </li>
    </ul>
    <div class="bottom-data">
        <form method="POST" action="{{ route('settings') }}" class="form-content">
            @csrf
            <div class="coluna-6">
                <label for="titulo" class="label-input">{{ __('Title') }}</label>
                <input id="titulo" type="text" class="form-input @error('titulo') is-invalid @enderror" name="titulo"
                    value="{{ old('title') }}" required autocomplete="titulo" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="coluna-12">
                <button type="submit" class="button button-primary">
                    {{ __('Register') }}
                </button>
            </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const title = document.getElementById('title-page-nav');
        const icon = document.querySelector('.icon');
        icon.classList.add('bx-cog');
        title.textContent = "{{ __('Settings') }}";
    });
    </script>

@endsection
