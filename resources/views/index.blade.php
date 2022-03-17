@extends('backend.layouts.master')

@section('title') Dashboard @endsection
@section('css')
    <!-- Dropzone css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')
    <div class="card-block">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">add menu</h4>
                        <form action="{{url('dashboard')}}" class="custom-validation" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>URL</label>
                                <div>
                                    <input parsley-type="url" type="url" name="url" class="form-control"
                                           required placeholder="URL"/>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" style="float: right"
                                            class="btn btn-primary waves-effect waves-light mr-1">
                                        save
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Url ก่อน</th>
                                <th>Url หลัง</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $data_menux)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><a target="_blank"
                                           href="{{$data_menux->url_before}}">{{$data_menux->url_before}}</a></td>
                                    <td><a target="_blank"
                                           href="{{$data_menux->url_after}}">{{$data_menux->url_after}}</a></td>
                                    <td>
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <button type="button" class="btn btn-warning waves-effect waves-light"
                                                    onclick="btnModalm({{$data_menux->id }})">edit
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                    onclick="btn_del({{$data_menux->id }})">delete
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <div id="resultModal">
            <div class="modal fade show" id="menu_edit" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="form_edit" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">edit</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>URL before </label>
                                    <div>
                                        <input parsley-type="url" id="url" type="url" name="url" value=""
                                               class="form-control"
                                               required placeholder="URL"/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">
                                    Save
                                    changes
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <form action="" method="post" id="form_del">
            @csrf
            @method('DELETE')
        </form>
    </div>

@endsection

@section('script')
    <script>
        function btnModalm(id) {
            // console.log(id)
            $.ajax({
                url: 'dashboard/' + id +'/edit',
                type: 'GET',
                success: function (data) {
                    $("#form_edit").attr('action', 'dashboard/' + id);
                    $('#url').val(data.url_before);
                    $("#menu_edit").modal('show');
                }
            });
        }


        function btn_del(id) {
            if (confirm('Confirm to Delete?')) {
                $('#form_del').attr('action', 'dashboard/'  + id);
                $("#form_del").submit();
            }
        }
    </script>
    <!-- plugin js -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>



@endsection
