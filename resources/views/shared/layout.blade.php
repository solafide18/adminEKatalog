<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>E-Katalog Kompetensi dan Pengembangan Pegawai</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    @include('shared.style')

    @include('shared.scripts')    
</head>
</head>

<body class="theme-red">
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