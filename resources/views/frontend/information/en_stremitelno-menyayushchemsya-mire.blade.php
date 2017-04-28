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
        <h1 class="welcome-text text-center">We live in a rapidly changing environment and we are bystanders of the profound changes in society, consciousness, funds and business.</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Such characteristics as reliability, consistently high qualities, durability, affordable prices at the present-day world are signified a major role. Steel products can be produced on the equipment with professional functions, therefore products manufacturing of any complexity is possible within the limits of different volumes.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">If you need metal construction so pay attention to our products</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Our company guarantees for all customers:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Reliability;</span></li>
                    <li><span class="text-gray-16">Delivery performance;</span></li>
                    <li><span class="text-gray-16">Warranty of quality;</span></li>
                    <li><span class="text-gray-16">Professional competence;</span></li>
                    <li><span class="text-gray-16">Individual approach.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The popular appeal of metal constructions is justified by their good performance, aesthetics, and resistance characteristics, economically viable, resistant to the different impacts. According to the wide possibilities it is a reason to create different architectural metal construction. Progressive technologies create new forms and open an optimal price-quality ratio.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Cooperation with our company provides so many benefits, which are performed for each order. Professionalism, long-term experience of employees and modern equipment are our main strengths. The price depends on choosing material.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">There are many factories and companies in the country offer the same products as us, but can they guarantee stability and reliability? Some attentive customers could observe how the production of beginners was at first of a high quality, and after a while it was reduced to a zero. Why does it happen? The answers are different, but our company can guarantee the invariable conformance with the Standards in a dynamically developing environment. We offer to order products regarding to the personal requirements or choose in the current catalog. It is enough to contact our employees who have enough knowledge about the products and skills to assist you.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-0">
            <span class="text-gray-16 text-justify">Each branch is rapidly developing but the principles of our company remain unchanged in society, in funds, in business. Our integrity with partners and customers positively affects into the activities of our company, and social responsibility and the pursuit of stability is the key to our success. In industries and construction, our products have proven themselves, and in some areas have become indispensable.</span>
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