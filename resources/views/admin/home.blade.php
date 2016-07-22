@extends('layouts.admin')

@section('title')
    Личный кабинет
@endsection

@section('content')

    <section class="content-header">
        <h1>Профиль пользователя</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{{ $user->username }}</h3>
                        <p class="text-muted text-center">
                            @if ($user->role == 'Admin')
                                Администратор сайта
                            @else
                                Менеджер сайта
                            @endif
                        </p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Регион</b>
                                <a class="pull-right">{{ $user->region }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b>
                                <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Последняя активность</b>
                                <a class="pull-right">{{ date('H:i d-m-Y', $user->activity) }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-9">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Филиал</h3>
                    </div>
                    <div class="box-body">
                        <strong>
                            <i class="fa fa-book margin-r-5"></i>
                            Education
                        </strong>
                        <p class="text-muted"> B.S. in Computer Science from the University of Tennessee at Knoxville </p>
                        <hr>
                        <strong>
                            <i class="fa fa-map-marker margin-r-5"></i>
                            Location
                        </strong>
                        <p class="text-muted">Malibu, California</p>
                        <hr>
                        <strong>
                            <i class="fa fa-pencil margin-r-5"></i>
                            Skills
                        </strong>
                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong>
                            <i class="fa fa-file-text-o margin-r-5"></i>
                            Notes
                        </strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </section>

@endsection
