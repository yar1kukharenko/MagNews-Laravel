@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Статьи</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('article.create')}}" class="btn btn-primary">Комментарии</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Дата создания</th>
                                    <th>ID Статьи</th>
                                    <th>ID Пользователя</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>
                                            {{$comment->message}}
                                        </td>
                                        <td>
                                            {{$comment->created_at}}
                                        </td>
                                        <td>
                                            <a href={{route('article.show', ['article' => $comment->article_id])}}> {{$comment->article_id}} </a>
                                        </td>
                                        <td>
                                            <a href={{route('user.show', ['user' => $comment->user_id])}}> {{$comment->user_id}} </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('comment.approve', $comment->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Принять</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('comment.reject', $comment->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Отклонить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
