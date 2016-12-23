<html id="signIn_bg" lang="en"><!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. --><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png">
    <title>BanglaFlix</title>

	<link href="login-register.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/the-big-picture.css" rel="stylesheet">
    <link href="./css/animate.min.css" rel="stylesheet">

   <link href="./css/font-awesome.min.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<script src="login-register.js" type="text/javascript"></script>

    <style type="text/css">

    .btn {
				background-color: #F07400 !important;
		 }

		 .btn:hover{

		   color: #333;
		   text-decoration: none;
	     }

		.btn-default{

		        background-color: #F07400 !important;
	    }

	    .btn-default:hover {
		  color: #333;
		  background-color: #FF6500;
		  border-color: #FF6500;
    }



    /* responsive text queries */
    @media screen and (max-width: 992px) {

      img {
        width: 200px;
      }


    }

    @media screen and (max-width: 768px) {

      img {
        width: 150px;
      }

    }

    @media screen and (max-width: 400px) {

      img {
        width: 120px;
      }

    }

    </style>


</head>

<body>



<!-- Page Content -->
<div class="container-fluid">

    <div class="row">

      <div class="col-xs-6">

       <img src="img/banglaflixlogo.png" class="animated fadeInDown" alt="Responsive image">

          </div>

          <div class="col-xs-6">

            <!--<button type="button" class="btn btn-danger pull-right">Sign In</button>-->

            <div class="started pull-right">


 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
  <span style="color: #f2f2f2;"> or </span>
 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Sign up</a>
            </div>

          </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
             <h1><strong><span style="color: #f2f2f2;">See What's Next!</span></strong></h1>
             <h3><strong><span style="color: #f2f2f2;">Watch anywhere, anytime! Thousands of movies just 1 click away!</span></strong></h3>


 </div>
        </div>
    </div>
    <!-- /.row -->

    	 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">

                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="/login" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Banglalink Number 88019XXXXXXXX" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="pincode" name="password">
                                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" action="/signup" accept-charset="UTF-8">
                                <input id="email2" class="form-control" type="text" placeholder="Active Banglalink Number 88019XXXXXXXX" name="email">
                                <input class="btn btn-default btn-register" type="button" value="Create free account" onclick="signupAjax()">
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="content forgetBox" style="display:none;">
                             <div class="form">
                                <form method="post" action="/forget" accept-charset="UTF-8">
                                <input id="email3" class="form-control" type="text" placeholder="Banglalink Number 88019XXXXXXXX" name="email">
                                <input class="btn btn-default btn-register" type="button" value="Get Pincode" onclick="forgetAjax()">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>
                                 <a href="javascript: showRegisterForm();">Create a free account</a> or <a href="javascript: showForgetForm();">forgot pincode</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>


<!-- /.container -->
<a href="https://play.google.com/store/apps/details?id=com.ebs.banglaflix"><img alt="Get it on Google Play" src="./img/unshaped-badge.png"></a>
&nbsp;
<a href="https://itunes.apple.com/us/app/banglaflix/id1124030141"><img alt="Get it on Appstore" src="./img/badge-download-on-the-app-store.svg"></a>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>




</body></html>