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
                    <form action="{{ route('delete_all_select') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger mr-1 mb-1 waves-effect waves-light delete_all_select"><i
                                class="feather icon-trash" id="delete_all_select"></i>Удалить все выделенные посты
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
                                    <th scope="col">Выбрать все
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-danger">
                                                    <input type="checkbox" value="1" id="checkall">
                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </th>
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
                                                <input type="hidden" name="current_page" value="{{ $posts->currentPage() }}">
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
                                        </td>
                                        <td>
                                            <li class="d-inline-block mr-2">
                                                <fieldset>
                                                    <div class="vs-checkbox-con vs-checkbox-danger sub_chk">
                                                        <input type="checkbox" class="delete_check" data-id="{{$post->id}}">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </li>
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
                    <input type="hidden" name="current_page" value="{{ $posts->currentPage() }}">
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

    <script>
        $(document).ready(function(){

            // Check all
            $('#checkall').click(function(){
                if($(this).is(':checked')){
                    $('.delete_check').prop('checked', true);
                }else{
                    $('.delete_check').prop('checked', false);
                }
            });

            // Delete record
            $('#delete_all_select').click(function(){

                let deleteids_arr = [];
                // Read all checked checkboxes
                $("input:checkbox[class=delete_check]:checked").each(function () {
                    deleteids_arr.push($(this).val());
                });

                // Check checkbox checked or not
                if(deleteids_arr.length > 0){

                    // Confirm alert
                    let confirmdelete = confirm("Do you really want to Delete records?");
                    if (confirmdelete === true) {
                        $.ajax({
                            url: 'delete_all_select',
                            type: 'post',
                            data: {request: 2, deleteids_arr: deleteids_arr},
                            // success: function(response){
                            //     dataTable.ajax.reload();
                            // }
                        });
                    }
                }
            });

        });

        // Checkbox checked
        function checkcheckbox(){

            // Total checkboxes
            let length = $('.delete_check').length;

            // Total checked checkboxes
            let totalchecked = 0;
            $('.delete_check').each(function(){
                if($(this).is(':checked')){
                    totalchecked += 1;
                }
            });

            // Checked unchecked checkbox
            if(totalchecked == length){
                $("#checkall").prop('checked', true);
            }else{
                $('#checkall').prop('checked', false);
            }
        }
    </script>
@endsection
