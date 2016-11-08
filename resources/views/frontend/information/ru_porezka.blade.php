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
        <h1 class="welcome-text text-center">Порезка</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Резку заказанного металлопроката проводят по указанным размерам. Осуществляется порезка предварительно перед окончательным формированием заказа. Эту услугу выбирают как обычные покупатели, так и бизнесмены.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Порезка металла позволяет создавать заготовки с точной установкой формы и длины. Осуществляется процесс разными способами, которые выбираются в зависимости от выгоды предлагаемой услуги. Под обработку могут попасть как большие листы, так и негабаритные металлические изделия.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Потребность в использовании металлозаготовок разных размеров расширила спектр услуг по порезке с возможностью создания необходимых форм. Каждый заказ выполняется точно с минимальными потерями времени без образования окалин, острых срезов и других дефектов – этих результатов можно достигнуть с использованием правильного подбора инструментов и подходящего метода.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Все современные способы порезки позволяют экономно проводить раскрой сортового металла без необходимости дальнейшей обработки. Услугу можно заказать как для массового пользования, так и для резки металла в малых количествах.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-black-h3 center-block">Все виды современной порезки</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Учитывая, что на заводе ЮТМК сортовой металлопрокат выпускается в большом количестве, то порезка интересна всем потребителям. Размер выбирается кратно определенным размерам – 8 м, 10 м, 12 м и так далее.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">На металлобазе порезка предлагается в нескольких видах:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">ленточнопильная – поставлена в первые ряды из-за высокой точности и скорости порезки за счет применения ленточнопильных станков;</span></li>
                    <li><span class="text-gray-16">резка пресс-ножницами – выбирают, если требуется заготовка металла определенных размеров (метод экономит время, средства и материал);</span></li>
                    <li><span class="text-gray-16">резка вулканитом – сокращает расход металла и дает возможность простой и доступной порезки.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Раскрой листового металла осуществляется по индивидуальному заказу клиента с минимальным количеством отходов. Заказы принимаются на порезку собственного металла или продукции других производителей. Стоимость рассчитывается в каждом конкретном случае. В дополнительные услуги по обработке металла входит гибка и вальцовка, которые на ЮТМК предлагаются также с целью улучшения внешнего вида и без изменений качества металлического профиля. Короткие сроки изготовления + высокая скорость работы + низкая стоимость – все это клиент получает при обращении в нашу компанию.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection