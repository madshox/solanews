@extends('dashboard.layouts.master')
{{--@dd($posts)--}}
@section('title', 'Редактировать пост ' . $post['title'])
@section('content')
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-header">
                        <h4 class="card-title">Редактировать пост</h4>
                    </div>
                    <form id="form" method="POST" enctype="multipart/form-data"
                          action="{{ route('posts.update', $post['id']) }}">
                        @method('PUT')
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-bold-600 font-medium-2 mb-1">
                                            Название
                                        </div>
                                        <fieldset
                                            class="form-group position-relative has-icon-left input-divider-left">
                                            <input type="text" class="form-control" id="name" name="title"
                                                   placeholder="Название услуги"
                                                   value="{{ old('title', $post['title']) }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-phone"></i>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <!--CK-editor-->
                                    <div class="col-12">
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-bold-600 font-medium-2 mb-1">
                                            Описание
                                        </div>
                                        <textarea name="description" id="editor" cols="30" placeholder="Описание услуги"
                                                  rows="10">{{ old('description', $post['description']) }}</textarea>
                                    </div>
                                    <!--end-CK-editor-->

                                    <div class="col-12" style="margin-top: 30px">
                                        @error('head_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-bold-600 font-medium-2 mb-1">
                                            Главная картинка
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="">
                                                <img style="width: 500px" src="{{ Storage::url($post->img) }}" alt="">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12" style="margin-top: 30px">
                                        <select name="category" id="catid" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->title }}"
                                                        @if($post['category_id'] == $category->id)
                                                        selected
                                                    @endif>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- switch -->
                                    <div class="card-content col-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="d-flex justify-content-start flex-wrap">
                                                    <div
                                                        class="custom-control custom-switch switch-lg custom-switch-success mr-2 mb-1">
                                                        <p class="mb-lg-1"><b>Статус вакансии</b></p>
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customSwitch90" name="status" value="1"
                                                               @if($post->status == '1') checked
                                                        @else ''
                                                        @endif>
                                                        <label class="custom-control-label" for="customSwitch90">
                                                            <span class="switch-text-left">актив</span>
                                                            <span class="switch-text-right">неактив</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row" style="display: inline-flex">
                                            <div class="col-6">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-outline-success round mr-1 mb-1 waves-effect waves-light">
                                                    Сохранить
                                                </button>

                                            </div>
                                            <div class="col-6">
                                                <a href="{{ route('posts.index') }}">
                                                    <button type="button"
                                                            class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light">
                                                        Отмена
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#catid').select2();
        })
    </script>
@endsection
