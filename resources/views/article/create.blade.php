@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить статью</h1>
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
        {{--                        TODO: Сделать так на всех формах--}}
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row w-100">
                <form class="w-100" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-50">
                        <label class="form-label" for="name">Наименование категории</label>
                        <input class="form-control" type="text" name="title" id="name" placeholder="Наименование"
                               value="{{old('title')}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="w-100" id="summernote" name="content">
                            {{old('content')}}
                        </textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Добавить превью</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузка</span>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="category_id">Выберите категорию</label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option
                                    {{$category->id == old('category_id') ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}
                                </option>
                            @endforeach
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
