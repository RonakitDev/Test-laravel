@extends('backend.layouts.master')

@section('title') Dashboard @endsection
@section('css')
    <!-- Dropzone css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">test 1</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>sum</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data_success as $key => $data_menux)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><a target="_blank">{{$data_menux}}</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Test 2</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            {{--                                                        @php--}}
                            {{--                                                        dd($data_two);--}}
                            {{--                                                        @endphp--}}
                            <div class="col-md-4">
                                <div class="form-group position-relative">
                                    <label for="validationTooltip01">Input: nums = </label>
                                    <span>
                                        [@foreach($data_two[0] as $nums)
                                            {{$nums}},
                                        @endforeach]
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group position-relative">
                                    <label for="validationTooltip02">sum = </label>
                                    <span>{{$data_two[1]}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label for="validationTooltip03">Output : </label>
                                    @if($data_two[2] == 'no output')
                                        no output
                                    @else
                                        [@foreach($data_two[2] as $sum)
                                            {{$sum}},
                                        @endforeach]
                                    @endif

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <!-- plugin js -->
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection
