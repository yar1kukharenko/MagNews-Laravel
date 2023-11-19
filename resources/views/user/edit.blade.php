@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
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
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label class="form-label" for="name">Имя</label>
                        <input class="form-control" value="{{$user->name ?? old('name')}}" type="text" name="name"
                               id="name"
                               placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="surname">Фамилия</label>
                        <input class="form-control" value="{{$user->surname ??   old('surname')}}" type="text"
                               name="surname" id="surname"
                               placeholder="Введите фамилияю">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="patronymic">Отчество</label>
                        <input class="form-control" value="{{$user->patronymic ?? old('patronymic')}}" type="text"
                               name="patronymic"
                               id="patronymic"
                               placeholder="Введите отчество">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="age">Возраст</label>
                        <input class="form-control" value="{{$user->age ??  old('age')}}" type="number" name="age"
                               id="age"
                               placeholder="Введите возраст">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="gender">Пол</label>
                        <select name="gender" class="custom-select form-control" id="gender">
                            <option disabled selected>Выберите ваш пол</option>
                            <option {{$user->gender==1 || old('gender')== 1 ? 'selected' : ''}} value="1">Мужской
                            </option>
                            <option {{$user->gender==2 || old('gender')== 2 ? 'selected' : ''}} value="2">Женский
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="role_id">Пол</label>
                        <select name="role" class="custom-select form-control" id="role_id">
                            <option disabled selected>Выберите роль</option>
                            @foreach($roles as $id=>$role)
                                <option
                                    {{$id == old('role_id') ? 'selected' : ''}} value="{{$id}}">{{$role}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="role_id">Пол</label>
                        <select name="role" class="custom-select form-control" id="role_id">
                            <option disabled selected>Выберите роль</option>
                            @foreach($roles as $id=>$role)
                                <option
                                    {{$id == $user->role ? 'selected' : ''}} value="{{$id}}">{{$role}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Редактировать</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
