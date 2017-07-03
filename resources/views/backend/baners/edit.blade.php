@extends('layouts.admin')

@section('title')
    Редактирование слайда
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование слайда</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/baners') }}">Банеры</a></li>
                <li class="active">Редактирование слайда</li>
            </ol>

            <form id="form-edit-slide" role="form" method="POST" action="{{ url('/administration/baners/' . $image->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <a href="#" class="thumbnail">
                            <img src="{{ url('/images/' . $image->type . '/' . $image->name) }}" alt="{{ $image->name }}">
                        </a>

                        @include('backend.site.partial.input-edit', ['name' => 'link', 'title' => 'Ссылка', 'data' => $image->link])
                        @include('backend.site.partial.input-edit', ['name' => 'text', 'title' => 'Текст', 'data' => $image->text])

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <button class="btn btn-success pull-right" type="submit" from="form-edit-slide">
                            Сохранить изменения
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')

@endsection