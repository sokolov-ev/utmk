<section class="footer">
    <div class="container">
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p class="footer-title">{{ trans('index.footer.company') }}</p>
                        <ul class="list-unstyled footer-link-block">
                            <li>
                                <a href="{{ route('index-page', request()->query()) }}" title="{{ trans('index.menu.home') }}">
                                    {{ trans('index.menu.home') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about-us', request()->query()) }}" title="{{ trans('index.menu.about_us') }}">
                                    {{ trans('index.menu.about_us') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile', request()->query()) }}" title="{{ trans('index.menu.company_profile') }}">
                                    {{ trans('index.menu.company_profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('products-index', request()->query()) }}" title="{{ trans('index.menu.products') }}">
                                    {{ trans('index.menu.products') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('network-of-offices', request()->query()) }}" title="{{ trans('index.menu.network_of_offices') }}">
                                    {{ trans('index.menu.network_of_offices') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contacts', request()->query()) }}" title="{{ trans('index.menu.contact_us') }}">
                                    {{ trans('index.menu.contact_us') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p class="footer-title">{{ trans('index.footer.our-services') }}</p>
                        <ul class="list-unstyled footer-link-block">
                            <li><a href="{{ route('porezka') }}" title="">{{ trans('index.menu.information.cutting') }}</a></li>
                            <li><a href="{{ route('upakovka') }}" title="">{{ trans('index.menu.information.packaging') }}</a></li>
                            <li><a href="{{ route('dostavka') }}" title="">{{ trans('index.menu.information.delivery') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <p class="footer-title">{{ trans('index.speech.languages') }}</p>
                        <ul class="list-unstyled footer-link-block">
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" title="{{ trans('index.speech.en') }}">
                                    {{ trans('index.speech.en') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'ru']) }}" title="{{ trans('index.speech.ru') }}">
                                    {{ trans('index.speech.ru') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'uk']) }}" title="{{ trans('index.speech.uk') }}">
                                    {{ trans('index.speech.uk') }}
                                </a>
                            </li>
                        </ul>

                        <p class="footer-title">{{ trans('index.footer.tell-us') }}</p>
                        <?php
                            if (App::getLocale() == 'ru') {
                                $link = url('/');
                            } else {
                                $link = url('/')."?lang=".App::getLocale();
                            }
                        ?>
                        <ul class="list-unstyled footer-link-block tell-us">
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-1">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://plus.google.com/share?url={{ $link }}"
                                           title="Google +"
                                           class="footer-link"
                                           onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=610,width=600'); return false;">Google +</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-1">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://twitter.com/intent/tweet?text=Metall+Vsem+{{ $link }}+via+@metallvsem+%23MetallVsem"
                                           title="Twitter"
                                           class="footer-link"
                                           onclick="window.open(this.href, '', 'width=640,height=436'); return false;">Twitter</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-1">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $link }}"
                                           title="Facebook"
                                           class="footer-link"
                                           onclick="window.open(this.href, '', 'width=640, height=436'); return false;">Facebook</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-1">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $link }}"
                                           title="LinkedIn"
                                           class="footer-link"
                                           onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=610,width=600'); return false;">LinkedIn</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                <div class="pull-right text-right">
                    <p class="footer-title">{{ trans('index.footer.contact') }}</p>

                    <div class="row footer-contacts">
                        @foreach ($office_contacts['contacts'] as $contact)
                            <div class="col-md-7 col-sm-8 col-xs-6 text-right">{{ $contact['type'] }}:</div>
                            <div class="col-md-5 col-sm-4 col-xs-6 text-right">{{ $contact['data'] }}</div>
                        @endforeach
                    </div>

                    <p class="footer-title">{{ trans('index.footer.headquarter') }}</p>

                    <div class="text-right footer-contacts">{{ $office_contacts['address'] }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="footer-title">{{ trans('index.footer.reference') }}</p>
                <span class="footer-link-block">
                    <a href="{{ route('armatura') }}" title="{{ trans('index.menu.information.armatura') }}">
                        {{ trans('index.menu.information.armatura') }},
                    </a>
                    <a href="{{ route('balka-dvutavr') }}" title="{{ trans('index.menu.information.balka-dvutavr') }}">
                        {{ trans('index.menu.information.balka-dvutavr') }},
                    </a>
                    <a href="{{ route('katanka') }}" title="{{ trans('index.menu.information.katanka') }}">
                        {{ trans('index.menu.information.katanka') }},
                    </a>
                    <a href="{{ route('kvadrat') }}" title="{{ trans('index.menu.information.kvadrat') }}">
                        {{ trans('index.menu.information.kvadrat') }},
                    </a>
                    <a href="{{ route('krug') }}" title="{{ trans('index.menu.information.krug') }}">
                        {{ trans('index.menu.information.krug') }},
                    </a>
                    <a href="{{ route('polosa') }}" title="{{ trans('index.menu.information.polosa') }}">
                        {{ trans('index.menu.information.polosa') }},
                    </a>
                    <a href="{{ route('rels') }}" title="{{ trans('index.menu.information.rels') }}">
                        {{ trans('index.menu.information.rels') }},
                    </a>
                    <a href="{{ route('ugolok') }}" title="{{ trans('index.menu.information.ugolok') }}">
                        {{ trans('index.menu.information.ugolok') }},
                    </a>
                    <a href="{{ route('shveller') }}" title="{{ trans('index.menu.information.shveller') }}">
                        {{ trans('index.menu.information.shveller') }},
                    </a>
                    <a href="{{ route('shestigrannik') }}" title="{{ trans('index.menu.information.shestigrannik') }}">
                        {{ trans('index.menu.information.shestigrannik') }},
                    </a>
                    <a href="{{ route('staltrub') }}" title="{{ trans('index.menu.information.staltrub') }}">
                        {{ trans('index.menu.information.staltrub') }},
                    </a>
                    <a href="{{ route('truby-kotelnye') }}" title="{{ trans('index.menu.information.truby-kotelnye') }}">
                        {{ trans('index.menu.information.truby-kotelnye') }},
                    </a>
                    <a href="{{ route('pokovka') }}" title="{{ trans('index.menu.information.pokovka') }}">
                        {{ trans('index.menu.information.pokovka') }},
                    </a>
                    <a href="{{ route('list-hardox') }}" title="{{ trans('index.menu.information.list-hardox') }}">
                        {{ trans('index.menu.information.list-hardox') }},
                    </a>
                    <a href="{{ route('list-stalnoj') }}" title="{{ trans('index.menu.information.list-stalnoj') }}">
                        {{ trans('index.menu.information.list-stalnoj') }},
                    </a>
                    <a href="{{ route('shveller-gnutyj') }}" title="{{ trans('index.menu.information.shveller-gnutyj') }}">
                        {{ trans('index.menu.information.shveller-gnutyj') }},
                    </a>
                    <a href="{{ route('ugolok-gnutyj') }}" title="{{ trans('index.menu.information.ugolok-gnutyj') }}">
                        {{ trans('index.menu.information.ugolok-gnutyj') }},
                    </a>
                    <a href="{{ route('z-obraznyj-profil') }}" title="{{ trans('index.menu.information.z-obraznyj-profil') }}">
                        {{ trans('index.menu.information.z-obraznyj-profil') }},
                    </a>
                    <a href="{{ route('metallokonstruktsii') }}" title="{{ trans('index.menu.information.metallokonstruktsii') }}">
                        {{ trans('index.menu.information.metallokonstruktsii') }},
                    </a>
                    <a href="{{ route('modulnye-soorujeniya') }}" title="{{ trans('index.menu.information.modulnye-soorujeniya') }}">
                        {{ trans('index.menu.information.modulnye-soorujeniya') }},
                    </a>
                    <a href="{{ route('otsinkovannye-rulony') }}" title="{{ trans('index.menu.information.otsinkovannye-rulony') }}">
                        {{ trans('index.menu.information.otsinkovannye-rulony') }},
                    </a>
                    <a href="{{ route('metall-iz-evropy') }}" title="{{ trans('index.menu.information.metall-iz-evropy') }}">
                        {{ trans('index.menu.information.metall-iz-evropy') }},
                    </a>
                </span>
            </div>
        </div>
        <div class="clearfix padding-top"></div>
    </div>
</section>