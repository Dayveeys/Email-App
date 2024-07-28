<?php
    if (isset($page) && $page != 'payment'){
        Session::forget('ref');
        Session::forget('for_what');
        Session::forget('amount');
    }
    setcookie('googtrans', '/en/pt');
?>
<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="UTF-8">
    <meta name="description" content=" Bookyourvacay | Vacation">
    <meta name="keywords" content="Bookyourvacay, Vacation, homes, apartments">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="img\favicon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">




    <link rel="stylesheet" href="<?php echo e(asset('css\flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css\slicknav.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css\jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css\owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css\animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css\style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <?php if($page == 'orders'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/mod_datatables.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="<?php echo e(asset('admin/assets/plugins/datatables/dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
        .contact_link:hover{color:#00B8D4 !important;}
        .contact_link{color:white !important; cursor:pointer;}

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9998;
        }
        .sticky + .content {
            padding-top: 102px;
        }

        a.checkout {
            color: #fff;
        }
        button.disabled {
            display:none; !important;
        }
        button.disabled{
            display:none; !important;
        }

        #goog-gt-tt, .goog-te-balloon-frame{display: none !important;}
        .goog-text-highlight { background: none !important; box-shadow: none !important;}

        div.row div.col-md-12.product-details{
            margin-top:-70px;
        }
        #collapse1{
            margin-top:-28px;
        }

        @media  screen and (max-width: 766px) {
            div.row div.col-md-12.product-details{
                margin-top:0px;
            }
        }

    </style>

    <?php if($page == 'orders'): ?>
        <style>
            .loaderm{
                font-size:12px;
                display:none;
                position:absolute;
                margin-top:4.2px;
                margin-left:-30px;
            }
            .inline-group {
                max-width: 9rem;
                padding: .5rem;
            }

            .inline-group .form-control {
                text-align: right;
            }

            .form-control[type="number"]::-webkit-inner-spin-button,
            .form-control[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            @media  screen and (max-width: 766px) {
                .cart-table{
                    padding: 0px;
                    margin: 0px;
                    width: 330px;
                    overflow: hidden;
                    overflow-scrolling: unset
                }

                .quantity{
                    display: inline;
                }

                button.checkout{
                    margin-top: 20px;
                }

                .smthing{
                    margin-left: 10px;
                    margin-bottom: 10px;
                }

                #cart_title{
                    font-size:20px;
                    margin-left: 20px;
                    margin-top: 15px;
                }

                .subtotal, .bg_cart_remover{
                    display: none;
                }

                #thatrow > td{
                    width: 330px !important;
                    overflow: hidden;
                    position:static;
                }

                .loaderm{
                    font-size:20px;
                    display:none;
                    position:absolute;
                    margin-left:-23px;
                    margin-top:-1.8px;
                }

                table {
                    width: 100%;
                }

                table thead {
                    display: none;
                }

                table .remove {
                    display: none;
                }

                table tr {
                    margin-bottom: 8px;
                }

                table.mobile_view td {
                    display: block;
                }

                table td::before {
                    content: attr(label);
                    font-weight: bold;
                    width: 120px;
                    min-width: 120px;
                }
            }

            @media  print {
                b.d-sm-block.d-xs-block.d-md-none.d-lg-none, span.d-sm-block.d-xs-block.d-md-none.d-lg-none{
                    display: none !important;
                }
                td.d-none.d-md-block.d-lg-block{
                    display: block !important;
                }
            }
        </style>
    <?php endif; ?>

    <?php if($page == 'auth'): ?>
        <style>
            .help-block{
                color: red;
            }
            #contain{
                background-image: url(<?php echo e(asset('img/bg1.jpg')); ?>);
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                font-family: 'Numans', sans-serif;
            }

            .container{
                height: 100%;
                align-content: center;
            }

            .card{
                height: auto;
                margin-top: auto;
                margin-bottom: auto;
                width: 400px;
                background-color: rgba(0,0,0,0.5) !important;
            }

            .social_icon span{
                font-size: 60px;
                margin-left: 10px;
                color: #00B8D4;
            }

            .social_icon span:hover{
                color: white;
                cursor: pointer;
            }

            .card-header h3{
                color: white;
            }

            .input-group-prepend span{
                width: 50px;
                background-color: #00B8D4;
                color: white;
                border:0 !important;
            }

            input:focus{
                outline: inherit  !important;
                box-shadow: 0 0 0 0 !important;

            }

            .remember{
                color: white;
            }

            .remember input
            {
                width: 20px;
                height: 20px;
                margin-left: 15px;
                margin-right: 5px;
            }

            .login_btn{
                color: white;
                background-color: #00B8D4;
                width: 100px;
            }

            .login_btn:hover{
                color: black;
                background-color: white;
            }

            .links{
                color: white;
            }

            .links a{
                margin-left: 4px;
                color: #00B8D4;
            }
            .links a:hover{
                color: white;
            }
        </style>
    <?php endif; ?>

    <style type="text/css" media="screen">
        .goog-te-banner-frame.skiptranslate {display: none !important;}
        body { top: 0px !important; }
    </style>
