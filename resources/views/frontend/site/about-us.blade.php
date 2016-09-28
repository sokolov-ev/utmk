@extends('layouts.site')

@section('title')
    {{ trans('index.menu.about_us') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Shortly about us</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="wow fadeInLeft">
                <span class="text-black-h3">GET SOME INFORMATION ABOUT OUR COMPANY</span>
            </div>

            <div class="wow fadeInLeft">
                <div class="padding-block-2-2">
                    <span class="text-gray-16">Our company is one of the largest pipe producers in the world. It consists of 9 factories. The products of the company are well known and have a high reputation among consumers of the building complex. Our products are considered to be one of the best in the world and is used during the construction of most of the strategic industrial, infrastructural and residential projects. We work to build long-term and reliable cooperation with our customers, providing them with high-quality products and services.</span>
                </div>
            </div>

            <div class="wow fadeInLeft">
                <div class="padding-block-0-2">
                    <button type="button" class="btn btn-warning send-button font-up">
                        Read More <span> >> </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="wow fadeInRight">
                <img class="green-img" src="/images/template/about-us-img-001.jpg" alt="" title="" style="max-width: 570px;">
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Mission statements</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange">PROVIDING HIGH QUALITY AND CONSTAT CONTROL OF THE QUALITY</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Our products are considered to be one of the best in the world and is used during the construction of most of the strategic industrial projects.Our qualified specialists, who help us to create status of a group leader in the market, provide us a full range of testing the quality of products.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <button type="button" class="btn btn-warning send-button font-up">
                            Read More <span> >> </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange">LONG-TERM AND RELIABLE COOPERATION WITH CUSTOMERS</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">We work to build long-term and reliable cooperation with our customers, providing them with high-quality products and services. Our products are well known all over the world. The company's work is famous for its quality. We are trusted, and we are recommended to our customers.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <button type="button" class="btn btn-warning send-button font-up">
                            Read More <span> >> </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange">HONESTY IN RELATIONS WITH CUSTOMERS AND PARTNERS</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">We live in a rapidly changing world. But invariable were and still are the basic principles on which the activity of the company has been built - honesty in relations with customers and partners, an extensive range of products, consistently high quality of our products, accessible prices, the desire for stability.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <button type="button" class="btn btn-warning send-button font-up">
                            Read More <span> >> </span>
                        </button>
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
            <span class="parallax-text">We have rich experience in exporting</span>
        </div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h2 class="welcome-text text-center">Executive team</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
            <div class="padding-block-2-2">
                <img class="green-img" src="/images/template/about-us-img-002.jpg" alt="" title="" style="max-width: 270px;">
            </div>

            <p class="text-black-h3">TOM JAMES</p>
            <p class="text-gray-16">Founder & President</p>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
            <div class="padding-block-2-2">
                <img class="green-img" src="/images/template/about-us-img-003.jpg" alt="" title="" style="max-width: 270px;">
            </div>

            <p class="text-black-h3">HELEN TOMPSON</p>
            <p class="text-gray-16">Director, Programs</p>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
            <div class="padding-block-2-2">
                <img class="green-img" src="/images/template/about-us-img-004.jpg" alt="" title="" style="max-width: 270px;">
            </div>

            <p class="text-black-h3">PATRICK POOL</p>
            <p class="text-gray-16">Director, Finance & Administration</p>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 text-center">
            <div class="padding-block-2-2">
                <img class="green-img" src="/images/template/about-us-img-005.jpg" alt="" title="" style="max-width: 270px;">
            </div>

            <p class="text-black-h3">ALICE PUSE</p>
            <p class="text-gray-16">Special Assistant to the President</p>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section class="green-section">
    <div class="container">

        <div class="padding-top"></div>
        <h2 class="welcome-text text-center" style="color: #fff;">Core values</h2>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-01.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">WE STRIVE FOR OUR CUSTOMERS</p>

                        <p class="green-section-body">We work to build long-term and reliable cooperation with our customers, providing them with high-quality products and services. The satisfaction of our customers - that is the main task.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-02.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">INTEGER RUTRUM ANTE EU LACUS</p>

                        <p class="green-section-body">Our products are considered to be one of the best in the world and is used during the construction of most of the strategic industrial, infrastructural and residential projects.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-03.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">RESPECTFUL ATTITUDE TO EACH CUSTOMER</p>

                        <p class="green-section-body">Respect goes beyond treating people politely. It means we value other people's experience, opinions and act by listening first. We may not always agree, but we will always be respectful.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-04.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">WE REALLY LOVE WHAT WE DO</p>

                        <p class="green-section-body">Everyone who comes in contact with us should leave with something, whether an employee, a peer, a customer - or just a a stranger in need.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>
    <h2 class="welcome-text text-center">Our advantages</h2>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-5 text-center">
            <div class="wow fadeInLeft">
                <img class="green-img" src="/images/template/about-us-img-007.jpg" alt="" title="" style="max-width: 256px;" >
            </div>
        </div>
        <div class="col-md-7">
            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <span class="text-gray-16">The company has a team of soul-mates who solve together the problems of providing consumers with heat and pure water. Many employees are working from the the founding of the company. We annually held training and retraining of personnel. Workers are provided with all necessary conditions for implementation of tasks as part of their activities.</span>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="orange-list">
                    <ul class="list-unstyled">
                        <li> <a href="#" class="" title="">Respect goes beyond treating people politely</a> </li>
                        <li> <a href="#" class="" title="">We really love what we do</a> </li>
                        <li> <a href="#" class="" title="">We strive for our customers</a> </li>
                        <li> <a href="#" class="" title="">We deliver anywhere in the world</a> </li>
                        <li> <a href="#" class="" title="">We value other people's experience</a> </li>
                    </ul>
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

