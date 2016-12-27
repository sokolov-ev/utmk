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
        <h1 class="welcome-text text-center">Ми прагнемо для наших клієнтів</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Незалежно від того, яке місце наша компанія займає на світовій або вітчизняної арені, фахівці постійно демонструють лідерство. Постійно дотримуються високі стандарти роботи, удосконалюються знання і проявляється відповідальність за кожне прийняте рішення. Діємо в інтересах клієнтів, дбаючи про формування доступною вартості сумірною з необхідною якістю.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Для досягнення своєї мети ми ставимо зобов'язання, яких дотримуємося в строгому порядку. Партнерська позиція підтримується при спілкуванні з шанобливим ставленням - вам буде приємно отримувати консультації у нас, будь ви професіонал у будівельній сфері або любитель. Інноваційні способи зацікавлюють наших клієнтів, а рівень послуг прирівнюється до європейського.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">У нас сформована спеціальне середовище, в якій фахівці компанії можуть проявляти свої здібності. ЮТМК ставить амбітні цілі, тому досягає видатних результатів. На цивілізованому ринку в ціні законний захист прав клієнтів, яку можуть надати наші фахівці, так як якість контролюється за прозорою схемою, а ціна виставляється відповідно до оптимальними показниками.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Наші цінності</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">У чому проявляється наше прагнення до кожного клієнта? Для цього компанія використовує такі принципи відповідальності:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Ведення відкритого конструктивного діалогу.</span></li>
                    <li><span class="text-gray-16">Впровадження принципів сталого розвитку.</span></li>
                    <li><span class="text-gray-16">Добровільний внесок в економіку країни.</span></li>
                    <li><span class="text-gray-16">Відповідальність за кожне рішення.</span></li>
                    <li><span class="text-gray-16">Відкритість під час роботи з клієнтами.</span></li>
                    <li><span class="text-gray-16">Бережливе використання природних ресурсів.</span></li>
                    <li><span class="text-gray-16">Взаємовигідні контакти з інвесторами та іншими службами.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Будувати довгострокове і надійне співробітництво з клієнтами - це високопрофесійне завдання і місія компанії ЮТМК. Відділ продажів контролює задоволеність клієнтів ціновим фактором, а решта фахівців дбають про якість кожного виробу, представленого в каталозі. Ми виконуємо як індивідуальні, так і колективні вимоги, вдосконалюємося в інтересах клієнта.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Бути кращим партнером і постачальником для клієнтів – мета ЮТМК, яку компанія успішно досягає, підкоряючи різні горизонти ринку як на фізичних майданчиках продажу, так і на онлайн. Пропонований широкий асортимент дозволяє нам розвиватися в сфері металургії, ставлячи акцент на довгострокових відносинах.</span>
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