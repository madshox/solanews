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
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active"
                                           id="ru-tab" data-toggle="tab"
                                           href="#ru" aria-controls="ru"
                                           role="tab" aria-selected="true">
                                            <span class="d-none d-sm-block">Ru</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center"
                                           id="uz-tab" data-toggle="tab"
                                           href="#uz" aria-controls="uz"
                                           role="tab" aria-selected="true">
                                            <span class="d-none d-sm-block">Uz</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center"
                                           id="Kr-tab" data-toggle="tab"
                                           href="#Kr" aria-controls="Kr"
                                           role="tab" aria-selected="false">
                                            <span class="d-none d-sm-block">Kr</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="ru"
                                         aria-labelledby="ru-tab" role="tabpanel">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-bold-600 font-medium-2 mb-1">
                                                    Название Ru
                                                </div>
                                                <fieldset
                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" class="form-control" id="name"
                                                               name="title[ru]"
                                                               placeholder="Название"
                                                               value="{{ old('title.ru', isset($category) ? $category->title['ru'] : null) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-book"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="uz"
                                         aria-labelledby="uz-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-bold-600 font-medium-2 mb-1">
                                                    Название Uz
                                                </div>
                                                <fieldset
                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" class="form-control" id="name"
                                                               name="title[uz]"
                                                               placeholder="Название"
                                                               value="{{ old('title.uz', isset($category) ? $category->title['uz'] : null) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-book"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Kr"
                                         aria-labelledby="Kr-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-bold-600 font-medium-2 mb-1">
                                                    Название Kr
                                                </div>
                                                <fieldset
                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" class="form-control" id="name"
                                                               name="title[kr]"
                                                               placeholder="Название"
                                                               value="{{ old('title.Kr', isset($category) ? $category->title['Kr'] : null) }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-book"></i>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        @error('position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-bold-600 font-medium-2 mb-1">
                                            Позиция
                                        </div>
                                        <fieldset
                                            class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="number" class="form-control" id="name" name="position"
                                                       placeholder="Позиция категории"
                                                       value="{{ old('position', isset($category) ? $category->position : null) }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-map-pin"></i>
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
