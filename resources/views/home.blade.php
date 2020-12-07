@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img class="img-responsive" src="{{URL::to('http://squuman.beget.tech/advertisment.jpg')}}" alt=""/>
                <form action="{{ route('generate') }}" method="post">
                    {{ csrf_field() }}
                    <label class="form-check-label">
                        Выберите сложность пароля:
                    </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="difficult" value="easy">
                        <label class="form-check-label">
                            Простой
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="difficult" value="medium">
                        <label class="form-check-label">
                            Средний
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="difficult" value="hard">
                        <label class="form-check-label">
                            Сложный
                        </label>
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-check-label">
                            Введите длинну пароля:
                        </label>
                        <input type="number" class="form-control" placeholder="Длинна пароля" name="length">
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary">Сгенерировать</button>
                    </div>
                </form>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">

                        @foreach($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                @endif
                @if(session('password'))
                    <div class="alert alert-success">
                        Ваш пароль сгенерирован:
                        <input id="copyText" value="{{ session('password') }}"/>
                        <button id="copy" onclick="copy()">Скопировать</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
