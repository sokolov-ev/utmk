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
        <h1 class="welcome-text text-center">Полоса стальная</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Стальные полосы приходят в помощь потребителю в мебельной индустрии, в строительной, промышленной сфере и в энергетике. Спрос на этот элемент металлопроката обусловлен прочностью и долговечностью изделий в пропорциональном соотношении с низкой стоимостью. Сортамент металлической полосы состоит из стальных и оцинкованных изделий. Обычно спектр применения полосы определяется в зависимости от взятого вида стали за основу и от других качественных показателей.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Что стоит знать о металлической полосе?</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В индустрии металлопроката стальная полоса считается универсальным изделием, так как служит сырьем для изготовления гаек, электросварных труб, перемычек, накладок, стальных уголок, швеллеров и др. Производственное направление позволяет выпускать горяче- и холоднокатанные полосы, причем первый вид является более востребованным. Общая стоимость металлоизделий напрямую привязана к марке изготавливаемой стали, к точности прокатки и к конфигурации изделия. Маркировка А говорит о повышенной точности, а буквой В отмечаются обычные показатели точности.</span>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Исходя из особенностей низколегированных сталей, длина металлической полосы может колебаться от 3 до 10 м. Поставляется изделие в виде стальной тонкой ленты, в листах или в рулонах. Горячекатанные основы, которые изготовляются из стальных полос марки Ст3, нашли применение в сооружении несущих строительных конструкций, в изготовлении закладных деталей, в создании конструкций прямоугольного или квадратного сечения, для основ декоративных изделий. Оцинкованная полоса работает как заземляющий элемент – в заземлении кабелей, силовых проводов играет не последнюю роль.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Стандартный ряд предлагает широкий выбор металлических полос для покупки, но продажа может осуществляться и под индивидуальные требования, в том числе и изготовление изделий из других марок стали. Деление на разные виды длины (мерной, немерной, кратной) позволяет подбирать продукцию с минимальным сбором отходов, сокращая расходы на материалы. Но за основу для выбора стоит брать еще два основных параметра – это толщина и ширина.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Удобство применения этого сортового изделия заключается именно в том, что можно выбрать стандартные и не стандартные размеры, а также определиться с видом стали, подходящей для тех или иных условий. В связи с этим использовать полосу можно для создания различных металлоконструкций.</span>
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