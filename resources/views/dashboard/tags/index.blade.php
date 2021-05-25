@extends('dashboard.layouts.master')

@section('title', 'Теги')

@section('content')
    <div class="row" id="table-hover-animation">
        <div class="col-12">
            <div class="card">
                <div class="notifDiv"></div>
                <div class="card-header">
                    <h4 class="card-title">Услуги</h4>
                    <a href="{{ route('tags.create') }}">
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
                                @foreach($tags as $tag)
                                    <tr>
                                        <th scope="row">{{ $tag->id }}</th>
                                        <td>{{ $tag->name['uz'] }}</td>
                                        <td style="display: flex; justify-content: center;">
                                            <a href="{{ route('tags.edit', $tag) }}">
                                            <input type="hidden" name="current_page" value="{{ $tags->currentPage() }}">
                                                <button type="button"
                                                        class="btn btn-icon btn-warning mr-1 mb-1 waves-effect waves-light">
                                                    <div class="fonticon-wrap">
                                                        <i class="feather icon-edit"></i>
                                                    </div>
                                                </button>
                                            </a>
                                            <a class="btn btn-icon btn-danger mr-1 mb-1 waves-effect waves-light tagId"
                                               data-toggle="modal" data-target="#DeleteModal"
                                               data-tag-id="{{ $tag->id }}">
                                                <div class="fonticon-wrap">
                                                    <i class="feather icon-trash-2"></i>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $tags->links() }}
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
                <form action="#" method="POST" id="deleteTagForm">
{{--                    <input type="hidden" name="current_page" value="{{ $tags->currentPage() }}">--}}
                    @csrf
                    @method('DELETE')
                    <div class="modal-body" id="tagId">
                        Вы действительно хотите удалить тег <span class="tagId"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-dismiss="modal" id="deleteTag">Да</button>
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
            $('.tagId').on('click', function () {
                let id = $(this).data('tag-id');
                $('.tagId').text(id);
                $('#deleteModal').modal();
                $('#deleteTag').on('click', function () {
                    $('#deleteTagForm').attr('action', "/admin/tags/" + id).submit();
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            //select all
            $('#checkall').on('click', function () {
                if ($(this).is(":checked", true)) {
                    $('.checkbox').prop('checked', true);
                } else {
                    $('.checkbox').prop('checked', false);
                }
            });

            //select checkbox all
            $('.checkbox').on('click', function () {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#checkall').prop('checked', true)
                } else {
                    $('#checkall').prop('checked', false)
                }
            });

            $('.delete_all_select').on('click', function () {
                let idsArr = [];
                $('.checkbox:checked').each(function () {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length < 1) {
                    alert('please select atleast one record to delete');
                    return false;
                } else {
                    // $('#deleteModal').modal();
                    // $('#deleteTag').on('click', function () {
                    //
                    // });
                    if (confirm('Are you sure?')) {
                        let strIds = idsArr.join(',');
                        $.ajax({
                            url: "{{ route('delete_all_select') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + strIds,
                        });
                    } else {
                        return false;
                    }
                }
            });
        });
    </script>
@endsection
