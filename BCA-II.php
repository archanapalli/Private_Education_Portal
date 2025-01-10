<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Private Education Portal</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./assets/images/logo91.png"
    />
    <!-- Custom CSS -->
    <link href="./assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="./dist/css/style.min.css" rel="stylesheet" />
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script>
      //get header and menu
      $(function(){     
		$.ajax({  
		  type: "GET",
		  url: "adminHeader.php",  
		  dataType: "html",
		  success: function(menuHTML) { 
     
			$(".page-wrapper").before(menuHTML);  
		  },
		  error: function(){
			alert("failed call!!!");
		  } 
		}); 
		return false;  
	});
  //get footer scripts
  $(function(){     
		$.ajax({  
		  type: "GET",
		  url: "footer.html",  
		  dataType: "html",
		  success: function(footerHtml) { 
       
			$(".page-wrapper").after(footerHtml);  
		  },
		  error: function(){
			alert("failed call!!!");
		  } 
		}); 
		return false;  
	});
    </script>

  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
    
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       <!-- <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>-->
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">TIMETABLE</h5>
                  <?php
                      //List 
                       $sql = "SELECT *FROM `allottime_table` WHERE class='sem-III'";
                       $arr1=[];
                       if($result = mysqli_query($link,$sql)){
                        while( $row = mysqli_fetch_array($result))
                        {$no_s= $row['no_session'];
              
                          $sub = $row['subject'];
                            
                            
                 for($r = 0 ; $r < $no_s ; $r++){
                   $arr1[]=$sub;
                  
                 }
                }
                $sizeOf = count($arr1);
                echo "<table
                        id='zero_config'
                        class='table table-striped table-bordered'
                      >";
                      echo "<tr>";
                      echo  "<th>TimeSlot / Weekday</th>";
                       echo  "<th>Monday</th>";
                       echo  "<th>Tuesday</th>";
                       echo  "<th>Wednesday</th>";
                       echo  "<th>Thursday</th>";
                       echo "<th>Friday</th>";
                       echo  "<th>Saturday</th>";
                       echo "</tr>";

                //creating an static array of timeslot 
                $timeslot = array("07:30-08:15","08:15-09:00","9:00-09:45","09:45-10:30","10:30-11:00");
                $i = 0;
                $g =0;
                while( $i < count($timeslot)){
                  echo "<tr>";
                  echo "<td>".$timeslot[$i] . "</td>";
                  $i++;
                  $j = 0;
                 
                  while($j<6)
                  {
                   if($g<$sizeOf) //arrsize<=0
                    {
                      echo "<td>".$arr1[$g]."</td>";
                      $g++;
                    }
                    else
                    {
                      echo "<td></td>";
                      
                    }
                    $j++;
                   
                  }
                  echo "</tr>";
                 
                              }
      }
 ?>   
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- =============================foter================================= -->
  </body>
</html>