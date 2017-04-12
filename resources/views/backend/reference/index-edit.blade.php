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

                <div class="form-group{{ ($errors->has('title_en') || $errors->has('title_ru') || $errors->has('title_uk')) ? ' has-error' : '' }}" 
                     style="margin-bottom: 0;">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label tab-title" for="advertising-title">Заголовок</label>
                        </div>
                        <div class="col-md-8 customize-tab">
                            <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                <li role="presentation">
                                    <a id="title_en-tab"
                                       class="tab-nice{{ $errors->has('title_en') ? ' has-error-label' : '' }}"
                                       href="#title_en"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="title_en"
                                       aria-expanded="true">
                                        Английский
                                    </a>
                                </li>
                                <li class="active" role="presentation">
                                    <a id="title_ru-tab"
                                       class="tab-nice{{ $errors->has('title_ru') ? ' has-error-label' : '' }}"
                                       href="#title_ru"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="title_ru">
                                        Русский
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a id="title_uk-tab"
                                       class="tab-nice{{ $errors->has('title_uk') ? ' has-error-label' : '' }}"
                                       href="#title_uk"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="title_uk">
                                        Украинский
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="tabTitle" class="tab-content">
                    <div id="title_en" class="tab-pane fade" role="tabpanel" aria-labelledby="title_en-tab">
                        <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                            <input id="title_en"
                                   name="title_en"
                                   type="text"
                                   class="form-control"
                                   value="{{ old('title_en', $reference['title_en']) }}"
                                   placeholder="Английский">

                            @if ($errors->has('title_en'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title_en') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id="title_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                        <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                            <input id="title_ru"
                                   name="title_ru"
                                   type="text"
                                   class="form-control"
                                   value="{{ old('title_ru', $reference['title_ru']) }}" placeholder="Русский">

                            @if ($errors->has('title_ru'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title_ru') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id="title_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                        <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                            <input id="title_uk"
                                   name="title_uk"
                                   type="text"
                                   class="form-control"
                                   value="{{ old('title_uk', $reference['title_uk']) }}"
                                   placeholder="Украинский">

                            @if ($errors->has('title_uk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title_uk') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group{{ ($errors->has('body_en') || $errors->has('body_ru') || $errors->has('body_uk')) ? ' has-error' : '' }}" 
                     style="margin-bottom: 0;">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label tab-body" for="advertising-body">Описание</label>
                        </div>
                        <div class="col-md-8 customize-tab">
                            <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                <li role="presentation">
                                    <a id="body_en-tab"
                                       class="tab-nice{{ $errors->has('body_en') ? ' has-error-label' : '' }}"
                                       href="#body_en"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="body_en"
                                       aria-expanded="true">
                                        Английский
                                    </a>
                                </li>
                                <li class="active" role="presentation">
                                    <a id="body_ru-tab"
                                       class="tab-nice{{ $errors->has('body_ru') ? ' has-error-label' : '' }}"
                                       href="#body_ru"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="body_ru">
                                        Русский
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a id="body_uk-tab"
                                       class="tab-nice{{ $errors->has('body_uk') ? ' has-error-label' : '' }}"
                                       href="#body_uk"
                                       role="tab"
                                       data-toggle="tab"
                                       aria-controls="body_uk">
                                        Украинский
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="tabbody" class="tab-content">
                    <div id="body_en" class="tab-pane fade" role="tabpanel" aria-labelledby="body_en-tab">
                        <div class="form-group{{ $errors->has('body_en') ? ' has-error' : '' }}">
                            <textarea id="text_body_en" 
                                      class="form-control" 
                                      name="body_en" 
                                      rows="6">
                                {{ old('body_en', $reference['body_en']) }}
                            </textarea>

                            @if ($errors->has('body_en'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body_en') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id="body_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="body_ru-tab">
                        <div class="form-group{{ $errors->has('body_ru') ? ' has-error' : '' }}">
                            <textarea id="text_body_ru" 
                                      class="form-control" 
                                      name="body_ru" 
                                      rows="6">
                                {{ old('body_ru', $reference['body_ru']) }}
                            </textarea>

                            @if ($errors->has('body_ru'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body_ru') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div id="body_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="body_uk-tab">
                        <div class="form-group{{ $errors->has('body_ru') ? ' has-error' : '' }}">
                            <textarea id="text_body_uk" 
                                      class="form-control" 
                                      name="body_uk" 
                                      rows="6">
                                {{ old('body_uk', $reference['body_uk']) }}
                            </textarea>

                            @if ($errors->has('body_uk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body_uk') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


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
            selector: '#text_body_en, #text_body_ru, #text_body_uk',
            language: 'ru',
            plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
        });

        function saveBody() {
            tinyMCE.get('text_body_en, text_body_ru, text_body_uk').save();
        }
    </script>
@endsection