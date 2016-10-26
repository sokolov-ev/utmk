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
    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Модульные сооружения</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="wow slideInLeft">
                <span class="text-gray-16 text-justify">Для временного пользования и проживания подходят модульные сооружения, представляющие собой полный комплект из окон, дверей и современных материалов. Такие сооружения могут быть одно- или многоблочными в зависимости от количества блоков-контейнеров.</span>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-2-2">
                    <span class="text-black-h3">Мобильные здания полностью готовые для использования</span>
                </div>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-0-2">
                    <span class="text-gray-16">Основным преимуществом является наличие всех необходимых удобств и высокая скорость возведения. Учитывая это, использовать модульные сооружения можно в качестве хозпомещений, полноценных построек для временных точек продажи и с другой целью. Выглядят модульные здания аккуратно, занимают минимум времени на установку и имеют полную комплектацию для использования. Эксплуатировать подобные сооружения можно долго, учитывая высокий запас прочности и функциональности. Даже небольшое модульное здание оправдывает себя по стоимости и представляет готовый комплекс для введения в эксплуатацию.</span>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="wow fadeInRight">
                <img class="green-img center-block" src="/images/information/metallokonstrukcii-005.jpg" alt="" title="" style="max-width: 500px;" />
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="padding-top"></div>
    <div class="container">

        <div class="row">
            <div class="col-md-5">
                <div class="wow fadeInLeft">
                    <div class="padding-block-0-2">
                        <img class="green-img center-block" src="/images/information/metallokonstrukcii-006.jpg" alt="" title="" style="max-width: 500px;" />
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="wow slideInRight">
                    <p class="text-black-h3">Кроме широкого спектра функций модульные сооружения обладают и сильными сторонами:</p>
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">удобная транспортировка за счет малого веса;</span></li>
                            <li><span class="text-gray-16">минимальный срок наладки и пуска в применение;</span></li>
                            <li><span class="text-gray-16">полная заводская готовность;</span></li>
                            <li><span class="text-gray-16">высокая защищенность и надежность;</span></li>
                            <li><span class="text-gray-16">использование инновационных материалов и технологий;</span></li>
                            <li><span class="text-gray-16">высокая взломостойкость;</span></li>
                            <li><span class="text-gray-16">возможность подключения сигнализации и других коммуникаций;</span></li>
                            <li><span class="text-gray-16">сопротивляемость типичным разрушающим воздействиям;</span></li>
                            <li><span class="text-gray-16">эстетичность и выбор разных стилистических решений.</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="wow slideInRight">
            <div class="padding-block-2-2">
                <span class="text-gray-16">Зачастую модульные сооружения имеют прочную кровлю и каркас, а замкнутый модуль по периметру обеспечивается жесткостью рамы. Обшивку можно производить с использованием утеплителя, дополнительно устанавливать герметичные двери или окна. Обслуживание сооружений полностью безопасно за счет того, что в цельносварной конструкции используются негорючие материалы.</span>
            </div>
        </div>

    </div>
    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection