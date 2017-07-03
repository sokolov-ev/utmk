@if ( (Auth::guard('admin')->user()->role == 'SEO') || (Auth::guard('admin')->user()->role == 'Admin') )

    @if (Auth::guard('admin')->user()->role == 'Admin')
        <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Пользователи</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/administration/moderators') }}">Менеджеры</a></li>
                <li><a href="{{ url('/administration/clients') }}">Клиенты</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ url('/administration/sms') }}">
                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                <span>TurboSMS</span>
            </a>
        </li>

        <li>
            <a href="{{ url('/administration/orders') }}">
                <i class="fa fa-file-text-o"></i>
                <span>Заказы</span>
            </a>
        </li>

        <li class="header">FRONTEND</li>
    @endif

    <li>
        <a href="{{ url('/administration/offices/index') }}">
            <i class="fa fa-cubes"></i>
            <span>Филиалы</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Статьи</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/administration/blog') }}">Блог</a></li>
            <li><a href="{{ url('/administration/spravka') }}">Справочник</a>
            <li><a href="{{ url('/administration/images') }}">Загрузка изображений</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ url('/administration/metatags') }}">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Метатеги</span>
        </a>
    </li>

    <li>
        <a href="{{ url('/administration/price') }}">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Файлы</span>
        </a>
    </li>

    <li>
        <a href="{{ url('/administration/baners') }}">
            <i class="fa fa-barcode" aria-hidden="true"></i>
            <span>Банеры</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Продукция</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/administration/menu') }}">Категории</a></li>
            <li><a href="{{ url('/administration/products') }}">Каталог</a>
            <li><a href="{{ url('/administration/exel') }}">Exel</a></li>
        </ul>
    </li>

@endif

@if (Auth::guard('admin')->user()->role == 'Moderator')
    <li>
        <a href="{{ url('/administration/products') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Продукция</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/administration/orders') }}">
            <i class="fa fa-file-text-o"></i>
            <span>Заказы</span>
        </a>
    </li>
@endif