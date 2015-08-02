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
                <a class="navbar-brand" href="../homepage/homepage_f.php">USPMES - PhD</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../homepage/homepage_f.php">Home</a>
                    </li>
                    <li>
                        <a href="../comprehensive/cmpr_f.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="rps_f.php">RPS</a>
                    </li>
                    <li>
                        <a href="../phd_synopsis/synopsis_f.php">PhD Synopsis</a>
                    </li>
                    <li>
                        <a href="../guidelines/Guidelines_f.php">Guidelines</a>
                    </li>
                    <li>
                        <a href="../Schedule/Schedule_f.php">Schedule</a>
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
    
    if(isset($_POST['edit_sup2'])){
        
        if(isset($_POST['sup2'])){
            
            $semester1 = $_POST['sup2'];
            
            $tan = connection();
            $student2 = $_SESSION['student'];
            $_SESSION['sem1'] = $semester1;
            $cut = "SELECT stud_name, super_name, f_report, comm1, comm2, comm3, comm4, course1, course2, course3, course4, grade1, stud_report, grade2, grade3, grade4,grade5, course5 FROM rps WHERE rps_semester =$semester1 AND s_rps_id=$student2 AND (comm1=$u_id OR comm2 =$u_id OR comm3=$u_id OR comm4=$u_id)";
            
            
            $take = mysqli_query($tan, $cut);
            
            $amp = mysqli_fetch_array($take);
     
            ?>
    
    <div class="container">
        <div class="box">
            
            <label><strong>STUDENT NAME</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[0]); ?>" readonly>
            <br>
            <label><strong>STUDENT ID</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($student1) ?>"readonly>
            <br>
            <label><strong>SUPERVISOR ID</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($u_id); ?>" readonly>
            <br>
            <label><strong>SUPERVISOR NAME</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[1]); ?>" readonly>
            <br>
            <label><strong>COMMITTEE MEMBER 1</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[3]) ?>" readonly>
            <br>
            <label><strong>COMMITTEE MEMBER 2</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[4]) ?>" readonly>
            <br>
            <label><strong>COMMITTEE MEMBER 3</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[5]) ?>" readonly>
            <br>
            <label><strong>COMMITTEE MEMBER 4</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[6]) ?>" readonly>
            <br>
            <label><strong>COURSE 1</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[7]) ?>" readonly>
            <br>
            <label><strong>GRADE1</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[11]); ?>" readonly>
            <br>
            <label><strong>COURSE 2</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[7]) ?>"readonly>
            <br>
            <label><strong>GRADE2</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[13]); ?>" readonly>
            <br>
            <label><strong>COURSE 3</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[8]) ?>" readonly>
            <br>
            <label><strong>GRADE3</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[14]); ?>" readonly>
            <br>
            
            
            <label><strong>GRADE4</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[15]); ?>" readonly>
            <br>
            <label><strong>COURSE 5</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[17]) ?>" readonly>
            <br>
            <label><strong>GRADE5</strong></label>
            <input type="text" class="form-control" placeholder="<?php echo($amp[16]); ?>" readonly>
            <br>
            <br>
            <label>View Faculty Report</label>
            <?php
                
                echo("<a href=\"../rps_uploads/faculty/$student2/\""); 
                echo ($amp[2]);
                echo("\"target=\"_blank\">View file</a>");
                ?>
            <br>
            <label>View Student Report</label>
            <?php
                
                echo("<a href=\"../rps_uploads/student/$student2/\""); 
                echo ($amp[12]);
                echo("\"target=\"_blank\">View file</a>");
                ?>
            <br>
        </div>
    </div>

    <?php
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

