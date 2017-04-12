@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')

    @include('partial.metatags')

@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ $index['title'] }}</h1>
    </div>
    <div class="padding-top"></div>
</section>

<section class="container">
    <div>
        {!! $index['body'] !!}
    </div>
    <div class="padding-top"></div>
</section>

<section class="container">
    <ul class="list-unstyled">
        @foreach ($sections as $section)
            <li style="position: relative;">
                <p class="orange-point">
                    <a class="text-black-h3" href="{{ url('/spravka'.$section['slug_full_path']) }}">{{ $section['title'] }}</a>
                </p>
                
                <div class="padding-block-0-1">
                    <div class="well well-sm">
                        {!! $section['body_small'] !!}
                    </div>
                </div>                

                @if(!empty($section['subsection']))
                    <ul class="list-unstyled">
                        @foreach ($section['subsection'] as $subsection)
                            <li>
                                <p class="gray-point" style="margin-left: 60px;">
                                    <a class="text-black-h3" href="{{ url('/spravka'.$subsection['slug_full_path']) }}">{{ $subsection['title'] }}</a>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>    
    
    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".reference_book").addClass('active');
    </script>
@endsection