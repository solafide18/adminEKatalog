<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>BATARA | PENGEMBANGAN KOMPETENSI PEGAWAI BAPAREKRAFT</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('/')}}/favicon.ico" type="image/x-icon">
    @include('shared.style')

    @include('shared.scripts')    
</head>
</head>

<body class="theme-red">
    <input type="hidden" value="{{url('/')}}" id="urlPath">
    <input type="hidden" value="{{Session::get('isAdmin')[0]}}" id="isAdm">
    @include('shared.pageloader')
    @include('shared.navbar')
    @include('shared.section')
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    
</body>

</html>