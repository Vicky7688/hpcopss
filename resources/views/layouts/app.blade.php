<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('public/assets/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('layouts.header')
    @include('layouts.sidebar')
    @include('alert')
    @yield('content')
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('customJs')
<script>

let table = new DataTable('#example');


    // new DataTable('#example', {
    //     paging: true,
    //     scrollCollapse: true,
    //     scrollY: '50vh'
    // });

    $(document).ready(function() {
        $('.date').datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: 0
        });
    });

    {{--  function cashclear() {
        $.ajax({
            url: "{{ route('clearcache') }}",
            type: "POST",
            data: {},
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(res) {
                if (res.status === 'success') {
                    toastr.success(res.messages);
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred while clearing the cache.');
            }
        });
    }  --}}


    function DateFormat(date){
        let newDate = new Date(date);
        let day = newDate.getDate();
        let month = newDate.getMonth() + 1;
        let year = newDate.getFullYear();

        day = day < 10 ? `0${day}` : day;
        month = month < 10 ? `0${month}` : month;
        let formattedDate = `${day}-${month}-${year}`;
        return formattedDate;
    }


</script>
</body>
</html>
