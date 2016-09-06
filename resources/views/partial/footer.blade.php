<section class="sales-footer">
    <div class="container">
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-8">

                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <p class="sales-footer-title">{{ trans('index.footer.company') }}</p>
                        <ul class="list-unstyled sales-footer-link-block">
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.home') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.about_us') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.company_profile') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.products') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.network_of_offices') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.contact_us') }}</a></li>
                        </ul>

                        <p class="sales-footer-title">{{ trans('index.footer.our-services') }}</p>
                        <ul class="list-unstyled sales-footer-link-block">
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.cutting') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.packaging') }}</a></li>
                            <li><a href="#" title="" class="sales-footer-link">{{ trans('index.menu.delivery') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <p class="sales-footer-title">{{ trans('index.footer.tell-us') }}</p>
                        <ul class="list-unstyled sales-footer-link-block tell-us">
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://plus.google.com/share?url=metallvsem.com.ua?lang={{ App::getLocale() }}"
                                           title="Google +"
                                           class="sales-footer-link"
                                           onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=610,width=600'); return false;">Google +</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://twitter.com/intent/tweet?text=Metall+Vsem+metallvsem.com.ua?lang={{ App::getLocale() }}+via+@metallvsem+%23MetallVsem"
                                           title="Twitter"
                                           class="sales-footer-link"
                                           onclick="window.open(this.href, '', 'width=640,height=436'); return false;">Twitter</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=metallvsem.com.ua?lang={{ App::getLocale() }}"
                                           title="Facebook"
                                           class="sales-footer-link"
                                           onclick="window.open(this.href, '', 'width=640, height=436'); return false;">Facebook</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-sm-2 col-xs-2">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-sm-10 col-xs-10">
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=metallvsem.com.ua?lang={{ App::getLocale() }}"
                                           title="LinkedIn"
                                           class="sales-footer-link"
                                           onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=610,width=600'); return false;">LinkedIn</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <p class="sales-footer-title">{{ trans('index.speech.languages') }}</p>
                        <ul class="list-unstyled sales-footer-link-block">
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" title="{{ trans('index.speech.english') }}" class="sales-footer-link">
                                    {{ trans('index.speech.en') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'ru']) }}" title="{{ trans('index.speech.russian') }}" class="sales-footer-link">
                                    {{ trans('index.speech.ru') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ request()->fullUrlWithQuery(['lang' => 'uk']) }}" title="{{ trans('index.speech.ukrainian') }}" class="sales-footer-link">
                                    {{ trans('index.speech.uk') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <p class="sales-footer-title pull-right clearfix">{{ trans('index.footer.contact') }}</p>
                <div class="row pull-right clearfix sales-footer-contacts">
                    @foreach ($office_contacts['contacts'] as $contact)
                        <div class="col-md-7 col-sm-7 col-xs-6 text-right">{{ $contact['type'] }}:</div>
                        <div class="col-md-5 col-sm-5 col-xs-6 text-right">{{ $contact['data'] }}</div>
                    @endforeach
                </div>

                <p class="sales-footer-title pull-right clearfix">{{ trans('index.footer.headquarter') }}</p>
                <div class="text-right sales-footer-contacts pull-right clearfix">
                    {{ $office_contacts['address'] }}
                </div>
            </div>
        </div>
        <div class="clearfix padding-top"></div>
    </div>
</section>