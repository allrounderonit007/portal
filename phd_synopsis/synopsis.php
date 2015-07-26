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
    
    $u_id=$_SESSION['user_id'];
    
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
                        <a href="../comprehensive/cmpr.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="../rps/rps.php">RPS</a>
                    </li>
                    <li>
                        <a href="synopsis.php">PhD Synopsis</a>
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
<?php
$main = $_SESSION['user_id'];

$g = connection();
$f="SELECT status FROM student WHERE s_id=$u_id";
$h=  mysqli_query($g, $f);
$i1=  mysqli_fetch_array($h);
//echo($i1[0]);
if($i1[0]<3){
    ?>
    <div class="container">
        <div class="box">
    
    <label><strong>Please complete RPS first.</strong></label>
    </div>
    </div>
        <?php
}
else{
$f = "SELECT syn_convenor_id, syn_stud_name, syn_con_name, comm1, comm2, comm3, comm4, grade, stud_report, fac_report FROM synopsis WHERE syn_std_id=$main";
$h = mysqli_query($g,$f);

$i = mysqli_fetch_array($h);

?>
    <div class="container">
        <div class="box">
        <div class="col-lg-12">
            <div class="form-group">
            <label>Student name</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[1]); ?>" readonly>
            <label>Student Id</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($main); ?>" readonly>
            <label>Committee Convener ID</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[0]); ?>" readonly>
            <label>Committee Convener Name</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[2]); ?>" readonly>
            <label>Committee Member 1</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[3]); ?>" readonly>
            <label>Committee Member 2</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[4]); ?>"readonly>
            <label>Committee Member 3</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[5]); ?>" readonly>
            <label>Committee Member 4</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[6]); ?>" readonly>
            
            <label>Faculty Report</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[9]); ?>" readonly>
            <label>Student Report</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[8]); ?>" readonly>
            
            
            <label>Grade</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($i[7]); ?>" readonly>
            </div>
        </div>
        </div>
    </div>
    <?php
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
