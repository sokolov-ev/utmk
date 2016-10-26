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
        <h1 class="welcome-text text-center">Мы стремимся для наших клиентов</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Вне зависимости от того, какое место наша компания занимает на мировой или отечественной арене, специалисты постоянно демонстрируют лидерство. Постоянно соблюдаются высокие стандарты работы, совершенствуются знания и проявляется ответственность за каждое принятое решение. Действуем в интересах клиентов, заботясь о формировании доступной стоимости соизмеримой с требуемым качеством.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Для достижения своей цели мы ставим обязательства, которые соблюдаем в строгом порядке. Партнерская позиции поддерживается при общении с уважительным отношением – вам будет приятно получать консультации у нас, будь вы профессионал в строительной сфере или любитель. Инновационные способы заинтересовывают наших клиентов, а уровень услуг приравнивается к европейскому.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">У нас сформирована специальная среда, в которой специалисты компании могут проявлять свои способности. ЮТМК ставит амбициозные цели, поэтому достигает выдающихся результатов. На цивилизованном рынке в цене законная защита прав клиентов, которую могут предоставить наши специалисты, так как качество контролируется по прозрачной схеме, а цена выставляется в соответствии с оптимальными показателями.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Наши ценности</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В чем проявляется наше стремление к каждому клиенту? Для этого компания использует следующие принципы ответственности:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Ведение открытого конструктивного диалога.</span></li>
                    <li><span class="text-gray-16">Внедрение принципов устойчивого развития.</span></li>
                    <li><span class="text-gray-16">Добровольный вклад в экономику страны.</span></li>
                    <li><span class="text-gray-16">Ответственность за каждое решение.</span></li>
                    <li><span class="text-gray-16">Открытость во время работы с клиентами.</span></li>
                    <li><span class="text-gray-16">Бережливое использование природных ресурсов.</span></li>
                    <li><span class="text-gray-16">Взаимовыгодные контакты с инвесторами и другими службами.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Строить долгосрочное и надежное сотрудничество с клиентами – это высокопрофессиональная задача и миссия компании ЮТМК. Отдел продаж контролирует удовлетворенность клиентов ценовым фактором, а остальные специалисты заботятся о качестве каждого изделия, представленного в каталоге. Мы выполняем как индивидуальные, так и коллективные требования, совершенствуемся в интересах клиента.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Быть лучшим партнером и поставщиком для клиентов – цель ЮТМК, которую компанию успешно достигает, покоряя разные горизонты рынка как на физических площадках продажи, так и на онлайн. Предлагаемый широкий ассортимент позволяет нам развиваться в сфере металлургии, ставя акцент на долгосрочных отношениях.</span>
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