@extends('dashboard.layouts.master')

@section('title', 'Посты')

@section('content')
            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Услуги</h4>
                            <a href="{{ route('posts.create') }}"><button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i class="feather icon-plus"></i>Парсить</button></a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Image</th>
                                            <th scope="col" style="text-align: center;">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <th scope="row">{{ $post->id }}</th>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category }}</td>
                                                <td>
                                                    <div class="col-12">
                                                        @if($post->status == 1)
                                                            <button type="button"
                                                                    class="btn btn-success mr-1 mb-1 waves-effect waves-light">
                                                                Опубликовано
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                    class="btn btn-light mr-1 mb-1 waves-effect waves-light">
                                                                Неопубликовано
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><img src="{{ $post->img }}" height="auto" width="150" alt=""></td>
                                                <td style="display: flex; justify-content: center;">
                                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                        <a href="{{ route('posts.edit', $post) }}"><button type="button" class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                                                                <div class="fonticon-wrap">
                                                                    <i class="feather icon-edit"></i>
                                                                </div>
                                                            </button></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
                                                            <div class="fonticon-wrap">
                                                                <i class="feather icon-trash-2"></i>
                                                            </div>
                                                        </button>
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
                </div>
            </div>
@endsection
