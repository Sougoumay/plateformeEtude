<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Dashio - Bootstrap Admin Template</title>

    <!-- Favicons -->
    <link href={{asset("assets/img/favicon.png")}} rel="icon">
    <link href="{{asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href={{asset("assets/lib/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">
    <!--external css-->
    <link href={{asset("assets/libfont-awesome/css/font-awesome.css")}} rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/zabuto_calendar.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/libgritter/css/jquery.gritter.css")}} />
    <!-- Custom styles for this template -->
    <link href={{asset("assets/css/style.css")}} rel="stylesheet">
    <link href={{asset("assets/css/style-responsive.css")}} rel="stylesheet">
    <script src={{asset("assets/lib/chart-master/Chart.js")}}></script>

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post" action="{{ route('createUser') }}">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="form-login-heading">sign up now</h2>
                <div class="login-wrap">
                    <label>Nom : </label>
                    <input type="text" name="nom" value="{{old('nom')}}" class="form-control" placeholder="Nom" autofocus>
                    <br>
                    <label>Prenom : </label>
                    <input type="text" name="prenom" value="{{old('prenom')}}" class="form-control" placeholder="Prenom" autofocus>
                    <br>
                    <label>Identifiant : </label>
                    <input type="text" name="identifiant" value="{{old('identifiant')}}" class="form-control" placeholder="Numero unique" autofocus>
                    <br>
                    <label>Email : </label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" autofocus>
                    <br>
                    <label>Password :  </label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password" autofocus>
                    <br>
                    <label>Confirm Password :  </label>
                    <input type="password" name="confirmPassword" value="{{old('confirmPassword')}}" class="form-control" placeholder="Confirm Password">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
                </div>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="mail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>
    <!--main content end-->
    <!--footer start-->

    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src={{asset("assets/lib/jquery/jquery.min.js")}}></script>

<script src={{asset("assets/lib/bootstrap/js/bootstrap.min.js")}}></script>
<script class="include" type="text/javascript" src={{asset("assets/lib/jquery.dcjqaccordion.2.7.js")}}></script>
<script src={{asset("assets/lib/jquery.scrollTo.min.js")}}></script>
<script src={{asset("assets/lib/jquery.nicescroll.js")}} type="text/javascript"></script>
<script src={{asset("assets/lib/jquery.sparkline.js")}}></script>
<!--common script for all pages-->
<script src={{asset("assets/lib/common-scripts.js")}}></script>
<script type="text/javascript" src={{asset("assets/lib/gritter/js/jquery.gritter.js")}}></script>
<script type="text/javascript" src={{asset("assets/lib/gritter-conf.js")}}></script>
<!--script for this page-->
<script src={{asset("assets/lib/sparkline-chart.js")}}></script>
<script src={{asset("assets/lib/zabuto_calendar.js")}}></script>
<script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            //title: 'Welcome to Dashio!',
            // (string | mandatory) the text inside the notification
            //text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
            // (string | optional) the image to display on the left
            image: 'img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>
<script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                type: "text",
                label: "Special event",
                badge: "00"
            },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
</body>

</html>
