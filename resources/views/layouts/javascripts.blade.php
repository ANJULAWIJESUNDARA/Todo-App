<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('plugins/apexcharts/apexcharts.min.js') }}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>

<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>

<script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>

<script src="{{ asset('plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-repeater.js') }}"></script>

<script src="{{ asset('plugins/jquery-steps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-wizard.init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Buttons examples -->
<script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.validation.init.js') }}"></script>
<script src="{{ asset('plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.datatable.init.js') }}"></script>

<script src="{{ asset('plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('plugins/chartjs/roundedBar.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.ecommerce_dashboard.init.js') }}"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset('plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.sweet-alert.init.js') }}"></script>
<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/lib/toast/jquery.toast.min.js') }}"></script>
<script>
    $('#datatable').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: function(toast) {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    $(document).on('click', '#new_message', function() {
        let url = $(this).attr('data-href');
        $('.contact-modal').load(url, function() {
            $('.contact-modal').modal('show');
            $('.select2').select2();
        })
    });
    function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [month, day,year].join('/');
}





</script>

@if (isset(session('message')['success']))
    @if (session('message')['success'] == '1')
        <script>
             $.toast({
                

                    heading: 'Success',
                    text: "{{ session('message')['message'] }}",
                    position: 'top-right',
                    bgColor: '#1ecab8',
                    icon: 'success',
                    showHideTransition: 'fade',
                    loaderBg: '#ecf0f1'
                })
        </script>
    @else
        <script>
             $.toast({
                    heading: 'Error',
                    text: "{{ session('message')['message'] }}",
                    position: 'top-right',
                    bgColor: '#f1646c',
                    icon: 'error',
                    showHideTransition: 'fade',
                    loaderBg: '#ecf0f1'
                })
        </script>
    @endif
@endif

{{-- every page scripts goes here --}}
@yield('scripts')
