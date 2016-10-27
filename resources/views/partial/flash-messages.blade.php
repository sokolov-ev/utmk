<section class="" style="padding: 15px;">

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="center-block text-center">{!! Session::get('success') !!}</span>
        </div>
    @endif

    @if(Session::has('info'))
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="center-block text-center">{!! Session::get('info') !!}</span>
        </div>
    @endif

    @if(Session::has('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="center-block text-center">{!! Session::get('warning') !!}</span>
        </div>
    @endif

    @if(Session::has('danger'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="center-block text-center">{!! Session::get('danger') !!}</span>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <span class="center-block text-center">{!! Session::get('error') !!}</span>
        </div>
    @endif

</section>