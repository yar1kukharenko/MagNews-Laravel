@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">Имя</label>
                        <input class="form-control" value="{{old('name')}}" type="text" name="name" id="name"
                               placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="surname">Фамилия</label>
                        <input class="form-control" value="{{old('surname')}}" type="text" name="surname" id="surname"
                               placeholder="Введите фамилию">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="patronymic">Отчество</label>
                        <input class="form-control" value="{{old('patronymic')}}" type="text" name="patronymic"
                               id="patronymic"
                               placeholder="Введите отчество">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Почта</label>
                        <input class="form-control" value="{{old('email')}}" type="email" name="email"
                               id="email"
                               placeholder="Введите почту">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Пароль</label>
                        <input class="form-control" value="{{old('password')}}" type="password" name="password"
                               id="password"
                               placeholder="Введите пароль">
                    </div>
                    <div class="form-group">
                        {{--                        <label class="form-label" for="password">Пароль</label>--}}
                        <input class="form-control" value="{{old('password')}}" type="password"
                               name="password_confirmation"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="age">Возраст</label>
                        <input class="form-control" value="{{old('age')}}" type="number" name="age"
                               id="age"
                               placeholder="Введите возраст">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="age">Пол</label>
                        <select name="gender" class="custom-select form-control" id="gender">
                            <option disabled selected>Выберите ваш пол</option>
                            <option {{old('gender')== 1 ? 'selected' : ''}} value="1">Мужской</option>
                            <option {{old('gender')== 2 ? 'selected' : ''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
