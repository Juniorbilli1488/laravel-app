@extends('layout')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h4><i class="bi bi-shield-lock"></i> Доступ запрещен</h4>
            </div>
            <div class="card-body">
                <h5>У вас нет прав для выполнения этого действия.</h5>
                <p>{{ $exception->getMessage() ?? 'Обратитесь к администратору.' }}</p>
                <a href="/" class="btn btn-primary mt-3">Вернуться на главную</a>
            </div>
        </div>
    </div>
</div>
@endsection