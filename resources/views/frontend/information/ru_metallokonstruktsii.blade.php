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
        <h1 class="welcome-text text-center">Металлоконструкции</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow slideInLeft">
                <span class="text-gray-16 text-justify">Производство металлоконструкций применяется для реализации строительных проектов, для создания конструкций на промышленных предприятиях, частными лицами или в рамках коммерческих организаций. Сегодня такие конструкции можно встретить в сфере создания каркасных домов, гаражей, ангаров, торговых киосков, бытовок, модульных строений.</span>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-2-2">
                    <span class="text-black-h3">Роль металлоконструкций в современном мире</span>
                </div>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-0-2">
                    <span class="text-gray-16 text-justify">Прочность металлоконструкции – это важная характеристика, которая влияет на длительный период эксплуатации, на надежность и функциональность. В ходе разработок проектов с использованием металлокаркасов учитываются технические качества, ГОСТ, применяемый во время создания, и профессиональные рекомендации.</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow slideInRight">
                <span class="text-black-h3">У конструкций из металла есть свои плюсы:</span>
            </div>
            <div class="wow slideInRight">
                <div class="padding-block-2-2">

                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">простой монтаж при любой погоде;</span></li>
                            <li><span class="text-gray-16">неизменное сохранение формы;</span></li>
                            <li><span class="text-gray-16">удобство транспортировки;</span></li>
                            <li><span class="text-gray-16">эффективное применение под любым углом в качестве перекрытий или балок;</span></li>
                            <li><span class="text-gray-16">отсутствие реакций с плесенью и лишней влагой за счет заводского покрытия цинкованием;</span></li>
                            <li><span class="text-gray-16">пожаробезопасность;</span></li>
                            <li><span class="text-gray-16">удобство создания конструкций с видимой экономией средств;</span></li>
                            <li><span class="text-gray-16">универсальность применения в любых климатических зонах.</span></li>
                        </ul>
                    </div>

                </div>
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
                        <img class="green-img center-block" src="/images/information/metallokonstrukcii-001.jpg" alt="" title="" style="max-width: 500px;" />
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="wow slideInRight">
                    <div class="padding-block-0-2">
                        <span class="text-gray-16 text-justify">Изготовление металлоконструкций требует ответственного подхода, поэтому этот процесс проводится в соответственных условиях. Любая ошибка или существенное отклонение в итоге может обернуться опасностью для жизни. Современная производственная база позволяет создавать конструкции различные по уровню сложности, по формам и с разной возможностью крепления. За основу для изготовления берут высококачественные стальные листы, представляющие собой прочный и мобильный материал.</span>
                    </div>
                </div>

                <div class="wow slideInRight">
                    <p class="text-black-h3">Металлоконструкции, которые предлагаются на рынке, проходят три основных производственных этапа:</p>
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">проектирование;</span></li>
                            <li><span class="text-gray-16">подготовка и изготовление;</span></li>
                            <li><span class="text-gray-16">нанесение защитного покрытия.</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="wow slideInRight">
            <div class="padding-block-2-2">
                <span class="text-gray-16 text-justify">Изготовление производится как по индивидуальной схеме, так и по стандартной – контроль качества проводится обязательно на каждом этапе. Особый подход к созданию металлоконструкций позволяет создавать безопасные и выгодные по стоимости изделия, отличающиеся от безликих форм металлов. Специалисты с высокой квалификацией и надежное оборудование – это два основных ресурса, с помощью которых можно создать разные конфигурации из металла со строгим соблюдением сборки и размеров по чертежам. А безукоризненное соблюдение технологий позволяет решить главную задачу со стоимостью, придерживая ее на доступном уровне.</span>
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