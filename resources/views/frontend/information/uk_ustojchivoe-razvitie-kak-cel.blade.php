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
        <h1 class="welcome-text text-center">Сталий розвиток як мета</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Сталий розвиток здатний повністю задовольнити потреби потенційних клієнтів і теперішнього часу, не ставлячи під загрозу свої власні принципи.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Грунтується на двох ключових моментах:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">потреби клієнтів, які є предметом першорядного рішення;</span></li>
                    <li><span class="text-gray-16">обмежений вплив на навколишнє середовище з задоволенням нинішніх і майбутніх запитів людини.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-black-h3 center-block">Задоволення потреб на ринку металургії</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">З огляду на те, що метал важливий для людини не тільки як матеріал, але і як предмет отримання прибутку, то постійно відкриваються нові шляхи його обробки і застосування. Для нашої компанії сталий розвиток - це основна мета, за якою стоїть ще кілька завдань, таких як поповнення асортименту, доступні ціни та незмінні критерії якості.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Рівень споживання металу змінюється щорічно і задовольняти його потреби слід незмінно. Співпраця з нашою компанією дає гарантії на якість і стабільність - замовлення виконуються постійно незалежно від обставин, що склалися. Як надійного партнера ЮТМК отримали багато компаній і приватні клієнти, які не здійснюють покупки в інших місцях.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Не завжди на ринку підкорює масовість, так як споживачів приваблюють і стабільні ціни, і популярні металеві вироби, і незмінний диференціал, і якісна сировинна база - все це готова в одному цілому запропонувати компанія ЮТМК. Ми раціонально використовуємо природні ресурси, отримуючи екологічно чистий продукт. В отриманні якісної продукції нам сприяє цілеспрямованість, сталий розвиток і підтримка партнерів як на внутрішньому, так і на зовнішньому ринку.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">У нас є найкраще обладнання і інструменти, які не створюють екологічних протиріч, і з їх допомогою можна підтримувати реальну ціну, змінюючи її в залежності від бюджетного рівня. Готова металопродукція орієнтована на поліпшення життя споживачів, на збереження біологічної ситуації, на зниження обсягів відходів.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Сталий розвиток - це складна мета, яка підтримується різними факторами: соціальним, економічним, інформаційним, міжнародним. Всі сформовані протиріччя, які виникають на шляху виготовлення металопрокату і на всіх рівнях технологічної переробки, своєчасно згладжуються і не уповільнюють темпи розвитку і випуску продукції.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection