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
        $non = mysqli_connect('localhost', 'root', '', 'portal');
        $swap = "SELECT status FROM student WHERE s_id=$u";
        $list = mysqli_query($non, $swap);
        $amt = mysqli_fetch_array($list);
        
        if($amt[0]==0||$amt==1){
            
            ?>
    <div class="container">
        <div class="box">
            <p><strong>You need to first complete PhD Comprehensive.</strong></p>
    </div>
    </div>
        <?php
        }
    else
    {
    ?>

    <div class="container">
        <div class="box">
            
            <form name="semlist" action="editsem.php" method="post">
                
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption><strong>Choose a Semester</strong></caption>
                    <tbody>
                        <tr>
                    
                            <td><strong>RPS Semester</strong></td>
                            <td><strong>Action</strong></td>
                    
                        </tr
                        <?php
                        $non = mysqli_connect('localhost', 'root', '', 'portal');
                        $swap = "SELECT rps_semester FROM rps WHERE s_rps_id=$u ORDER BY rps_semester";
                        $list = mysqli_query($non, $swap);
                        //$arr = mysqli_fetch_array($list);
                        
                        $storeArray4 = Array();
                        
                        while($arr = mysqli_fetch_array($list)){
                            $storeArray4[]= $arr['rps_semester'];
                        }
                        $len = count($storeArray4);
                        for($k =0;$k<$len;$k++){
                            ?>
                        <tr>
                            <td><?php echo($storeArray4[$k]); ?></td>
                            <td>
                                <button type="submit" name= "editsem" id ="editsem" value="<?php echo($storeArray4[$k]) ?>" placeholder="Edit" >Edit</button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            
            <?php
    }
    ?>
            <!--<label>Student Name</label><br>
            <label>Student ID</label><br>
            <label>Supervisor ID</label><br>
            <label>Supervisor Name</label><br>
            <label>Committee Member 1</label><br>
            <label>Committee Member 2</label><br>
            <label>Committee Member 3</label><br>
            <label>Committee Member 4</label><br>
            <label>Select Course 1</label><br>
            <label>Select Course 2</label><br>
            <label>Select Course 3</label><br>
            <label>Select Course 4</label><br>
            <label>Grade</label><br>-->
            
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
