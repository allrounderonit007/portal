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
    
    //echo($_SESSION['password']);
    //$user=Users::find_by_id($_SESSION['u_id']);
    
    $u = $_SESSION['user_id'];
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
                        <a href="rps.php">RPS</a>
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

    <?php
    $sem = $_POST['editsem'];
    
    $din = mysqli_connect('localhost', 'root', '', 'portal');
    $q = "SELECT supervisor, super_name f_report, comm1, comm2, comm3, comm4, course1, course2, course3, course4, grade FROM rps WHERE s_rps_id=$u AND rps_semester=$sem";
    $ex = mysqli_query($din, $q);
    
    $l = mysqli_fetch_array($ex);
    
    $q = "SELECT name FROM student WHERE s_id = $u";
    $ex = mysqli_query($din, $q);
    $nam = mysqli_fetch_array($ex);
    ?>
    <div class="container">
        <div class="box">
                       
            <label>Student Name</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($nam[0]);?>" readonly>
            <label>Student ID</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($u);?>" readonly>
            <label>Supervisor ID</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[0]);?>" readonly>
            <label>Supervisor Name</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[1]);?>" readonly>
            <label>Committee Member 1</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[2]);?>" readonly>
            <label>Committee Member 2</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[3]);?>" readonly>
            <label>Committee Member 3</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[4]);?>" readonly>
            <label>Committee Member 4</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[5]);?>" readonly>
            
            <form post="coursechange.php" method="post">
            <label>Select Course 1</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[6]);?>" readonly>
            <?php 
            $q = "SELECT course_id, course_name FROM course";
            $ex = mysqli_query($din, $q);
            //$nam = mysqli_fetch_array($result);
            $arid = Array();
            $arname = Array();
            while ($nam = mysqli_fetch_array($ex)){
                $arid[] = $nam['course_id'];
                $arname[] = $nam['course_name'];
            }
            
            $s = count($arid);
            
            
            ?>
            <select class="form-control" name="c1">
                <?php
                            
                for($x2=0;$x2<$s;$x2++){
                ?>
                <option value="<?php echo($arid[$x2]);?>"> <?php echo($arname[$x2]);?>  <?php echo($arid[$x2]);?> </option>
                <?php
                }
                        
                ?>
            </select>
            <label>Select Course 2</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[7]);?>" readonly>
            <select class="form-control" name="c2">
                <?php
                            
                for($x2=0;$x2<$s;$x2++){
                ?>
                <option value="<?php echo($arid[$x2]);?>"> <?php echo($arname[$x2]);?>  <?php echo($arid[$x2]);?> </option>
                <?php
                }
                        
                ?>
            </select>
            <label>Select Course 3</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[8]);?>" readonly>
            <select class="form-control" name="c3">
                <?php
                            
                for($x2=0;$x2<$s;$x2++){
                ?>
                <option value="<?php echo($arid[$x2]);?>"> <?php echo($arname[$x2]);?>  <?php echo($arid[$x2]);?> </option>
                <?php
                }
                        
                ?>
            </select>
            <label>Select Course 4</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[9]);?>" readonly>
            <select class="form-control" name="c4">
                <?php
                            
                for($x2=0;$x2<$s;$x2++){
                ?>
                <option value="<?php echo($arid[$x2]);?>"> <?php echo($arname[$x2]);?>  <?php echo($arid[$x2]);?> </option>
                <?php
                }
                        
                ?>
            </select>
            </form>
            <label>Grade</label><br>
            <input class="form-control" type="text" placeholder="<?php echo($l[10]);?>" readonly>
            
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


