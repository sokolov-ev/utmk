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
        <h1 class="welcome-text text-center">Наша политика</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Наша компания занимается изготовлением металлоконструкций не один год, открывая широкие возможности доставки, порезки, транспортировки. Выгодно купить металла с доставкой можно на официальном сайте, затратив при этом минимум времени.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Надежный партнер в сфере металла</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Наша компания металл предлагает в разных физических формах с неизменным спектром технических характеристик. Работа основана на таких важных составляющих:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">срочное и качественное выполнение каждого заказа;</span></li>
                    <li><span class="text-gray-16">высокий контроль качества;</span></li>
                    <li><span class="text-gray-16">гибкая доставка;</span></li>
                    <li><span class="text-gray-16">изготовление продукции из евростали;</span></li>
                    <li><span class="text-gray-16">металлоструктуры в широком ассортименте;</span></li>
                    <li><span class="text-gray-16">оцинкованные рулоны, модульные сооружения, металлоконструкции по доступным ценам в каталоге.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Стабильная работа осуществляется не только благодаря качественному оборудованию, но и за счет помощи профессиональной команды. Сырье для производства выбирается тщательно, а готовая продукция пользуется спросом не только на нашем рынке, а и в Европе, где стоимость выше на несколько порядков. Существенная ценовая нагрузка на зарубежном рынке вызвала спрос на украинскую продукцию – цена металла сделала отечественную металлопродукцию намного конкурентноспособнее.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Учитывая, что металлоконструкции относятся к одним из важнейших элементов строительства, то используются они для объектов разного назначения. Изделия могут выполнять конструктивную или несущую функцию, в зависимости от чего и разрабатываются не в одном типовом размере и форме. Качество нашего металлопродукта проверено временем, поэтому выбор можно осуществлять без сомнений.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">ЮТМК в отличие от других рыночных партнеров отличается такими преимуществами:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Оперативность.</span></li>
                    <li><span class="text-gray-16">Энергосбережение.</span></li>
                    <li><span class="text-gray-16">Доступный продукт.</span></li>
                    <li><span class="text-gray-16">Надежность.</span></li>
                    <li><span class="text-gray-16">Легкость.</span></li>
                    <li><span class="text-gray-16">Мобильность.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Сооружения, изготовленные из металла, который вы приобрели у нас, отличаются привлекательностью и комфортностью, прекрасно совмещаются с новыми отделочными материалами.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Если нужна порезка металла частным лицам или строительным фирмам, то наша компания готова предложить выгодные услуги в этом направлении. Для решения данных задач используются специальные станки порезки металла, которые помогают как можно скорее изготовить требуемое изделие. В ходе изготовления используются европейские стандарты стали, позволяющие создавать изделия под ключ с оптимальным совмещением цены и качества.</span>
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