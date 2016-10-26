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
        <h1 class="welcome-text text-center">Ваши заказы как можно скорее</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-black-h3 center-block">Производство стальных труб на заказ (бесшовные, сварные, профильные, нержавеющие, котельные)</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Характеристики исходных материалов играют большое значение, поэтому многие заказчики прибегают к персональному заказу. В услуги компании ЮТМК включен раздел «Производство на заказ» - оперативное производство труб на заказ любого типа (сварные, бесшовные, нержавеющие, котельные, профильные). Выгоду от наших предложений получает каждый клиент – при минимальных затратах и в срок заказанная продукция будет доставлена, как и было договорено. Заказать нужный товар можно в любых объемах, не беспокоясь о том, что будет нарушено качество или другие технические характеристики. В рамках обработки персонального заказа специалисты нашей компании придерживаются ГОСТа, гарантируя выгоду и неизменное качество.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Металлопрокат в ассортименте – не граница для покупателя</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Несмотря на то, что рынок пополняется новыми изделиями из металла, потребность в индивидуальном заказе не пропадает. Услуга имеет как свои плюсы (подгон нужных габаритов и форм с отклонением от стандартного ряда), так и минусы (долгие сроки изготовления и увеличенная цена). ЮТМК в силу своих возможностей пытается сгладить минусы, предлагая производство стальных труб на заказ в сжатые сроки с большим уклоном на надежность и качество.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Сколько стоят металлоконструкции, оформленные под заказ? Зависит это от их объема, от отклонения от норм и трудоемкости работ. Чем сложнее по технологии получается изделие, тем дороже оно и будет оцениваться. Условия производства нашей компании не стеснены, поэтому изготавливаем трубы под заказ в разных объемах с полным контролем, начиная от проектирования и заканчивая грамотным подходом к изготовлению. Узнать актуальные цены можно уже после индивидуального расчета и выбора конкретного материала, формы и размеров изделия.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Все, что невозможно найти в каталоге, можно воплотить в жизни путем индивидуального заказа. Все виды стальных труб могут быть произведены компанией ЮТМК с учетом толщины стен, размеров и конструктивных изменений. Мы обладаем богатым опытом, а наши специалисты имеют необходимые знания, чтобы изготовить стальные трубы в нестандартном сортаменте. Индивидуальный заказ можно производить на разное количество изделий с упором на сферу их применения. Приглашаем всех в число наших партнеров и клиентов на взаимовыгодных условиях. Вам нужно сделать индивидуальный заказ на трубную заготовку? Вы цените профессионализм, оперативность и качество? Обращайтесь в ЮТМК!</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection