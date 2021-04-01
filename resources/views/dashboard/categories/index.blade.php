@extends('dashboard.layouts.master')

@section('title', 'Категории ')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Категории</h4>
                    <a href="{{ route('categories.create') }}">
                        <button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                                class="feather icon-plus"></i>Добавить
                        </button>
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" style="text-align: center;">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td style="display: flex; justify-content: center;">
                                            <form action="{{ route('categories.destroy', $category) }}"
                                                  method="POST">
                                                <a href="{{ route('categories.edit', $category) }}">
                                                    <button type="button"
                                                            class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                                                        <div class="fonticon-wrap">
                                                            <i class="feather icon-edit"></i>
                                                        </div>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light">
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
@endsection
