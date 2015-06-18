<!DOCTYPE html>
<html lang="en">
<?php
       require_once('../includes/initialize.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    
    $u_id = $_SESSION['user_id'];
    //echo($_SESSION['password']);
    //$user=Users::find_by_id($_SESSION['u_id']);
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USPMES - PhD</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/homepage.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand" style="color: black; font-family: Josefin Slab; text-transform: uppercase">Phd Portal</div>
    <div class="address-bar" style="color: black; font-family: Josephin Slab">Dhirubhai Ambani Institute of Information and Communication Technology</div>
    
    
    <!-- Navigation -->
    <nav class="navbar navbar-default" style="background: #fff; background: rgba(255,255,255,0.9)" role="navigation">
        <div class="container-fluid">
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="../homepage/homepage.php">USPMES - PhD</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../homepage/homepage.php">Home</a>
                    </li>
                    <li>
                        <a href="Cmpr.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="../rps/rps.php">RPS</a>
                    </li>
                    <li>
                        <a href="../phd_synopsis/synopsis.php">PhD Synopsis</a>
                    </li>
                    <li>
                        <a href="../guidelines/Guidelines.php">Guidelines</a>
                    </li>
                    <li>
                        <a href="../Schedule/Schedule.php">Schedule</a>
                    </li>
                    <li class="profile-info dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            echo $_SESSION['user_id'];
                            ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                            
                            <li>
                                
                                <a href="../profile/editprofile.php">
                                    <i class="entypo-lock"></i>
                                    Edit Password
                                </a>
                            </li>
                            
                            <li>
                                <a href="../includes/logout.php">Log Out </a> <i class="entypo-logout right"></i>
                            </li>
                        </ul>
                    </li>
                </ul>
                    
            </div>
            <!-- /.navbar-collapse -->
            
        </div>
        
        <!-- /.container -->
    </nav>

    <div class="container">

            <div class="box">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>USER ID</label>
                        <input class="form-control" type="text" placeholder="<?php $namely = $_SESSION['user_id']; echo($namely);?>" readonly>
                        <br>
                        <label>NAME</label>
                        <input class="form-control" type="text" placeholder="<?php $namely = $_SESSION['name']; echo($namely);?>" readonly>
                        <br>
                        <?php
                        $hsh = mysqli_connect('localhost', 'root', '', 'portal');
                            $comp = "SELECT supervisor_id,stud_report, comp_grade,fac_report,s_type,s_size,f_type,f_size,pass FROM phd_comp WHERE stud_id = $u_id";
                            
                            $store = mysqli_query($hsh, $comp);
                            $s_row = mysqli_fetch_array($store);
                            
                            
                            
                            
                            $crow;
                        ?>
                        <label>FACULTY SUPERVISOR ID</label>
                        <input class="form-control" type="text" placeholder="<?php if($s_row[0]=="0")echo("NO FACULTY ALLOTED"); else{echo($s_row[0]);}?>" readonly>
                        <br>
                        
                        <?php
                        
                        if($s_row[0]==0){
                            $crow = "NO FACULTY ALLOTED";
                        }
                        else{
                            $comp = "SELECT name FROM faculty WHERE faculty_id = $s_row[0]";
                            $store = mysqli_query($hsh, $comp);
                            $f_row = mysqli_fetch_array($store);
                            if(!$f_row){
                            $crow = "FACULTY NOT REGISTERED";
                        }
                        else{
                            
                            $crow = $f_row[0];
                            
                        }
                        }
                        
                        
                        ?>
                        <label>FACULTY SUPERVISOR'S NAME</label>
                        <input class="form-control" type="text" placeholder="<?php echo($crow);?>" readonly>
                        <br>
                        
                        <label>GRADE</label>
                        <input class="form-control" type="text" placeholder="<?php if($s_row[2]=="-1") {echo("NA");} else {echo($s_row[2]);}?>" readonly>
                        <br>
                        <label>STUDENT REPORT</label>
                        <?php
                            if($s_row[1]=="NA"){
                                ?>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button type="submit" name="btn-upload">upload</button>
                            </form>
                        <?php
                            if(isset($_GET['success']))
                        {
                         ?>
                        <label>File Uploaded Successfully.<a href="view.php">click here to view file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                         ?>
                               <label>Problem While File Uploading !</label>
                               <?php
                        }
                        else if(isset($_GET['exists'])){
                            ?>
                               <label>Filename exists. Upload new file.</label>
                               <?php
                        }
                        else
                        {
                         ?>
                               <label>The File should be in PDF format with filename as "Student-ID_Faculty_ID_phd_comp"</label>
                               <?php
                        }
                        ?>
                        <?php
                            }
                            else{
                                ?>
                               
                               <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button type="submit" name="btn-upload">upload</button>
                            </form>
                        <?php
                            if(isset($_GET['success']))
                        {
                         ?>
                        <label>File Uploaded Successfully.<a href="view.php">click here to view file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                         ?>
                        <label>Problem While File Uploading !<a href="view.php">View Previous file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['exists'])){
                            ?>
                        <label>Filename exists. Upload new file.<a href="view.php">View Previous File.</a></label>
                               <?php
                        }
                        else
                        {
                         ?>
                            <label><a href="view.php">Click here to view uploaded File. You can upload a new file.</a></label>
                               <?php
                        }
                        ?>
                                <?php
                            }
                        ?>
                        
                        
                        <br>
                        <label>COMMITTEE REPORT</label>
                        <?php
                        if($s_row[3]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../faculty uploads/");
                            echo($s_row[3]);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
                        ?>
                        
                        <br>
                        <label>PASS/FAIL</label>
                        <input class="form-control" type="text" placeholder="<?php echo($s_row[8]);;?>" readonly>
                        
                    </div>
                </div>
            </div>
        

    </div>
    <!-- /.container -->

    <footer style="margin-bottom: 50px;margin-top: 40px; display: block;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; DA-IICT</p>
                </div>
                
                
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
