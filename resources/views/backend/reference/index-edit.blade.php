@extends('layouts.admin')

@section('title')
    Редактирование главной страницы справочника
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование главной</h3>
        </div>
        <div class="box-body">
            
            <ol class="breadcrumb">
                <li><a href="{{ url('/administration/spravka') }}">Справочник металлопроката</a></li>
                <li class="active">Редактирование главной страницы справочника</li>
            </ol>
            
            <form id="form-add-product" role="form" method="POST" action="{{ url('/administration/spravka/index/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                @include('backend.site.partial.input-edit', ['name' => 'title', 'title' => 'Заголовок', 'data' => $reference['title']])

                @include('backend.site.partial.textarea-edit', ['name' => 'body', 'title' => 'Описание', 'data' => $reference['body']])

                <button class="btn btn-success pull-right" type="submit" onclick="saveBody();">
                    Сохранить изменения
                </button>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinyMCE.init({
            selector: '#body_en, #body_ru, #body_uk',
            language: 'ru',
            plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
        });

        function saveBody() {
            tinyMCE.get('text_body_en').save();
            tinyMCE.get('text_body_ru').save();
            tinyMCE.get('text_body_uk').save();
        }
    </script>
@endsection