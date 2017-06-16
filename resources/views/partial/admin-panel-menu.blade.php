@if ( (Auth::guard('admin')->user()->role == 'SEO') || (Auth::guard('admin')->user()->role == 'SEO') )

    @if (Auth::guard('admin')->user()->role == 'Admin')
        <li>
            <a href="{{ url('/administration/sms') }}">
                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                <span>TurboSMS</span>
            </a>
        </li>
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
        <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Блог</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/administration/blog') }}">Редактор блога</a></li>
            <li><a href="{{ url('/administration/images') }}">Загрузка изображений</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ url('/administration/spravka') }}">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Справочник</span>
        </a>
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
        <a href="{{ url('/administration/menu') }}">
            <i class="fa fa-list-ol"></i>
            <span>Каталог продукции</span>
        </a>
    </li>

    <li>
        <a href="{{ url('/administration/products') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Продукция</span>
        </a>
    </li>

    <li>
        <a href="{{ url('/administration/exel') }}">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            <span>Продукция Exel</span>
        </a>
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