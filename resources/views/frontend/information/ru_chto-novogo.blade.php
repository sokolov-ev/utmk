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
        <h1 class="welcome-text text-center">Что нового?</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Изменением ассортимента продукции никого не удивишь, а вот высокое отношение к клиенту может предоставить не каждая компания. Высокий уровень удовлетворенности клиентов говорит о том, что продукт этого бренда достоин внимания. Для клиентов важно не только качество продукта, но и качество обслуживания – это своеобразная теорема.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Наша главная цель – удовлетворенность клиента</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">На всех этапах сотрудничества с нашей компанией мы ставим удовлетворенность клиента в ряд важных показателей, так как этот показатель оценивает объективно качество продукции и сервис компании. С начала заказа и до завершения покупки специалисты полностью выполняют все назначенные действия, включая консультацию, рекомендации и помощь в покупке. Далеко не каждый клиент точно знает, что он хочет купить и нуждается в помощи специалистов – такой подход стимулирует повторные покупки.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Когда линейка продуктов обновляется потребители не всегда замечают эти изменения и готовы открыто контактировать с продавцом. Наша компания не только готова заинтересовать клиентов лояльной ценой, но и предложить то качество продуктов, которое редко встречается на отечественном рынке. Ценные предложения дополняются высокой значимостью каждого продукта.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">После посещения нашего интернет магазина и сотрудничества со специалистами по продажам клиенты с улыбкой говорят: «Я доволен покупкой и обслуживанием», «Буду рад обратиться снова», «Покупка превзошла мои ожидания». Все эти слова подтверждаются годами практик, обновлением сервиса и услуг. Эмоционально положительное состояние – это и есть удовлетворенность клиента, к которой мы стремимся постоянно. Широкие возможности выбора – это еще один важный показатель, который мы используем на своей практике. То есть, компания осуществляет разные управленческие усилия, чтобы достигнуть равновесия между желаемой покупкой и реальной.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Время показало, что наша компания – компетентный и надежный партнер, который оказывает помощь каждому клиенту вместе с консультацией и поддержкой. Удовлетворенность клиента считаем главной целью как для всей компании, так и для отдела продаж в частности. Для достижения высокого результата была создана дилерская сеть, чтобы оставаться с клиентом не только в рамках отечественного рынка. Имидж компании год от года меняется в глазах клиентов, но параметры удовлетворенности клиентов остаются неизменными.</span>
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