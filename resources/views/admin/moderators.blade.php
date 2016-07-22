@extends('layouts.admin')

@section('title')
    Личный кабинет
@endsection

@section('content')

    <section class="content-header">
        <h1>Менеджеры сайта</h1>
    </section>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
            <div class="row">
                <div class="col-sm-6">
                    <div id="example1_length" class="dataTables_length">
                        <label>Show
                            <select class="form-control input-sm" aria-controls="example1" name="example1_length">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="dataTables_filter" id="example1_filter">
                        <label>Search:
                            <input aria-controls="example1" placeholder="" class="form-control input-sm" type="search">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table aria-describedby="example1_info" role="grid" id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                        <tr role="row">
                            <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 294px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_asc">Rendering engine</th>
                            <th aria-label="Browser: activate to sort column ascending" style="width: 368px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Browser</th>
                            <th aria-label="Platform(s): activate to sort column ascending" style="width: 316px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Platform(s)</th>
                            <th aria-label="Engine version: activate to sort column ascending" style="width: 256px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Engine version</th>
                            <th aria-label="CSS grade: activate to sort column ascending" style="width: 189px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="even" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="odd" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="even" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td>1.9</td>
                            <td>A</td>
                        </tr>
                        <tr class="odd" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="even" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td>1.8</td>
                            <td>A</td>
                        </tr>
                        <tr class="odd" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Netscape 7.2</td>
                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                        <tr class="even" role="row">
                            <td class="sorting_1">Gecko</td>
                            <td>Netscape Browser 8</td>
                            <td>Win 98SE+</td>
                            <td>1.7</td>
                            <td>A</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" rowspan="1">Rendering engine</th>
                            <th colspan="1" rowspan="1">Browser</th>
                            <th colspan="1" rowspan="1">Platform(s)</th>
                            <th colspan="1" rowspan="1">Engine version</th>
                            <th colspan="1" rowspan="1">CSS grade</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div aria-live="polite" role="status" id="example1_info" class="dataTables_info">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-7">
                <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li id="example1_previous" class="paginate_button previous disabled">
                            <a tabindex="0" data-dt-idx="0" aria-controls="example1" href="#">Previous</a></li><li class="paginate_button active"><a tabindex="0" data-dt-idx="1" aria-controls="example1" href="#">1</a></li><li class="paginate_button "><a tabindex="0" data-dt-idx="2" aria-controls="example1" href="#">2</a></li><li class="paginate_button "><a tabindex="0" data-dt-idx="3" aria-controls="example1" href="#">3</a></li><li class="paginate_button "><a tabindex="0" data-dt-idx="4" aria-controls="example1" href="#">4</a></li><li class="paginate_button "><a tabindex="0" data-dt-idx="5" aria-controls="example1" href="#">5</a></li><li class="paginate_button "><a tabindex="0" data-dt-idx="6" aria-controls="example1" href="#">6</a></li><li id="example1_next" class="paginate_button next"><a tabindex="0" data-dt-idx="7" aria-controls="example1" href="#">Next</a></li></ul></div></div></div></div>
</div>
<!-- /.box-body -->

@endsection


@section('scripts')

<script src="/js/plugins/jquery.dataTables.min.js"></script>
<script src="/js/plugins/dataTables.bootstrap.min.js"></script>
<script src="/js/plugins/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/fastclick.min.js"></script>

<script>
    $('#example1').DataTable();
</script>

@endsection