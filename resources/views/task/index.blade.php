@extends('layouts.master')

@section('page_title', 'Contact Groups Details')
@section('title', 'Contact Groups ')
@section('main_item', 'Contact Groups')
@section('sub_item', 'Contact Group ')
@section('page-title-breadcrumb' ,'Contact Group ')
@section('page-title-breadcrumb2' ,'Contact Group Index ')


@section('content')

    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="row" style="float: right;">
                        <div class="form-group">
                            <a href="{{route('contacts.create')}}">
                            <button  class="btn btn"> Add New
                            </button>
                        </a>
                        </div>
                </div>
                <div class="table-responsive dash-social">
                    <table id="laravel_datatable" class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>

                                <th>First Name</th>
                                <th>Last Name </th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Contact Group</th>
                            </tr>
                            <!--end tr-->
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {

            let report_table = $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                bFilter: false,

                ajax: {
                    url: "{{ route('contacts.index') }}",

                },
                columnDefs: [{
                    "targets": [5],
                    "orderable": false,
                    "searchable": false,
                }],

                columns: [{
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'mobile_number',
                        name: 'mobile_number'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'contact_group',
                        name: 'contact_group'
                    },
                ]
            });


            $('#laravel_datatable').on('click', 'tbody tr', function() {
                let data = report_table.row(this).data();
                let id = data['id'];
                window.location = "/contacts/" + id

            })


        });
    </script>
@endsection
