<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistem Laporan Bulanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        width:100%;

  background-color: #ff9702;
      }
      #loading {
position:fixed;
top:0;
left:0;
z-index:9999;
text-align:center;
width:100%;
height:100%;
padding-top:150px;
font:bold 50px Calibri,Arial,Sans-Serif;
color:#000;
display:none;
background-color: transparent;
}


#penuh {
  width:100%;
}

.kiri
{
width:50%;
height:100%;

float:left;
}
.kanan
{
width:50%;
height:100%;
float:right;
}
    </style>
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link href="<?php echo base_url();?>assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/chosen.css" rel="stylesheet">  <!--Untuk Tampilan Chosen -->
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">  <!--Untuk Tampilan Chosen -->

    <script src="<?php echo base_url();?>assets/js/jquery-1.8.3.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
    <script>
     $(document).ready(function(){
      $(".chzn-select").chosen();
      });


$(document).ajaxStart(function() {
$( "#loading").show();
});
$(document).ajaxStop(function() {
$( "#loading").hide();
});


    </script>

  </head>

  <body>

    <div id="loading" ><img src="<?php echo base_url();?>images/loading.gif" alt="" /></div>

   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="brand" href="<?php echo base_url();?>home">SIMKEU</a> -->
           <?php $hak_akses=$this->session->userdata('hak_akses');
            if($hak_akses=="admin"){
            ?>
            <div class="nav-collapse collapse">
           
            <p class="navbar-text pull-right">
               <a href="<?php echo base_url();?>login/logout" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>home">Home</a></li>
             <!--  <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>akun">Akun Kecil</a></li> 
                   <!-- <li><a href="<?php echo base_url();?>akun_besar">Akun Besar</a></li> 
                   -->
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pemasukan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>pemasukan">Kas Kecil</a></li>

              <!--           <li><a href="<?php echo base_url();?>pemasukan_besar">Kas Besar</a></li> 
               -->    
                </ul>
              </li>

              <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengeluaran <b class="caret"></b></a>
                <ul class="dropdown-menu">
                   <li><a href="<?php echo base_url();?>pengeluaran">Kas Kecil</a></li>
                <li><a href="<?php echo base_url();?>pengeluaran_besar">Kas Besar</a></li>
                  
                </ul>
              </li> -->





              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan">Pemasukan kas Kecil</a></li>                       
                        <!-- <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan_besar">Pemasukan Kas Besar</a></li>                       
                        <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran">Pengeluaran kas Kecil</a></li>         
                        <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran">Pengeluaran Kas Besar</a></li> 
                  <li class="divider"></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum">Umum</a></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum_besar">Umum Besar</a></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan_rekening">Rekening</a></li> 
                  <li><a href="<?php echo base_url();?>laporan/laporan_rugi_laba">Rugi / Laba</a></li>
                   -->
                </ul>
              </li>

              

              <li class="dropdown">
                <a href="<?php echo base_url();?>user" >User Manajemen</a>
                
                  </li>


                   <li class="dropdown">
                <a href="<?php echo base_url();?>backup" >Backup Database </a>
                
              </li>
                </ul>
              

            </ul>
          </div><!--/.nav-collapse -->
          <?php
        }
        else if($hak_akses=="operator_kecil"){
            ?>
            <div class="nav-collapse collapse">
           
            <p class="navbar-text pull-right">
               <a href="<?php echo base_url();?>login/logout" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>home">Home</a></li>
             <!--  <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
               

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pemasukan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>pemasukan">Kas Kecil</a>
                    <li><a href="<?php echo base_url();?>akun">Muatan</a></li>
                    <li><a href="<?php echo base_url();?>akun">Jenis Kapal</a></li>
                    <li><a href="<?php echo base_url();?>akun">Dermaga</a></li>
                    <li><a href="<?php echo base_url();?>akun">Muatan</a></li>
                    <li><a href="<?php echo base_url();?>akun">Kegiatan</a></li>

                    </li>
                        
                  
                </ul>
              </li>

               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengeluaran <b class="caret"></b></a>
                <ul class="dropdown-menu">
                   <li><a href="<?php echo base_url();?>pengeluaran">Kas Kecil</a></li>
                
                  
                </ul>
              </li>





              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan">Pemasukan kas Kecil</a></li>                                             
                        <!-- <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran">Pengeluaran kas Kecil</a></li>         
                  <li class="divider"></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum">Umum</a></li>                
                   -->
                  
                </ul>
              </li>

              
                
                  
                </ul>
              

            </ul>
          </div><!--/.nav-collapse -->
           <?php
        }
        else if($hak_akses=="operator_besar"){
            ?>
            <div class="nav-collapse collapse">
           
            <p class="navbar-text pull-right">
               <a href="<?php echo base_url();?>login/logout" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>home">Home</a></li>
             <!--  <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
              

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pemasukan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>pemasukan_besar">Kas Besar</a></li> 
                  
                </ul>
              </li>

               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengeluaran <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo base_url();?>pengeluaran_besar">Kas Besar</a></li>
                  
                </ul>
              </li>





              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan  <b class="caret"></b></a>
                <ul class="dropdown-menu">                      
                        <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan_besar">Pemasukan Kas Besar</a></li>                             
                        <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran_besar">Pengeluaran Kas Besar</a></li> 
                  <li class="divider"></li>               
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum_besar">Umum Besar</a></li>         

                  
                </ul>
              </li>

              
                
                  
                </ul>
              

            </ul>
          </div><!--/.nav-collapse -->
           <?php
        }
        else if($hak_akses=="user"){
            ?>
            <div class="nav-collapse collapse">
           
            <p class="navbar-text pull-right">
               <a href="<?php echo base_url();?>login/logout" class="navbar-link">Logout</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>home">Home</a></li>
             <!--  <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li> -->
              

              

              





              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan">Pemasukan kas Kecil</a></li>                       
                        <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan_besar">Pemasukan Kas Besar</a></li>                       
                        <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran">Pengeluaran kas Kecil</a></li>         
                        <li><a href="<?php echo base_url();?>laporan/laporan_pengeluaran">Pengeluaran Kas Besar</a></li> 
                  <li class="divider"></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum">Umum</a></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_umum_besar">Umum Besar</a></li>         
                  <li><a href="<?php echo base_url();?>laporan/laporan_pemasukan_rekening">Rekening</a></li> 
                  <li><a href="<?php echo base_url();?>laporan/laporan_rugi_laba">Rugi / Laba</a></li>
                  
                </ul>
              </li>

              
                
                  
                </ul>
              

            </ul>
          </div><!--/.nav-collapse -->
          <?php

        }
        else{

        }
        ?>   




        </div>
      </div>
    </div>

    <div class="container">

      <?php echo $contents; ?>

    </div> <!-- /container -->

    <div class="footer">
      <!-- <img src="<?php echo base_url();?>images/logo.png"> -->

    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="<?php echo base_url();?>assets/js/bootstrap-transition.js"></script>
 <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-affix.js"></script>

    <script src="<?php echo base_url();?>assets/js/holder/holder.js"></script>
   

    <script src="<?php echo base_url();?>assets/js/application.js"></script> 

  </body>
</html>