</head>
<body>
    <?php if($page != 'orders'): ?>
        <div id="preloder">
            <div class="loader"></div>
        </div>
    <?php endif; ?>
    <span id="status" style="position:fixed;top:15px;right:15px;z-index:9999"></span>

    <?php echo $__env->yieldContent('slider'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo e(asset('js/bootstrap3-typeahead.min.js')); ?>" type="text/javascript"></script>
    
    
    <script src="js\jquery.slicknav.min.js"></script>
    <script src="js\owl.carousel.min.js"></script>
    <script src="js\jquery.nicescroll.min.js"></script>
    <script src="js\jquery.zoom.min.js"></script>
    <script src="js\jquery-ui.min.js"></script>
    <script src="js\main.js"></script>
    <script src="<?php echo e(asset('admin/assets/plugins/datatables/dataTables.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>


    <?php echo $__env->yieldContent('scripts'); ?>

    <script>
        $(document).ready(function () {

            "use strict"; // Start of use strict

            $('#dataTableExample1').DataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                "iDisplayLength": 6
            });

            $("#dataTableExample2").DataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                buttons: [
                    {extend: 'excel', title: 'My_Orders', className: 'btn-sm'},
                    {extend: 'pdf', title: 'My_Orders', className: 'btn-sm'},
                    {extend: 'print', className: 'btn-sm'}
                ]
            });

            $("#dataTableExample3").DataTable({
                dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "All"]],
                buttons: [
                    {extend: 'copy', className: 'btn-sm'},
                    {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                    {extend: 'print', className: 'btn-sm'}
                ]
            });

        });
    </script>

    <script>
        $('.sticky').show('');
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '<?php echo e(url('add-to-cart')); ?>' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '<?php echo e(csrf_token()); ?>'},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();
                    $("#cart_element").load(location.href+" #cart_element>*","");
                    $("#cart_element2").load(location.href+" #cart_element2>*","");
                    $("#cart_modal").load(location.href+" #cart_modal>*","");

                    // $("span#status").html('<div class="alert alert-success" style="position: fixed;top:15px;right:15px;z-index:99999">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                    // $(function() {
                    //     setTimeout(function() {
                    //         $(".alert-success").fadeOut("slow")
                    //     }, 3000);
                    // });
                }
            });
        });

    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: ''}, 'google_translate_element');
        }
    </script>



    <?php if(session('success')): ?>
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#success_modal").modal("show");
            });
        </script>
    <?php endif; ?>
    <?php if(session()->has('updated')): ?>
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#update_modal").modal("show");
            });
        </script>
    <?php endif; ?>
    <?php if(session()->has('failed')): ?>
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#fail_modal").modal("show");
            });
        </script>
    <?php endif; ?>
    <?php if(session()->has('order_details')): ?>
        <script type="text/javascript" charset="utf-8" async defer>
            $("#order_details").modal("show");
        </script>
    <?php endif; ?>
    <?php if(session()->has('proceed')): ?>
        <script type="text/javascript" charset="utf-8" async defer>
            $(document).ready(function(){
                $("#checkout_modal").modal("show");
            });
        </script>
    <?php endif; ?>
    <?php if($errors->has('email_address')): ?>
        <script>
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#newsletter_form").offset().top
            }, 700);
        </script>
    <?php endif; ?>

    <script>
        $(document).ready(function(){
            $(".home").trigger("click");
            $("#feature1").css("background-color", "#00B8D4");
            $(".top-title2").hide("");
            $(".top-title3").hide("");

            $(".home").click(function(){
                $("#feature1").css("background-color", "#00B8D4");
                $("#feature2").css("background-color", "white");
                $("#feature3").css("background-color", "white");
                $(".top-title1").show("");
                $(".top-title2").hide("");
                $(".top-title3").hide("");
            });

            $(".menu1").click(function(){
                $("#feature1").css("background-color", "white");
                $("#feature2").css("background-color", "#00B8D4");
                $("#feature3").css("background-color", "white");
                $(".top-title1").hide("");
                $(".top-title2").show("");
                $(".top-title3").hide("");
            });
            $(".menu2").click(function(){
                $("#feature1").css("background-color", "white");
                $("#feature2").css("background-color", "white");
                $("#feature3").css("background-color", "#00B8D4");
                $(".top-title1").hide("");
                $(".top-title2").hide("");
                $(".top-title3").show("");
            });
        });
    </script>


</body>
</html>