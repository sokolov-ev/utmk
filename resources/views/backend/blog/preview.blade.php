@extends('layouts.admin')

@section('title')
    {{ $news['title'] }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container" style="background-color: #fff;">

    <br />
    <ol class="breadcrumb">
        <li><a href="{{ url('/administration/blog') }}">Блог</a></li>
        <li class="active">{{ $news['title'] }}</li>
    </ol>

    <h1>{{ $news['title'] }}</h1>
    <span style="color: #999;">{{ $news['published'] }}</span>

    <div class="padding-top-30"> </div>
    <div>
        {!! $news['body'] !!}
    </div>
    <div class="padding-top-30"> </div>

</section>

@endsection

@section('scripts')

@endsection