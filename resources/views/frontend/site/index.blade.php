@extends('layouts.site')

@section('title')
    Metall Vsem
@endsection

@section('css')

@endsection

@section('content')

<section class="slider section-padding">

    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="1" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="2" data-target="#carousel-example-generic"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img alt="First slide" src="/images/slide/slide-01.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>We are the best in the fields of Import and Export</span>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="/images/slide/slide-02.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Different wholesale products available at discount prices</span>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="/images/slide/slide-03.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Quality is our primary concern for your satisfaction</span>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <div class="padding-top"></div>
                <p class="welcome-text">
                    WELCOME!
                </p>
                <div class="padding-top"></div>
            </div>
        </div>

        <div class="col-md-3 welcome-card">
            <img alt="Matallic Structures" title="Matallic Structures" src="/images/723140.jpg">
            <a href="#" class="welocme-cartd-title">Matallic Structures</a>
            <p>Металлоконструкции изготавливаются полуавтоматической электродуговой сваркой в защищенной среде углекислого газа полуавтоматами типа ПДГ - 508, либо ручной электродуговой сваркой. Резку разной конфигурации низкоуглеродистых сталей, легированных сталей и алюминия толщиной 2-22 мм (листы размером до 2,5х12 м) обеспечивает, имеющаяся на заготовочном участке, высокоточная плазмовая резка "Интертех - 2,5-1 Пл".</p>
            <a href="#" class="welocme-cartd-more">Read More <span> >> </span></a>
        </div>
        <div class="col-md-3 welcome-card">
            <img alt="Modular Buildings" title="Modular Buildings" src="/images/723489.jpg">
            <a href="#" class="welocme-cartd-title">Modular Buildings</a>
            <p>Модульные сооружения представляют собой готовые к эксплуатации, укомплектованные в заводских условиях блоки,  для использования в жилищных и других целях. Такие сооружения могут формироваться в сборный комплекс, неограниченных размеров по длине и ширине. Степень максимальной завершенности строительства - "под ключ". При заказе модульного комплекса из сборных отдельных сооружений и поодиночных бытовок, изготовление производится в заводских условиях.</p>
            <a href="#" class="welocme-cartd-more">Read More <span> >> </span></a>
        </div>
        <div class="col-md-3 welcome-card">
            <img alt="Galvanized Coils" title="Galvanized Coils" src="/images/723493.jpg">
            <a href="#" class="welocme-cartd-title">Galvanized Coils</a>
            <p><b>(прямые поставки из китая)</b></p>
            <p>Дорогие Партнеры, компания "ЮТМК" заключила договор с Международной Китайской Корпорацией "CNBM International", которая является мировым лидером по производству оцинкованных рулонов и рулонов с полимерным покрытием, на прямые поставки в Украину. Продукция данной корпорации очень популярна в Италии, Бельгии, Польши, России, Бразилии, Чили, Иране, Саудовской Аравии, ОАЭ, Филлипинах, Таиланде и теперь будет доступна в Украине.</p>
            <a href="#" class="welocme-cartd-more">Read More <span> >> </span></a>
        </div>
        <div class="col-md-3 welcome-card">
            <img alt="Metal from Europe" title="Metal from Europe" src="/images/723495.jpg">
            <a href="#" class="welocme-cartd-title">Metal from Europe</a>
            <p>Уважаемые партнеры, сложившаяся нелегкая ситуация в Украине оставила весомый след на отечественном производстве металлопроката, что часто является причиной простоев и мешает полноценной продуктивности украинских предприятий. В связи с этим, мы наладили прямые поставки металлопроката из Европы.</p>
            <a href="#" class="welocme-cartd-more">Read More <span> >> </span></a>
        </div>
    </div>
</section>

<section class="green-section container-fluid">
    <div class="container">

        <div class="clearfix padding-top"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-1.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            Quality Control
                        </p>
                        <p class="green-section-body">
                            Our qualified specialists, who help us to create status of a group leader, provide us a full range of testing the quality.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-2.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            DELIVERY
                        </p>
                        <p class="green-section-body">
                            We deliver products, ordered by you, anywhere in the world. And we'll advise you on the exploitation.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-3.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            CONSTRUCTION
                        </p>
                        <p class="green-section-body">
                            Frameless construction of hangars according to technology with the use of automatic building machine.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-4.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            YOUR ORDERS
                        </p>
                        <p class="green-section-body">
                            Manufacture steel pipe of on order (seamless, welded, profile, stainless, boiler) as soon as possible.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-5.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            SLICING SHEETS
                        </p>
                        <p class="green-section-body">
                            The cutting is carried out by guillotine on sheet with thickness up to 16 mm, cutting profiled by press-scissors.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-6.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            STRUCTURES
                        </p>
                        <p class="green-section-body">
                            Steel structures of platforms, ramps and bridges, span slabs, crossbars and support units,  lighting masts and towers.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-7.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            LINE STOPPING
                        </p>
                        <p class="green-section-body">
                            Our professional line stopping techniques bypass and isolate specific sections of your distribution system for repairs.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-8.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            PIPE FREEZING
                        </p>
                        <p class="green-section-body">
                            Pipe freezing is a process used to isolate part of your pipe systems for maintenance or repair.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row green-section-block">
                    <div class="col-xs-5">
                        <img alt="" title="" src="/images/green-section/icon-9.png">
                    </div>
                    <div class="col-xs-7">
                        <p class="green-section-title">
                            VALVE INSERT
                        </p>
                        <p class="green-section-body">
                            Insert valve allows the valve to deliver a constant pressure in the system, without any interruption.
                            <div class="show-md" style="padding-top: 10px;"></div>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix padding-top"></div>
    </div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection

