<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pratama Polos Jaya</title>
    <link rel="shortcut icon" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  </head>
  <body>

  <div class="preload">
    <img src="images/loading_spiner1.gif" alt="">
  </div>

<div class="loading">

   <nav class="navbar" style="margin-bottom: 0px;">
   <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">PRATAMA POLOS JAYA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url().'auth'; ?>" ><i class="fa fa-share-square-o" style="font-size:15px"></i>&nbsp;Login</a></li>
      </ul>
    </div>
    </nav>


     <!-- Slide Show -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="border-top: 5px solid lightblue; border-bottom:5px solid lightblue ">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url().'images/new1.jpg' ?>" alt="kaos">
    </div>
    <div class="item">
      <img src="<?php echo base_url().'images/new2.jpg' ?>" alt="kaos">
    </div>
    <div class="item">
      <img src="<?php echo base_url().'images/new3.jpg' ?>" alt="kaos">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   <!--  End Slide Show -->

   </div>  <!--  End Loading -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>

<style>
	.item img{
        width: 100%;
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

<script type="text/javascript">
  $(function(){
    $(".preload").fadeOut(2000,function(){
      $(".loading").fadeIn(1000);
    })
  });
</script>
