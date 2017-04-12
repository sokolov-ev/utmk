<section class="footer">
    <div class="container">
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-right">
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
            
            <div class="col-md-3 col-sm-3 col-right">
                <p class="footer-title">{{ trans('index.footer.our-services') }}</p>
                <ul class="list-unstyled footer-link-block">
                    <li><a href="{{ route('porezka') }}" title="">{{ trans('index.menu.information.cutting') }}</a></li>
                    <li><a href="{{ route('upakovka') }}" title="">{{ trans('index.menu.information.packaging') }}</a></li>
                    <li><a href="{{ route('dostavka') }}" title="">{{ trans('index.menu.information.delivery') }}</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3 col-right">
                <p class="footer-title">{{ trans('index.speech.languages') }}</p>
                <ul class="list-unstyled footer-link-block">
                    <li>
                        <a href="{{ url('/'.$path) }}" title="{{ trans('index.speech.ru') }}">
                            {{ trans('index.speech.ru') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/uk/'.$path) }}" title="{{ trans('index.speech.uk') }}">
                            {{ trans('index.speech.uk') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3">
                <p class="footer-title">{{ trans('index.footer.tell-us') }}</p>
                <ul class="list-unstyled footer-link-block tell-us">
                    <?php $link = empty($locale) ? '/' : $locale; ?>
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a href="https://plus.google.com/share?url={{ url($link) }}"
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
                                <a href="https://twitter.com/intent/tweet?text=Metall+Vsem+{{ url($link) }}+via+@metallvsem+%23MetallVsem"
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
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url($link) }}"
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
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url($link) }}"
                                   title="LinkedIn"
                                   class="footer-link"
                                   onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=610,width=600'); return false;">LinkedIn</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="clearfix padding-top"></div>
    </div>
</section>