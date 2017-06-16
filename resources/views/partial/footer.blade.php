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
                    <li>
                        <a href="{{ url('/en/'.$path) }}" title="{{ trans('index.speech.en') }}">
                            {{ trans('index.speech.en') }}
                        </a>
                    </li>
                </ul>

                <p class="footer-title">{{ trans('index.footer.tell-us') }}</p>
                <ul class="list-unstyled footer-link-block tell-us">
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a class="footer-link" target="_blank" href="https://www.facebook.com/ЮТМК-1128346060536736" title="Facebook">Facebook</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-vk" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a class="footer-link" target="_blank" href="https://vk.com/utmkkiev" title="ВКонтакте">ВКонтакте</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a class="footer-link" target="_blank" href="https://www.instagram.com/utmk.kiev" title="Instagram">Instagram</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a class="footer-link" target="_blank" href="https://plus.google.com/+%D0%9E%D0%9E%D0%9E%D0%AE%D0%A2%D0%9C%D0%9A%D0%9A%D0%B8%D1%97%D0%B2" title="Google plus">Google plus</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-2 col-xs-1">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10">
                                <a class="footer-link" target="_blank" href="https://www.linkedin.com/company/yutmk" title="Linkedin">Linkedin</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3">
                <p class="footer-title">{{ trans('index.footer.contact') }}</p>
                <ul class="footer-contacts footer-link-block">
                    @foreach ($mainOffice as $contact)
                        <li>
                            <strong>{{ trans('offices.contactType.'.$contact['type']) }}</strong>:

                            @if (in_array($contact['type'], ['mobile', 'phone', 'accounting-tel']))
                                <a href="tel:{{ preg_replace('~\D+~','',$contact['contact']) }}">{{ $contact['contact'] }}</a>
                            @elseif ($contact['type'] == 'email')
                                <a href="mailto:{{ $contact['contact'] }}">{{ $contact['contact'] }}</a>
                            @else
                                {{ $contact['contact'] }}
                            @endif
                        </li>
                    @endforeach
                </ul>

                <p class="footer-title">{{ trans('index.footer.schedule_work') }}</p>
                <ul class="footer-contacts">
                    <li>
                        {{ trans('index.footer.work_time') }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="clearfix padding-top"></div>
    </div>
</section>