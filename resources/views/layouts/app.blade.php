<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | {{ config('app.name', 'Mbtech Office') }}</title>
    <meta name="description" content="Mbtech - Office">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">
    {{-- <link href="{{ asset('css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet"> --}}

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body class="bg-dark">

    @yield('content')


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
 
     {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">   --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

  <script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'dd-mm-yyyy'  
         });  
    </script>
{{-- Image function --}}
 <script>
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('images/noimage.jpg')}}');
            $('#remove').val(1);
        }
    </script>

   {{-- <script src="{{ asset('js/lib/chart-js/Chart.bundle.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/widgets.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
    --}}
    <script>
        var oTable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: { 
            url: '{{ route('datatable/getdata') }}'
            // data: function (d) {
            //     d.status = $('select[name=status]').val();
            // }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'region', name: 'region'},
            {data: 'provinsi', name: 'provinsi', orderable: false},
            {data: 'kota', name: 'kota', orderable: false},
            {data: 'kecamatan', name: 'kecamatan'},
            {data: 'status', name: 'status'},
            {data: 'toko', name: 'toko'},
            {data: 'alamat', name: 'alamat'},
            {data: 'phone', name: 'phone'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $('select').on('change', function(e) {
        // alert(this.value);
        oTable.draw();
        e.preventDefault();
    });
    
</script>
<script>

  function ConfirmDelete()
  {
  var x = confirm("Kamu Yakin ingin menghapusnya?");
  if (x)
    return true;
  else
    return false;
  }

</script>
</body>
</html>
