<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="images/favicon.png">

    
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'; ?>" rel="stylesheet">


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.css ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 20px;box-shadow: 5px 5px 5px">
            <div class="navbar-header">
                <?php $this->load->view('layout_template/header'); ?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php $this->load->view('layout_template/navbar_top'); ?>
            </ul>
            <!-- /.navbar-top-links -->
            </nav>
            <!-- Navbar Sidebar -->
            <nav>
            <div class="navbar-default sidebar" role="navigation">
                <?php $this->load->view('layout_template/sidebar'); ?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <?php $this->load->view($content); ?>

    </div>
    <!-- /#wrapper -->


    
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap4.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/vendor/datatables-responsive/dataTables.responsive.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/bootbox.min.js'; ?>"></script>

    <!-- jquery ui -->
    <script type="text/javascript" src="<?php echo base_url().'assets/jquery-ui/jquery-ui.js'; ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/jquery-ui/jquery-ui.css'; ?>">
    <!-- membuat data table -->
    <script type="text/javascript">
          $(document).ready(function(){  
                $('#example1').dataTable({
                    responsive:true
                });
            });  
    </script>
    <!-- menampilkan pesan sukses -->
    <script>
        $('#notification').slideDown('slow').delay(3000).slideUp('slow');
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.input-tanggal').datepicker({
            changeMonth: true, 
            changeYear: true, 
            dateFormat: "yy/mm/dd"
        });       
    });
</script>

<style>
    .user-image {
    border-radius: 10px;
    max-height:170px;
    max-width:170px;
}
</style>

<!-- alert Hapus -->
 <script>
        $(document).on("click","#alert_hapus", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Lanjutkan Menghapus", function(confirmed){
                if(confirmed){
                window.location.href = link;
            }
            });
        });
            
        
    </script>

</body>

</html>
