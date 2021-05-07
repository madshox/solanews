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
                                    <th scope="col">Position</th>
                                    <th scope="col" style="text-align: center;">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->position }}</td>
                                        <td>
                                            <div style="display: flex">
                                            <a href="{{ route('categories.edit', $category) }}">
{{--                                                <input type="hidden" name="current_page" value="{{ $category->currentPage() }}">--}}
                                                <button type="button"
                                                        class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <div class="fonticon-wrap">
                                                        <i class="feather icon-edit"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <a class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light CategoryId"
                                               data-toggle="modal" data-target="#DeleteModal"
                                               data-category-id="{{ $category->id }}">
                                                <div class="fonticon-wrap">
                                                    <i class="feather icon-trash-2"></i>
                                                </div>
                                            </a>
                                            </div>
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

<!-- Modal -->
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h5 class="modal-title" id="myModalLabel120">Удаление</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="deleteCategoryForm">
{{--                <input type="hidden" name="current_page" value="{{ $categories->currentPage() }}">--}}
                @csrf
                @method('DELETE')
                <div class="modal-body" id="CategoryId">
                    Вы действительно хотите удалить категорию <span class="CategoryId"></span>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" id="deleteCategory">Да
                    </button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Нет</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
       <script>
           $(document).ready(function () {
               $('.CategoryId').on('click', function () {
                   let id = $(this).data('category-id');
                   $('.CategoryId').text(id);
                   $('#deleteModal').modal();
                   $('#deleteCategory').on('click', function () {
                       $('#deleteCategoryForm').attr('action', "/admin/categories/" + id).submit();
                   });
               });
           });
       </script>
@endsection
