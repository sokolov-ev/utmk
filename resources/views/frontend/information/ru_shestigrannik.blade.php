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
        <h1 class="welcome-text text-center">Шестигранник стальной</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Металлопрокат, который представлен с шестигранным сечением, имеет простое название – шестигранник. Наиболее часто встречаются стальные шестигранники или оцинкованные. Их используют как основу для изготовления болтов и гаек, различных механизмов и креплений. Для декоративных конструкций и для ряда других целей также выбирают шестигранник.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Широкое применение шестигранников</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В машиностроении и в строительном направлении без такого металлопроката, как шестигранник, не обойтись. Металлический шестигранник производится не из чистой стали легированного типа, а с добавлением примесей марганца, никеля или даже хрома. Высокотехнологичное оборудование предлагает два способа получения изделий: горячекатаный (граничным размером от 3 до 100 мм) и калиброванный (стандартным размером от 6 до 100 мм). Чем меньше предельные отклонения от ГОСТа, тем и выше качество.</span>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Классифицируется металлоизделие по разным характеристикам:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">по длине: мерные, немерные, кратные;</span></li>
                    <li><span class="text-gray-16">по качеству стального состава: высококачественные и обычного качества;</span></li>
                    <li><span class="text-gray-16">по прямому назначению;</span></li>
                    <li><span class="text-gray-16">по точности прокатки: Б (с повышенной) и В (с обычной);</span></li>
                    <li><span class="text-gray-16">по состоянию материала: не подвергаемые и подвергаемые обработке, нагартованные;</span></li>
                    <li><span class="text-gray-16">по типу последующего процесса – это может быть холодное волочение, механическая или горячая обработка.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Выбирают стальной шестигранник с учетом ряда стандартных характеристик: продолжительный срок эксплуатации, невосприимчивость к воздействию паров влаги и оргвеществ, высокая устойчивость к механическому действию, легкая свариваемость. Дополнительными преимуществами обладают нержавеющие и оцинкованные шестигранники, которые могут использоваться в широком спектре химического и пищевого производства. Стандартная упаковка металлопродукции такого типа: бухты или прутки. Есть возможность заказывать партии шестигранника по специальным заказам, которые полностью соблюдаются с требуемыми стандартами.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Материал изготовления обеспечивает разные виды шестигранников, выпускаемых на рынок:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">жаропрочные;</span></li>
                    <li><span class="text-gray-16">легированные;</span></li>
                    <li><span class="text-gray-16">нержавеющие;</span></li>
                    <li><span class="text-gray-16">углеродистые;</span></li>
                    <li><span class="text-gray-16">повышенной обрабатываемости;</span></li>
                    <li><span class="text-gray-16">низколегированные;</span></li>
                    <li><span class="text-gray-16">углеродистые стандартного назначения.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Чтобы правильно выбрать шестигранник нужно обратить внимание на тип обработки и на сплав металлопродукта. Высокое качество доказывается полным соблюдением стандартов во всех рядах размеров.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection