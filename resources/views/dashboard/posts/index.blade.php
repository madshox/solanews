@extends('dashboard.layouts.master')

@section('title', 'Посты')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Услуги</h4>
                </div>
                <div class="card-header">
                    <a href="{{ route('parse') }}">
                        <button type="button" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                                class="feather icon-plus"></i>Парсить
                        </button>
                    </a>
                    <form action="{{ route('delete_all_posts') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light"><i
                                class="feather icon-trash"></i>Удалить все неопубликованные посты
                        </button>
                    </form>
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
                                        <td><img src="{{ Storage::url($post->img) }}" height="auto" width="150" alt="">
                                        </td>
                                        <td style="display: flex; justify-content: center;">
                                            <a href="{{ route('posts.edit', $post) }}">
                                                <button type="button"
                                                        class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <div class="fonticon-wrap">
                                                        <i class="feather icon-edit"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <a class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light postId"
                                                    data-toggle="modal" data-target="#DeleteModal"
                                                    data-post-id="{{ $post->id }}">
                                                <div class="fonticon-wrap">
                                                    <i class="feather icon-trash-2"></i>
                                                </div>
                                            </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links() }}
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
                <form action="#" method="POST" id="deletePostForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body" id="postId">
                        Вы действительно хотите удалить новость <span class="postId"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" id="deletePost">Да</button>
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
            $('.postId').on('click', function () {
                let id = $(this).data('post-id');
                $('.PostId').text(id);
                $('#deleteModal').modal();
                $('#deletePost').on('click', function () {
                    $('#deletePostForm').attr('action', "/admin/posts/"+id).submit();
                });
            });
        });
    </script>
@endsection
