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
    $u_id = $_SESSION['user_id']
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
                        <a href="Cmpr_a.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="../rps/rps_a.php">RPS</a>
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
                               
                $sid = $_POST['sid'];
                               
                                //echo($sid);
                                
                $_SESSION['macho'] = $sid;
                                //echo($sid);
                $damn = "SELECT stud_name, fac_report,pass, attempt, convenor_id FROM phd_comp p WHERE stud_id = $sid";
                            
                $chalo = connection();
                $que = mysqli_query($chalo, $damn);
                
                $create = Array();
                $create1 = Array();
                $create2 = Array();
                $create3 = Array();
                $create4 = Array();
                
                while($ar = mysqli_fetch_array($que)){
                    $create[] = $ar['stud_name'];
                    $create1[] = $ar['fac_report'];
                    $create2[] = $ar['pass'];
                    $create3[] = $ar['attempt'];
                    $create4[] = $ar['convenor_id'];
                }
                $c = count($create);
            
            if($c==0){
                ?>
    <div class="container">
        <div class="box">
            <label>No previous PhD Comprehensive Semester</label>
        </div>
    </div>
            
            <?php
            
            }
            else{
                
            for($r=0;$r<$c;$r++){
                ?>
    <div class="container">
        <div class="box">
            <label>Student ID</label><br>
            <input type="text" placeholder="<?php echo($sid);  ?>" readonly>
            <br>
            <label>Student Name</label><br>
            <input type="text" placeholder="<?php echo($create[$r]); ?>" readonly>
            <br>
            <label>Grade</label><br>
            <input type="text" placeholder="<?php echo($create2[$r]); ?>" readonly>
            <br>
            <label>Attempt</label><br>
            <input type="text" placeholder="<?php echo($create3[$r]+1); ?>" readonly>
            <br>
            <label>Faculty Report</label><br>
            <?php
                        if($create1[$r]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../comp_uploads/faculty/$create[$r]/");
                            echo($create1[$r]);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
                        ?>
            </div></div>
        
            
            <?php
            }
            
            }
            }
                        else{
                            ?>
    <div class="container">
        <div class="box">
                        <label>Go back and click</label>
        </div>
    </div>
    <?php
            }
            }
        
        ?>
    
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
