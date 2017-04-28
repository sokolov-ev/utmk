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
        <h1 class="welcome-text text-center">Briefly about us</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="wow fadeInLeft">
                <span class="text-gray-16 text-justify">Various types of constantly quality inspected metal goods are required for different applications. UTMK Kyiv Company is ready to offer the delivery of the highest quality products - since first day of existence the company established itself as a reliable partner with whom you can count on long-term cooperation. The rigorous approach to each detail of all work allows the company to produce only high-quality metal raw materials in a less time without ignoring three key points:  time, price and the quality.</span>
            </div>
            <div class="wow fadeInLeft">
                <div class="padding-block-2-2">
                    <span class="text-gray-16 text-justify">Considering that metal products are closely connected with the life of modern man, its widespread use is not surprising. The assortment is conditionally divided into application by categories, by complexity of manufacture and depending on the degree of accuracy. Not only the form is important, but also the internal composition of the products - during the production different types of metal are used, which according to the characteristics are divided into ordinary or special metal goods rolling (stainless, galvanized).</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="wow fadeInRight">
                <img class="green-img" src="/images/template/about-us-img-001.jpg" alt="Whatweoffer" title="Whatweoffer" style="max-width: 570px;">
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section class="container">

    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Whatweoffer</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <img class="green-img" src="/images/template/profile-img-001.png" alt="STRICT QUALITY CONTROL" title="STRICT QUALITY CONTROL" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('kontrol-kachestva') }}" class="text-green-20 font-up" title="STRICT QUALITY CONTROL">
                            STRICT QUALITY CONTROL
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">High competition forced our company to look for new ways to success, though the individual quality of the products system has been developed.  Including each needs of consumers, strict quality control has been developed, which not only improves solid position on market but also establishes the success of the whole enterprise.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('kontrol-kachestva') }}" class="btn btn-success send-button font-up">
                                READ MORE <span> >> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <img class="green-img" src="/images/template/profile-img-002.png" alt="EXPORT AND IMPORT OF METAL PRODUCTS" title="EXPORT AND IMPORT OF METAL PRODUCTS" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('eksport-import') }}" class="text-green-20 font-up" title="EXPORT AND IMPORT OF METAL PRODUCTS">
                            EXPORT AND IMPORT OF METAL PRODUCTS
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">A license to export metal from trusted partners is encouraged, which are not limited to selling their products and within the domestic market. Export and import of metal products are subject to stringent requirements established for the purpose of quality control.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('eksport-import') }}" class="btn btn-success send-button font-up">
                                READ MORE <span> >> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-04.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Only the best quality of production and attentive service</span>
        </div>
    </div>
</section>

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h2 class="welcome-text text-center">Basic information</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 text-center">
            <div class="wow fadeInLeft">
                <div class="padding-block-0-2">
                    <img class="green-img" src="/images/template/profile-img-004.jpg" alt="Basic information" title="Basic information" style="max-width: 570px;" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <a href="{{ route('nasha-politika') }}" class="text-black-h3 font-up" title="RELIABLE PARTNER IN METAL PRODUCTION FIELD">
                        RELIABLE PARTNER IN METAL PRODUCTION FIELD
                    </a>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <span class="text-gray-16">Stable work is carried out not only due to high-quality equipment, but also due to the help of a professional team. Raw materials for production are selected carefully, and finished products are hold in demand not only in our market, but in Europe as well, where the cost is higher by several orders of magnitude. Significant price load on the foreign market caused demand for Ukrainian products - the price of metal products has made the local production competitive.</span>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <a href="{{ route('nasha-politika') }}" class="btn btn-warning send-button font-up">
                        READ MORE <span> >> </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">IMPORT/EXPORT WORLDWIDE</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="padding-block-2-2">
                    <p class="text-gray-16">UTMK improving products is constantly engaged by expanding the possibilities of import /export. The sale of metal is carried out all over the world and covers the EU, Georgia, Belarus, Turkey, more than 100 countries and regions in sum. Actual business relationships provide returns for customers of different budget categories.</p>

                    <p class="text-gray-16">On the world stage, UMMC products are selected at the expense of a reasonable price and perfect service. The company strives to solve the common task of quality and service. The purchase and sale of rolled metal is carried out within the new economic conditions, both on physical and on-line sites. The final quotations for the products depend on stable indicators, such as unchanged quality and regularity of supply.</p>
                </div>

                <div class="padding-block-0-2">
                    <a href="{{ route('shirokij-eksport-import') }}" class="btn btn-warning send-button font-up">
                        READ MORE <span> >> </span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="padding-top"></div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-05.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Pragmatic approach to our clients</span>
        </div>
    </div>
</section>

