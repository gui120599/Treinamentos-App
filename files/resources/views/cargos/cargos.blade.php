@extends('layouts.app')

@section('content')
    <div class="bottom-data bottom-data-formulario">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>{{ __('Add New Office') }}</h3>
                <i class='icon-minimizar bx bx-chevron-down'></i>
                <i class='bx bx-minus'></i>
            </div>
            <div class="formulario">
                <form method="POST" action="{{ route('setores.store') }}" class="form-content">
                    @csrf

                    <div class="coluna-12">
                        <label for="setor_descricao" class="label-input">{{ __('Name') }}</label>
                        <input id="setor_descricao" type="text"
                            class="form-input @error('setor_descricao') is-invalid @enderror" name="setor_descricao"
                            required autocomplete="setor_descricao" autofocus>
                    </div>

                    <div class="coluna-12">
                        <label for="setor_ativo" class="label-input">{{ __('Office Activo') }}</label>
                        <select id="setor_ativo" type="text" class="form-input" name="setor_ativo" required
                            autocomplete="setor_ativo" autofocus>
                            <option value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="coluna-12">
                        <button type="submit" class="button button-primary w-100">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('components.tables.setores')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const title = document.getElementById('title-page-nav');
            const icon = document.querySelector('.icon');
            icon.classList.add('bx-map');
            title.textContent = "{{ __('Positions') }}";
        });
    </script>
@endsection
