<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>E- Katalog Pengembangan Kompetensi Pegawai</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- Custom Theme files -->
    <link href="loginbkraft/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="loginbkraft/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->

    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //web font -->
    <style>
        .error-msg{
            width:100%;
            min-height:30px;
            background-color: brown;
            padding: 10px;
            border-radius: 5px;
        }
        .error-details{
            color: #fff;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- main -->
    <div class="w3layouts-main">
        <div class="bg-layer">
            <h1>E- Katalog Pengembangan Kompetensi Pegawai</h1>
            <div class="header-main">
                @if($msg ?? ''!="")
                    <div class="error-msg">
                        <div class="error-details">
                            <h4>{{$msg ?? '' ?? ''}}</h4>
                        </div>
                    </div>
                @endif
                <div class="main-icon">
                    <img src="loginbkraft/images/logo.png">
                </div>
                <div class="header-left-bottom">
                    <form action=""  method="post" accept-charset="UTF-8" >
                    {{csrf_field()}}
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="text" placeholder="Username" name='pin'>
                        </div>
                        <div class="icon1">
                            <span class="fa fa-lock"></span>
                            <input type="password" placeholder="Password" name='pass'>
                        </div>
                        <!--<div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Remember Me</label>
                        </div>-->
                        <div class="bottom">
                            <button type="submit" class="btn"> 
                                Login
                            </button>                
                        </div>

                    </form>
                </div>

            </div>

            <!-- copyright -->
            <div class="copyright">
                <p>© 2019 Badan Ekonomi Kreatif | Design by <a href="#" target="_blank">Tim IT Bekraf</a></p>
            </div>
            <!-- //copyright -->
        </div>
    </div>
    <!-- //main -->

</body>

</html>