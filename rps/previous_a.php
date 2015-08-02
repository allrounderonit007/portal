<!DOCTYPE html>
<html lang="en">
    
    <?php
       require_once('../includes/initialize.php');
       include_once('../includes/config.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }
    
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
                <a class="navbar-brand" href="../homepage/homepage_a.php">USPMES - PhD</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../homepage/homepage_a.php">Home</a>
                    </li>
                    <li>
                        <a href="../comprehensive/Cmpr_a.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="rps_a.php">RPS</a>
                    </li>
                    <li>
                        <a href="../phd_synopsis/synopsis_a.php">PhD Synopsis</a>
                    </li>
                    <li>
                        <a href="../guidelines/Guidelines_a.php">Guidelines</a>
                    </li>
                    <li>
                        <a href="../Schedule/Schedule_a.php">Schedule</a>
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
                                
                                <a href="../admin_module/admin_panel.php">
                                    <i class="entypo-lock"></i>
                                    Admin Panel
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

    <?php
    
    if(isset($_POST['rad-sub'])){
        if(isset($_POST['sid'])){
            
            $stud = $_POST['sid'];
            //echo($stud);
            $damp = connection();
            $swamp = "SELECT stud_name, grade1, grade2, grade3, grade4, grade5, stud_report, f_report, supervisor, rps_semester  FROM rps WHERE s_rps_id=$stud";
            $check = mysqli_query($damp, $swamp);
            
            $a1 = Array();
            $a2 = Array();
            $a3 = Array();
            $a4 = Array();
            $a5 = Array();
            $a6 = Array();
            $a7 = Array();
            $a8 = Array();
            $a9 = Array();
            $a10 = Array();//supervisor
            
            while($face = mysqli_fetch_array($check)){
                $a1[] = $face['stud_name'];
                $a2[] = $face['grade1'];
                $a3[] = $face['grade2'];
                $a4[] = $face['grade3'];
                $a5[] = $face['grade4'];
                $a6[] = $face['grade5'];
                $a7[] = $face['stud_report'];
                $a8[] = $face['f_report'];
                $a9[] = $face['supervisor'];
                $a10[] = $face['rps_semester'];
            }
            $sizeable = count($a1);
            
            for($r =0;$r<$sizeable;$r++){
                ?>
    <div class="container">
        <div class="box">
            <label>Student Id</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($stud) ?>" readonly>
            <br>
            <label>Student Name</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a1[$r]) ?>" readonly>
            <br>
            <label>Grade - Course1</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a2[$r]) ?>" readonly>
            <br>
            <label>Grade - Course2</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a3[$r]) ?>" readonly>
            <br>
            <label>Grade - Course3</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a4[$r]) ?>" readonly>
            <br>
            <label>Grade - Course4</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a5[$r]) ?>" readonly>
            <br>
            <label>Grade - Course5</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a6[$r]) ?>" readonly>
            <br>
            <label>RPS Semester</label><br>
            <input type="text" class="form-control" placeholder="<?php echo($a10[$r])?>" readonly>
                   <br>
            <label>Student Report</label>
            <?php
                        if($a7[$r]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../rps_uploads/student/$stud/");
                            //echo($a7[$r]);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
            ?>
            <br>
            <label>Faculty Report</label>
            <?php
                        if($a8[$r]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../rps_uploads/faculty/$stud/");
                            echo($a8[$r]);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
            ?>

        </div>
    </div>
    <?php
            }
        }
        else{
            header("location: rps_a.php");
        }
    }
    
    ?>
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