<section class="container">

        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Property and capital</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-005.jpg" alt="Reliable Partner For Your Business" title="Reliable Partner For Your Business" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20" title="Reliable Partner For Your Business">
                        Reliable Partner For Your Business
                    </a>
                </div>

                <span class="text-gray-16">Unlike concrete materials, brick, metal concretes considered to be cost-effective, as it reduces the construction time and operating costs.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20">
                        <span class="font-up">READ MORE</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-006.jpg" alt="Our sales volumes" title="Our sales volumes" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20" title="Our sales volumes">
                        Our sales volumes
                    </a>
                </div>

                <span class="text-gray-16">The UTMK metal assortment consists of a wide range of products that are refined in the factory conditions strictly according by Government Standards. All metal products are classified by types, profiles, brands, sizes.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20">
                        <span class="font-up">READ MORE</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-007.jpg" alt="Sustainable Development as a goal" title="Sustainable Development as a goal" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20" title="Sustainable Development as a goal">
                        Sustainable Development as a goal
                    </a>
                </div>

                <span class="text-gray-16">Sustainable development can fully meet the needs of potential customers and the present, without jeopardizing their own principles.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20">
                        <span class="font-up">READ MORE</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-008.jpg" alt="Career opportunities" title="Career opportunities" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20" title="Career opportunities">Career opportunities</a>
                </div>

                <span class="text-gray-16">UTMK Metal products meet international standards, therefore for buyers offers a wide range and quality, and career opportunities for employees.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20">
                        <span class="font-up">READ MORE</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
        </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Our services</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">CUTTING</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">The cutting of the ordered rolled metal is carried out according to the indicated dimensions. Cutting is carried out before the final formation of the order. This service is chosen both by ordinary buyers and by businessmen.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('porezka') }}" title="CUTTING">
                            READ MORE <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">PACKAGING</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">There is no high-quality transportation without high-quality packaging, which is carried out at UTMK for all types of long products. In the course of packaging operations, the rules that are set by the standards for all metals companies are observed.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('upakovka') }}" title="PACKAGING">
                            READ MORE <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">DELIVERY</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Have you decided to purchase the metal goods via online-store? You make the right choice as from the price factor, as from the wide selection.  UTMK offers advantageous delivery of metal products throughout Ukraine. The company cooperates with the best shipping companies; therefore they can offer the best way for loading, considering the needs of the customer and with minimum expenses of money resources.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('dostavka') }}" title="DELIVERY">
                            READ MORE <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-03.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">The best metal goods with flexible payment system</span>
        </div>
    </div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">


        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Main activities</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-6">
                <div class="wow fadeInLeft">
                    <span class="text-gray-16 text-justify">All manufactured products have a high tensile strength, they are resistant to external influences, capable to withstand various levels of pressure, longer term of life time. Quality is constantly monitored by certificates and professional views - this promotes UTMK to hold the superior position in not only in words but in deeds.</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wow slideInRight">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">Long products (channel, hexagon, square, rod, beam, angles);</span></li>
                            <li><span class="text-gray-16">Pipe rolling (steel and boiler pipes);</span></li>
                            <li><span class="text-gray-16">Sheet rolling;</span></li>
                            <li><span class="text-gray-16">Malleation;</span></li>
                            <li><span class="text-gray-16">Curved profile (curved channel bars and angles).</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>
    <h2 class="welcome-text text-center">Why should choose UTMK?</h2>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-5 text-center">
            <div class="wow fadeInLeft">
                <img class="green-img" src="/images/template/about-us-img-007.jpg" alt="Why should choose UTMK?" title="Why should choose UTMK?" style="max-width: 256px;" >
            </div>
        </div>
        <div class="col-md-7">
            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <span class="text-gray-16">At the core of the company's work there`s a key unchanging goal - the stake on the development of long-term and successful relations in terms of mutual benefit. The popularity of UTMK is gradually expanding throughout the country, as metal products of the proper quality will not remain without due attention. The audience of metal consumers is constantly growing, in accordance with this factor, the demand of all company`s goods quality is increasing as well. In addition to meeting the basic requirements, the secondary issues of acceptance, storage, packaging and transportation also do not stand aside. </span>
                </div>
            </div>

            <div class="wow slideInRight">
                <span class="text-gray-16 text-justify">Our advantages:</span>
            </div>

            <div class="wow slideInRight">
                <div class="padding-block-1-2">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">Fast and cheap delivery of goods;</span></li>
                            <li><span class="text-gray-16">Supply of metal products in a wide range;</span></li>
                            <li><span class="text-gray-16">Competent advice and selection of rolled metal with an individual approach.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".about-us").addClass('active');

        $('.parallax-window').parallax();
    </script>
@endsection