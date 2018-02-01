<?php

require_once "config.php";

Users::checkLog();

?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/boxed_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2015 14:30:10 GMT -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Form Validation</title>

    <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
      <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
      <link href="css/gallery.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    

      <link href="css/spin.css" rel="stylesheet" />
    <link href="css/jquery.steps.css" rel="stylesheet" />
    <link href="css/style-responsive.css" rel="stylesheet" />
      <link href="css/profile.css" rel="stylesheet" />
      
      
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="">



      <!-- header start -->
        <header class="header blue-bg">
              <div class="container ">
                  <div class="sidebar-toggle-box">
                      <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-reorder tooltips"></div>
                  </div>
                  <!--logo start-->
                  <a href="index-2.html" class="logo" >AFRICA<span style="color:#FCB322;">CODES</span></a>
                  <!--logo end-->
                  <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    
                  </div>
                  <div class="top-nav ">
                      <ul class="nav pull-right top-menu">
                          <li>
                              <input type="text" class="form-control search" placeholder="Search">
                          </li>
                          <!-- user login dropdown start-->
                          <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                  <img alt="" src="img/images.png" style="width: 30px;height: 30px;">
                                  <span class="username"><?php echo ucfirst(Users::detail()['unik']); ?></span>
                                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu extended logout">
                                  <div class="log-arrow-up"></div>
                                  
                                  <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                              </ul>
                          </li>
                          
                          <!-- user login dropdown end -->
                      </ul>
                  </div>
              </div>
        </header>
    <!-- header end -->

    <section id="main-content" style="margin-left:0px;">
        <!-- <div class="first_page bg_grey" id="sec_1"> -->
          <div class="container">
            <div id="srch_container"  style="margin-top: 100px;">
              <div class="row">
               
                <div class="theme-config" style="">
                  <div class="theme-config-box">
                      <div class="spin-icon">
                          <i class="fa fa-cogs fa-spin"></i>
                      </div>
                      <div class="skin-setttings">
                          <div class="title">Instructions</div>
                             <div class="skin-setttings" style="margin-left:0px;">
                          
                                  <div class="setings-item" style="padding:10px;font-size:12px;">
                                    <p>1. Upload profile picture using AJAX (into your images folder)</p>
                                    <p>2. Bind to database table 'Customers'</p>
                                    <p>3. Create customer in format:<br>
                                      - 'Femi Bejide, +2348034545561, femiapps@gmail.com, Lagos, [sysdate], [Auto Generated: Random]', validating the following in the customers registration form;<br>
                                      - date (no future date)<br>
                                      - email (*@.com) <br>
                                      - Email: Email exists in db (test with email in DB) <br>
                                      - Phone: No special characters (only number and +)</p>
                                      
                                    <p>Submit: Save to Customer table, Load Customer Table (Use Ajax)</p>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              
                  <span><a href="signin.php"><i class="fa  fa-angle-double-left" style=" font-size: 25px;color: #1ab394;"></i></a></span>
                <div class="col-lg-12" style="    margin-top: 10px;">
                
                    <div class="profile-nav col-lg-4">
                      <section class="panel" style=" height: 420px;">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="img/images.png" alt="">
                              </a>
                             
                               
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                            
                              <li >
                                <form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo">
                                <span class="btn btn-white btn-file" style="width:100%">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> upload image</span>
                                                   
                                                   <input type="file" id="file" name="file" class="default"/>
                                                   </span>
                                </form>
                               </li>
                               <p style="text-align:center;" id="msg"></p>


                              <li style="text-align:center;"><button id="upload" class="btn">Upload</button></li>
                              <li ><a href="dashboard.php" class="btn "></i>Proceed</a></li>
                          </ul>
                      </section>
                    </div>
                    <div class="col-lg-8">
                      <section class="panel" id="sec1" style=" height: 550px;">
                      <p style="text-align: center;" id="message"></p>
                        <header class="panel-heading" style="padding:10px;" >
                          <h4>Customer Registration</h4>
                        </header>
                        
                        <div class="panel-body" style="padding:20px;">
                            
                            <form method="post" id="myForm" action="customer.php" class="form-horizontal" role="form">
                              
                                      
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Full Name</label>
                                          <div class="col-lg-9">
                                              <input type="text" name="name" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group" style="margin-bottom:7px;">
                                          <label class="col-lg-3 control-label"> State of Residence</label>
                                          <div class="col-lg-9">
                                              <select class="form-control" name="city" style="width:100%;">
                                                <option>Choose</option>
                                                <option>Lagos</option>
                                                <option>Ibadan</option>
                                                <option>Abuja</option>
                                              </select>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Phone</label>
                                          <div class="col-lg-9">
                                              <input type="text" name="tel" class="form-control" placeholder="">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         <label class="col-lg-3 control-label">Email </label>
                                          <div class="col-lg-9">
                                              <input type="text" name="email" class="form-control" placeholder="">
                                          </div>
                                      </div>

                                        <div class="form-group">
                                                  <label class="control-label col-lg-3">Date</label>
                                                  <div class="col-lg-9">
                                                      <input class="form-control form-control-inline input-medium default-date-picker" name="date"  size="16" type="text" />
                                                  </div>
                                              </div>
                                      <div class="form-group">
                                          <label class="col-lg-3 control-label">Secret PIN</label>
                                          <div class="col-lg-9">
                                              <input type="text" name="pin" id="pin" class="form-control" value="<?php echo Users::pin(); ?>" placeholder="">
                                          </div>
                                      </div>
                                      

                                       <input class="btn btn-success" id="" style=" float: right; margin-left: 5px;" type="submit" name="submit" value="Submit">
                                       <button class="btn btn-info" id="but1" style=" float: right; margin-left: 5px;"> View </button>
                                      
                                     <!-- <input type="submit"  id ="buttn" data-toggle="modal" class="finish btn btn-info" value="Submit"> --> 
                                     <input type="submit" class="finish btn btn-danger" value="Cancel">
                            </form>
                          </div>
                      </section>
                      <section class="panel" id="sec2" style="display:none; height: 420px;">
                                                               <div class="panel-body">
                                                                   <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Email</th>
                                                                            <th>Full Name</th>
                                                                            <th>Phone</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="responsecontainer">
                                                                       
                                                                        </tbody>
                                                                    </table>
                                          <button class="btn btn-info" id="but2" type="button" style=" position: absolute; right: 34px;top: 375px; ">Back</button>
                       </section>
                    </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
         <!-- modal start -->
         <div class="col-lg-8">
           
         </div>
                     
                                                       
                                    <!-- modal end -->
        </div>
    </section>

     <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
     <script src="js/jquery.form.min.js"></script>
   <!--  // <script src="http://localhost/wotaman/pub/assets/fancybox/source/jquery.fancybox.js"></script> -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   
   <script type="text/javascript">
    $(document).ready(function() {
		$('#myForm').ajaxForm({
			target: '#message',
			success: function() {
			$('#message').fadeIn('slow');
			}
		});
    });
    </script>
		
 
    <script src="js/respond.min.js" ></script>
    <!--right slidebar-->
      <script type="text/javascript">
          $('.spin-icon').click(function () {
            $(".theme-config-box").toggleClass("show");
        });
        
      // replace the form
      $('#but1').click(function(){

      $.ajax({    
        type: "GET",
        url: "fetch.php",             
        dataType: "html",  
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });

      $("#sec1").hide() 
      // return the element
    $('#sec2').show();
    return false;
    
    
    });
       $('#but2').click(function(){

      $("#sec2").hide()
      // return the element
    return $('#sec1').show();
    return false;
   
    
    });

    </script>

  <!--File upload script-->
  <script type="text/javascript">
            $(document).ready(function (e) {
                $('#upload').on('click', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'customer.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });
</script>


<!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  
   <script src="js/advanced-form-components.js"></script>

  </body>

</html>