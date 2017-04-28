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
        <h1 class="welcome-text text-center">We strive to make our customers happy</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Regardless of the place our company occupies the foreign or domestic arena; our specialists always demonstrate leadership skills. The high standards of work present every time, knowledge is improved and responsibility for every decision taken is manifested. We act in the interests of customers, taking care of the formation of affordable value in accordance with the required quality.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">To achieve our goal we set obligations and observe in strict order. The partnership approach is supported by communicating with a respectful attitude. Therefore you will be pleased to receive consultations from us, whether you are a professional in the construction industry or an amateur. Innovative methods are of interested our clients, and the service level equals to European service.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">A special environment has already formed that means company's specialists could show their abilities. UTMK Company sets ambitious goals, so it achieves outstanding results. Our specialists can provide the legal protection of the customer rights of the price at the civilized market. In this case the quality is controlled by a transparent scheme, and the price is set in accordance with the optimal indicators.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Our values</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">What is our striving for each client? For this our company uses the following principles of responsibility:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Conducting an open and constructive dialogue</span></li>
                    <li><span class="text-gray-16">Implementation of the principles of sustainable development</span></li>
                    <li><span class="text-gray-16">Voluntary contribution to the economy of the country</span></li>
                    <li><span class="text-gray-16">Responsibility for each solution</span></li>
                    <li><span class="text-gray-16">Open-minded while working with clients</span></li>
                    <li><span class="text-gray-16">Provident using of natural resources</span></li>
                    <li><span class="text-gray-16">Mutually beneficial contacts with investors and other services</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">To build a long-term and reliable cooperation with customers is a highly professional task and the mission of UTMK Company. The sales department monitors customer satisfaction with the price factor, and the rest specialists take care of the quality of each product presented in the catalog. We proceed both individual and collective requirements; we are improving due to the interests of the client.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Being the best partner and supplier for clients is the main goal for UTMK Company, which the company successfully achieves by conquering different horizons of the market both on physical sales grounds and online. The offered wide assortment allows us to develop in the field of metallurgy, placing an accent on long-term relations.</span>
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