<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="shortcut icon" href="images/favicon.png">
	<style>
		body{
			background-color: #ccc;
			background-image: url(images/ko.png);
		}
		.container{
			width: 300px;
			height: 260px;
			margin: 0px auto;
			margin-top: 12%;
			background-color: rgba(0,0,0,0.4);
			padding-top: 10px;
			padding-left: 50px;
			border-radius: 10px;
			box-shadow: 10px 10px 10px;
			font-size: 18px;
		}
		h2{
			color: #fff;
			font-weight: bolder;
		}
		.container input[type="text"]{
			width: 200px;
			height: 35px;
			border: 0px;
			border-radius: 5px;
			padding-left: 20px;
		}
		.container input[type="password"]{
			width: 200px;
			height: 35px;
			border: 0px;
			border-radius: 5px;
			padding-left: 20px;
		}
		.container input[type="submit"]{
			width: 100px;
			height: 35px;
			border: 0px;
			border-radius: 5px;
			font-weight: bolder;
			color: #fff;
			background-color: #ccc;
		}
		.container input[type="submit"]:hover{
			background-color: #705412;
			cursor: pointer;
		}
		
		.loading{
			display: none;
		}

		.preload{
        margin: 0pc;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform:translate(-50%,-50%);
      }
	</style>
</head>
<body>
<div class="preload">
    <img src="images/loading_spiner1.gif" alt="">
  </div>

<div class="loading">
	<div class="container">
	<div><?php echo $this->session->flashdata('peringatan') ?></div>
	<h2>Login</h2>
	  <?php echo form_open("auth/cek_login"); ?>
	  	<input type="text" name="user" placeholder="please enter username......" required 
	  	oninvalid="this.setCustomValidity('Harus Diisi')" oninput="this.setCustomValidity('')"><br><br>
	  	<input type="password" name="pass" placeholder="please enter password......" required 
	  	oninvalid="this.setCustomValidity('Harus Diisi')" oninput="this.setCustomValidity('')"><br><br>
	  	<input type="submit" value="LOGIN" class="btn"><br>
	  <?php echo form_close(); ?>
	</div>
</div> <!-- End Loading -->

<script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
</body>
</html>
<script type="text/javascript">
  $(function(){
    $(".preload").fadeOut(2000,function(){
      $(".loading").fadeIn(1000);
    })
  });
</script>
			
