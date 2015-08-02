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


        <div class="container">

            <div class="box">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>List of Current students</label>
                        <br>
                        <?php
                        
                        $tamp = connection();
                        
                        $query = "SELECT p.stud_id,p.stud_name, convener_name, attempt FROM phd_comp p, student s WHERE p.stud_id=s.s_id AND status=1 AND attempt=(SELECT MAX(attempt)FROM phd_comp p1 WHERE p.stud_id=p1.stud_id) GROUP BY stud_id";
                        $solution = mysqli_query($tamp, $query);
                        //$array = mysqli_fetch_array($solution);
                        //echo($array[1]);
                        $storeArray = Array();
                        $starr = Array();
                        $starr2 = Array();
                        $starr3 = Array();
                        while($array = mysqli_fetch_assoc($solution)){
                            $storeArray[]= $array['stud_id'];
                            $starr[] = $array['convener_name'];
                            $starr2[] = $array['stud_name'];
                            $starr3[] = $array['attempt'];
                        }
                        
                        
                        $size = count($storeArray);
                        //echo($size);
                        
                        if($size==0){
                            ?> 
                        
                        <label>No student currently</label>
                        <?php
                        }
                        else{
                            
                            ?>
                        <form method="post" action="select_a.php" role="form">
                            <table border="1" cellspacing="1" width="30%" style="text-align: center">
                                <tbody>
                                    <tr>
                                        <td><strong>Student Id</strong></td>
                                        <td><strong>Student Name</strong></td>
                                        <td><strong>Convener Name</strong></td>
                                        <td><strong>Attempt</strong></td>
                                    </tr>
                            <?php
                            
                            
                            
                            //$x = 0;
                            //$size = count($storeArray);
                            //echo($size);
                            //echo($array[0]);
                            //echo($array[1]);
                            for($x=0;$x<$size;$x++){
                                ?>
                                    <tr>
                            <td><input type="radio" name="sid" value="<?php echo($storeArray[$x]);?>"><?php echo($storeArray[$x]); ?>
                            </td>
                            <td><?php echo($starr2[$x]); ?></td>
                            <td><?php echo($starr[$x]); ?></td>
                            <td><?php echo($starr3[$x]+1); ?></td>
                                    </tr>
                            <?php
                                
                                
                            
                            }
                        }
                        ?>
                                    <tr>
                                        <td><input type="submit" name="rad-sub" value="Submit"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                            </tr>
                            </tbody>
                            </table>
                        </form>
                        <!-- List of previous students -->
                        <?php
                        $query = "SELECT p.stud_id,p.stud_name, convener_name, MAX(attempt) FROM phd_comp p, student s WHERE p.stud_id=s.s_id AND status>1 GROUP BY stud_id";
                        $solution = mysqli_query($tamp, $query);
                        //$array = mysqli_fetch_array($solution);
                        //echo($array[1]);
                        $storeArray1 = Array();
                        $starr1 = Array();
                        $starr21 = Array();
                        $starr31 = Array();
                        while($array = mysqli_fetch_assoc($solution)){
                            $storeArray1[]= $array['stud_id'];
                            $starr1[] = $array['convener_name'];
                            $starr21[] = $array['stud_name'];
                            $starr31[] = $array['MAX(attempt)'];
                        }
                        
                        
                        $size = count($storeArray1);
                        if($size==0){
                            ?>
                        <label>No previous students</label>
                        <?php
                        }
                        else{
                        ?>
                        <form method="post" action="archives_a.php">
                            <table border="1" cellspacing="1" width="30%" style="text-align: center">
                                <caption><strong>List of previous students</strong></caption>
                                <tbody>
                                    <tr>
                                        <td><strong>Student Id</strong></td>
                                        <td><strong>Student Name</strong></td>
                                        <td><strong>Convener Name</strong></td>
                                        <td><strong>Attempt</strong></td>
                                    </tr>
                                    <?php
                                    
                                    for($y=0;$y<$size;$y++){
                                        ?>
                                    <tr>
                                    <td><input type="radio" name="sid" value="<?php echo($storeArray1[$y]);?>"><?php echo($storeArray1[$y]); ?>
                                    </td>
                                    <td><?php echo($starr21[$y]); ?></td>
                                    <td><?php echo($starr1[$y]); ?></td>
                                    <td><?php echo($starr31[$y]+1); ?></td>
                                    </tr>
                                    <?php
                                    }
                                    
                                    ?>
                                    <tr>
                                        <td><input type="submit" name="rad-sub" value="Submit"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                            
                        </form>
                         <?php
                        }
                         ?>
                    </div>
                </div>
            </div>
        

    </div>
    
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
