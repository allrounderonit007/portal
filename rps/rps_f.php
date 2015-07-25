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
    
    
    <div class="container">
        <div class="box">
            
            <?php
            $link = mysqli_connect('localhost', 'root', '', 'portal');
            $query1 = "SELECT s_rps_id, stud_name, rps_semester FROM rps WHERE supervisor=$u_id";
            $res = mysqli_query($link, $query1);
            
            $s_rps_id = Array();
            $name_s = Array();
            $rps = Array();
            
            
            while($fet = mysqli_fetch_array($res)){
                
                $s_rps_id[] = $fet['s_rps_id'];
                $name_s[] = $fet['stud_name'];
                $rps_semester[] = $fet['rps_semester'];
            }
            
            $sizear = count($s_rps_id);
            
            if($sizear==0){
                ?>
            <label>Supervisor for no student</label>
            <?php
            }
            else{
            ?>
            <form method="post" action="super.php">
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption>Supervisor for students</caption>
                    <tbody>
                        <tr>
                            <td><strong>Student ID</strong></td>
                            <td><strong>Student Name</strong></td>
                            <td><strong>RPS SEMESTER NUMBER</strong></td>
                            
                        </tr>
                        <?php
                        for($y=0;$y<$sizear;$y++){
                            ?>
                        <tr>
                            <td><input type="radio" name="super_id" value="<?php echo($s_rps_id[$y]); ?>"> <?php echo($s_rps_id[$y]); ?></td>
                            <td><?php echo($name_s[$y]); ?></td>
                            <td><?php echo($rps_semester[$y]); ?></td>
                        </tr>
                        
                        <?php
                        }
                        ?>
                        <tr>
                            <td><input type="submit" name="super-id" value="Submit"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        <?php
            }
                        ?>
                        
                    </tbody>
                </table>
            </form>
            <!-- AS A PART OF COMMITTEE -->
            <?php
            $query1 ="SELECT s_rps_id, stud_name, rps_semester FROM rps WHERE comm1 =$u_id OR comm2 = $u_id OR comm3 = $u_id OR comm4 = $u_id";
            $res1 = mysqli_query($link, $query1);
            
            $idarr = Array();
            $namarr = Array();
            $rpssem = Array();
            
            
                
                while($fet1 = mysqli_fetch_array($res1)){
                    
                    $idarr[] = $fet1['s_rps_id'];
                    $namarr[] = $fet1['stud_name'];
                    $rpssem[] = $fet1['rps_semester'];
                }
                
                $sizea = count($idarr);
                
                if($sizea==0){
                    ?>
            <label>Not a part of any committee.</label>
            <?php
                }
                else{
                ?>
            <form method="post" action="super2.php">
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption>As a committee member for students</caption>
                    <tbody>
                        <tr>
                            <td><strong>Student ID</strong></td>
                            <td><strong>Student Name</strong></td>
                            <td><strong>RPS SEMESTER NUMBER</strong></td>
                            
                        </tr>
                        <?php
                        for($y=0;$y<$sizea;$y++){
                            ?>
                        <tr>
                            <td><input type="radio" name="comm_id" value="<?php echo($idarr[$y]); ?>"></td>
                            <td><?php echo($namarr[$y]); ?></td>
                            <td><?php echo($rpssem[$y]); ?></td>
                        </tr>
                        
                        <?php
                        }
            
                        ?>
                        <tr>
                            <td><input type="submit" name="comm-id" value="Submit"> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        
                }
                ?>
                    </tbody>
                </table>
            </form>
            
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
