<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/icon-favi.png') }}">

<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/dev.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />.
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}


<link href="{{ asset('plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<!--Form Wizard-->
<link rel="stylesheet" href="{{ asset('plugins/jquery-steps/jquery.steps.css') }}">

<!-- Plugins css -->
<link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

<link href="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/lightpick/lightpick.css') }}" rel="stylesheet" />

<!-- Sweet Alert -->
<link href="{{ asset('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">

<!-- DataTables -->
<link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/lib/toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('plugins/dropify/css/dropify.min.css') }} " rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('css/font.css')}}"  /> --}}

{{-- every css goes here --}}
    <style>

    #infoi {
    position: absolute;
    top: 0;
    right: 0;
    }
        tr {
        cursor: pointer !important;

    }
    .select2-container .select2-selection--single {
        height: 38px;
        border-color: #f0f0f3;
    }
    .sticky-div {
        z-index: 999;
        position: sticky !important;
        top: 70px;
        background: #f5f5f9;
        border-radius: 3px;
        margin-bottom: 15px;
        padding-left: 10px;
    }
    .page-title {
    font-weight: normal;
    text-transform: uppercase;
    }
    .button-items {
    /* padding-bottom: 20px !important; */

    .line {
        font-size: 30px;
        padding: 0;
    }

    button {
        border: none;
        /* width: 100px !important; */
    }

    i {
        font-size: 2rem !important;
        font-weight: lighter;
    }

    .btn:disabled {
        border-color: grey;
        color: grey;
    }

    }
        .chat-box-left {
            height: 590px !important;
        }

        .chat-box-left .chat-list {
            height: 500px !important;
        }

        .chat-box-right {
            height: 590px !important;
        }

        .chat-box-right .chat-body {
            height: 500px !important;
        }

        .chat-box-right .chat-body .chat-detail {
            max-height: 400px !important;
        }

    </style>
@yield('css')
