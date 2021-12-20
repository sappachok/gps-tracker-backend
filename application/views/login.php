<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Admin Theme : Master</title>
	<!-- Bootstrap Styles-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?php echo base_url(); ?>css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
</head>
<style>
    :root {
	--main-bg-color: #ff4d59;
}

* {
	box-sizing: border-box;
}

html,
body {
	height: 100%;
	width: 100%;
	display: flex;
	background-color: var(--main-bg-color);
}

.container {
	margin: auto;
	padding: 2rem;
	border-radius: 2.5rem;
	background-color: var(--main-bg-color);
}

.logo {
	display: flex;
	width: 100%;
	margin-bottom: 4rem;
    margin-top: 3rem;
}

.logo__circle {
	margin: auto;
	width: 10rem;
	height: 10rem;
	display: flex;
	border-radius: 9999px;
	background-color: #fff;
/* 	border: 1px solid black; */
color: #ff4d59;

}

.logo__svg {
	margin: auto;
	width: calc(10rem / 2);
	height: calc(10rem / 2);
	
}

.form__group {

	margin-bottom: 2rem;
	position: relative;
}

.form__icon {
	position: absolute;
	left: 0;
	height: 100%;
	display: flex;
	width: 3rem;
}

.form__icon svg {
	margin: auto;
	weight: 0.75rem;
	height: 0.75rem;
	opacity: 0.35;
}

.form__control {
	text-transform: uppercase;
	letter-spacing: 0.15em;
	border: none;
	font-size: 1.5rem;
	width: 100%;
	display: block;
	padding: 0.875rem 1rem;
	border-radius: 1.5rem;
	
}

.form__control:focus {
	outline: none;
    border-radius: 1.5rem;
}

.form__control:focus::placeholder {
	color: #d3d3d3;
	letter-spacing: 0.15em;
}

.form__control::placeholder {
	color: #CCCCCC;
}

.form__button {
	text-transform: uppercase;
	letter-spacing: 0.15em;
	border: none;
	font-size: 1.5rem;
	color: #FFFFFF;
	background-color: green;
	width: 100%;
	display: block;
	padding: 0.875rem 1rem;
	border-radius: 1.5rem;

}

.form__button:focus {
	outline: none;

}

.form__button:hover {
	opacity: 0.85;
}
</style>
<body>
<?php 

if ($this->session->userdata('message_code')) {
  $message_code = $_SESSION['message_code'];
  $message = $_SESSION['message_error'];
      $this->session->unset_userdata('message_code');
      $this->session->unset_userdata('message_error');
?>
<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Danger!</strong> <?php echo $message;?>

  </div>

  <?php 
  }
  ?>
   

         <div class="container">
            <h3 style="text-align: center;">ลงชื่อเข้าใช้งาน</h3>
	<div class="logo">
		<div class="logo__circle">
        <i class="fa fa-user fa-10x logo__svg"></i>
			
		</div>
	</div>
    <form  name="formlogin" action="<?php echo site_url("login/check_login");?>" method="POST" id="login" class="form-horizontal">

		<div class="form__group">
        
          <i class="material-icons">person</i>
          <label for="email">E-mail</label>
          <input type="email"  name="email" class="form-control" required placeholder="Email address" />	
		</div>
		<div class="form__group">
        <i class="material-icons">vpn_key</i> 
            <label for="pwd">Password</label> 
            <input type="password" name="pwd" class="form-control" required placeholder="Password" />
		</div>
		<div>
        <button type="submit" class="form__button" id="btn">
			
				Login
			</button>
		</div>
        
	</form>
</div>
			
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url(); ?>js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>js/custom-scripts.js"></script>
    
   
</body>
</html>
