@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь</h1>
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

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('user.edit', $user->id)}}"
                                   class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{route('user.delete', $user->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>

                                <tr>
                                    <td>ID</td>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Фамилия</td>
                                    <td>
                                        {{$user->surname}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Отчество</td>
                                    <td>
                                        {{$user->patronymic}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Почта</td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Возраст</td>
                                    <td>
                                        {{$user->age }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Пол</td>
                                    <td>
                                        {{$user->genderTitle}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Роль</td>
                                    <td>
                                        {{$user->roleTitle}}
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
