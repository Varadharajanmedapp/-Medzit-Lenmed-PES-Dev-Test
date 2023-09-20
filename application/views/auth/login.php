<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Rizvi">
  <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
  <link rel="shortcut icon" href="uploads/favicon.png">
  <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>
  <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <!-- <link href="common/css/style.css" rel="stylesheet"> -->
  <link href="common/css/style-responsive.css" rel="stylesheet" />
  <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="common/css/style2.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="stylesheet" href="common/css/font-awesome.min.css" type="text/css" media="all">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="login-body">
      <div class="w3l-signinform">
        <!-- container -->
        <div class="wrapper">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h1>Welcome to your hybrid health cloud</h1>
                    <img src="common/images/logo.png" class="header_logo" alt="medzit logo" height="100">
                     <h3 class="bottom_text">The most comprehensive patient engagement, data & cinical workflow consolidation platform</h3>
                    <p class="sub-para"><div id="infoMessage"><?php echo $message; ?></div></p>
                    <h2>Authorised users login here:</h2>
                    <form class="form-signin" method="post" action="auth/login">
                        <div class="input-group">
                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="email" name="identity" placeholder="User Email" autofocus autocomplete="new-username">
                        </div>
                        <div class="input-group two-groop">
                            <span><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="Password" class="password" name="password" placeholder="Password" autocomplete="new-password">
                            <span class="eye_icon"><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        </div>
                        <div class="form-row bottom">
                            <button class="login_button" type="bottom"><img src="common/images/login-button.png"/></button>
                        </div>
                        <div class="form-row bottom">
                          <a data-toggle="modal" class="forgot" href="auth/forgot_password"> Forgot Password?</a>
                        </div>
                    </form>
                
                   
                </div>
            </div>
        </div>
    </div>
    <script src="common/js/jquery.js"></script>
    <script>
    $('#eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('.password').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('.password').attr('type','password');
        }
    });
    </script>
  </body>
</html>
