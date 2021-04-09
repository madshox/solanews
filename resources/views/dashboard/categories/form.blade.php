@extends('dashboard.layouts.master')

@isset($category)
    @section('title', 'Редактировать категорию ' . $category->name)
@else
    @section('title', 'Создать категорию')
@endisset


@section('content')
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-header">
                        @isset($category)
                            <h4 class="card-title">Редактировать категорию</h4>
                        @else
                            <h4 class="card-title">Создать категорию</h4>
                        @endisset
                    </div>
                    <form id="form" method="POST" enctype="multipart/form-data"
                          @isset($category)
                          action="{{ route('categories.update', $category) }}"
                          @else
                          action="{{ route('categories.store') }}"
                        @endisset>

                        @isset($category)
                            @method('PUT')
                        @endisset

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
                                            @isset($category)
                                                <input type="text" class="form-control" id="name" name="title"
                                                       placeholder="Название категории"
                                                       value="{{ old('title', isset($category) ? $category->title : null) }}">
                                            @else
                                                <input type="text" class="form-control" id="name" name="title"
                                                       placeholder="Название категории"
                                                       value="{{ old('title', isset($category) ? $category->title : null) }}">
                                            @endisset
                                            <div class="form-control-position">
                                                <i class="feather icon-phone"></i>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-sm-3">
                                        @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-bold-600 font-medium-2 mb-1">
                                            Позиция
                                        </div>
                                        <fieldset
                                            class="form-group position-relative has-icon-left input-divider-left">
                                            @isset($category)
                                                <input type="number" class="form-control" id="name" name="position"
                                                       placeholder="Позиция категории"
                                                       value="{{ old('position', isset($category) ? $category->position : null) }}">
                                            @else
                                                <input type="number" class="form-control" id="name" name="position"
                                                       placeholder="Позиция категории"
                                                       value="{{ old('position', isset($category) ? $category->position : null) }}">
                                            @endisset
                                            <div class="form-control-position">
                                                <i class="feather icon-phone"></i>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="card-body col-12">
                                        <div class="row" style="display: inline-flex">
                                            <div class="col-6">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-outline-success round mr-1 mb-1 waves-effect waves-light">
                                                    Сохранить
                                                </button>

                                            </div>
                                            <div class="col-6">
                                                <a href="{{ route('categories.index') }}">
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
@endsection
