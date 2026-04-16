@extends('layout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Регистрация пользователя</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('signin') }}">
                        @csrf                        
                        <div class="form-group mb-3">
                            <label for="name">Имя</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Введите ваше имя" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Введите ваш email" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Введите пароль" required>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection