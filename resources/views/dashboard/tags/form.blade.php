@extends('dashboard.layouts.master')
{{--@dd($tags)--}}
@isset($tag)
@section('title', 'Редактировать тег ' . $tag['title'])
@endisset

@section('content')
    <section id="input-with-icons">
        <div class="row match-height">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-header">
                        <h4 class="card-title">Редактировать тег</h4>
                    </div>
                    <form id="form" method="POST" enctype="multipart/form-data"
                          @isset($tag)
                          action="{{ route('tags.update', $tag) }}"
                          @else
                          action="{{ route('tags.store') }}"
                        @endisset>
                        @isset($tag)
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
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Название тега"
                                                   value="{{ old('name', isset($tag) ? $tag->name : null) }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-phone"></i>
                                            </div>
                                        </fieldset>
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
                                                <a href="{{ route('tags.index') }}">
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
