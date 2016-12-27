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
        <h1 class="welcome-text text-center">Упаковка</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Качественная транспортировка металлопродукции невозможна без упаковки, которая проводится на ЮТМК для всех видов сортового проката. В ходе выполнения работ по упаковке соблюдаются правила, которые установлены стандартами для всех компаний по выпуску металлов.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <div class="wow fadeInUp">
                <span class="text-black-h3 center-block">Правильная упаковка металлопроката – залог успеха компании</span>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Качество листов металла во многом зависит от правильной упаковки, которая должна быть защищена от коррозии и деформации, от внешних повреждений при хранении и транспортировке. Особое значение упаковки играет при перемещении продукции на большие расстояния. Во время погрузочно-разгрузочных операций правильная упаковка позволит сэкономить время и правильно осуществить весь процесс.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">В зависимости от конкретного вида металлопродукции выбирается подходящий метод упаковки, который позволяет безопасно транспортировать и хранить. Но не только характеристики товара влияют на особенности упаковки, а и погодные условия. В холодную погоду неправильно подобранные материалы для упаковки могут разрываться или повреждаться под действием дождя, снега, мороза. Исключить такие неудобства можно только при подборе универсального упаковывающего материала – в ЮТМК для этих целей используется специальная стальная упаковывающая лента.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Упаковка металла проходит по разным схемам, которые более удобны для транспорта. Плотная фиксация стальных листов предупредит их рассыпание и неблагоприятное трение друг о друга. Металлическую тару необходимо беречь от воздействия влаги, поэтому выбираются транспортировочные машины со стойким накрытием.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">По способу упаковки она может быть сборной (соединено несколько металлических элементов разных по форме и размерам) или специально подготовленной (предназначена для одного вида продукции). Современные требования к упаковке металлов направлены на полное сохранение их свойств и качества, поэтому если они соблюдаются перевозчиком, то волноваться ни о чем не стоит. Целостность упаковки сохраняется не только в ходе транспортировки, но и во время дальнейшего использования, ведь не каждый клиент после покупки будет использовать металл сразу.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Проводят упаковку металлопродукции с учетом габаритов и формата листов. В зависимости от длины пачка обвязывается в нескольких местах с расстоянием 0,5 м. По требованиям потребителя пачки могут быть расфасованы с заранее определенным количеством.</span>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection