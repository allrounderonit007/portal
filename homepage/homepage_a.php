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

    <div class="brand" style="color: black; font-family: Josefin Slab ">Phd Portal</div>
    <div class="address-bar" style="color: black; font-family: Josephin Slab">Dhirubhai Ambani Institute of Information and Communication Technology</div>
    
    
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
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
                <a class="navbar-brand" href="homepage_a.php">USPMES - PhD</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="row collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="homepage_a.php">Home</a>
                    </li>
                    <li>
                        <a href="../comprehensive/Cmpr_a.php">PhD Comprehensive</a>
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
                    
                    <!--<li>
                        <a href="includes/logout.php">Log Out </a> <i class="entypo-logout right"></i>
                    </li>-->
                    
                    
                    
                
                
                
                    
                <!--<ul class="nav navbar-nav navbar-right">-->
                    <li class="profile-info dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            echo $_SESSION['user_id'];
                            ?>
                        </a>
                        
                        <ul class="dropdown-menu">
                            
                            <li>
                                
                                <a href="profile/editprofile.php">
                                    <i class="entypo-lock"></i>
                                    Edit Password
                                </a>
                            </li>
                            
                            <li>
                                <a href="../includes/logout.php">Log Out </a> <i class="entypo-logout right"></i>
                            </li>
                        </ul>
                    </li>
                <!--</ul>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            
        </div>
        
        <!-- /.container -->
    </nav>
    
    
    <!--<div class="container">
        <div class="row">
            <div class="box">
                <div style="height: 40px; width: 100%">
                    
                </div>
                
            </div>
        </div>
    </div>-->
    
    
    <div class="container">
        <div class="row">
            <div class="box">
                <p><strong>List of Current Students</strong></p>
                <?php 
                    $connect = connection();
                    $write = "SELECT s_id, name, supervisor FROM student WHERE status =0";
                    $list1 = mysqli_query($connect, $write);
                    
                    $first = Array();
                    $second = Array();
                    $third = Array();
                    
                    while($val = mysqli_fetch_array($list1)){
                        $first[] = $val['s_id'];
                        $second[] = $val['name'];
                        $third[] = $val['supervisor'];
                    }
                    
                    $s1 = count($first);
                    //echo($s1);
                ?>
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption><strong>Students not registered</strong></caption>
                    <tbody>
                        <tr>
                            <td><strong>Student Id</strong></td>
                            <td><strong>Student name</strong></td>
                            <td><strong>Supervisor</strong></td>
                        </tr>
                <?php
                for($j=0;$j<$s1;$j++){
                    ?>
                        <tr>
                            <td><?php echo($first[$j]); ?></td>
                            <td><?php echo($second[$j]); ?></td>
                            <td><?php echo($third[$j]); ?></td>
                        </tr>
                    <?php
                }
                ?>
                        </tbody>
                        </table>
                
                <!-- Student in PhD Comprehensive-->
                        <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                                
                        <?php
                            $write2 = "SELECT s_id, name, supervisor FROM student WHERE status =1";
                            $list2 = mysqli_query($connect, $write2);
                            
                            $first1 = Array();
                            $second1 = Array();
                            $third1 = Array();

                            while($val1 = mysqli_fetch_array($list2)){
                                $first1[] = $val1['s_id'];
                                $second1[] = $val1['name'];
                                $third1[] = $val1['supervisor'];
                            }

                            $s2 = count($first1);
                            //echo($s2);
                        ?>
                            <caption><strong>Students in Phd Comprehensive</strong></caption>
                        <tbody>
                            <tbody>
                        <tr>
                            <td><strong>Student Id</strong></td>
                            <td><strong>Student name</strong></td>
                            <td><strong>Supervisor</strong></td>
                        </tr>
                <?php
                for($j=0;$j<$s2;$j++){
                    ?>
                        <tr>
                            <td><?php echo($first1[$j]); ?></td>
                            <td><?php echo($second1[$j]); ?></td>
                            <td><?php echo($third1[$j]); ?></td>
                        </tr>
                    <?php
                }
                ?>
                        </tbody>
                </table>
                <!-- Students in RPS SEMESTER-->
                
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                                
                        <?php
                            $write3 = "SELECT s_id, name, supervisor FROM student WHERE status =2";
                            $list3 = mysqli_query($connect, $write3);
                            
                            $first2 = Array();
                            $second2 = Array();
                            $third2 = Array();

                            while($val2 = mysqli_fetch_array($list3)){
                                $first2[] = $val2['s_id'];
                                $second2[] = $val2['name'];
                                $third2[] = $val2['supervisor'];
                            }

                            $s3 = count($first2);
                            //echo($s3);
                        ?>
                        <caption><strong>Students in RPS</strong></caption>
                        <tbody>
                            <tbody>
                        <tr>
                            <td><strong>Student Id</strong></td>
                            <td><strong>Student name</strong></td>
                            <td><strong>Supervisor</strong></td>
                        </tr>
                <?php
                for($j=0;$j<$s3;$j++){
                    ?>
                        <tr>
                            <td><?php echo($first2[$j]); ?></td>
                            <td><?php echo($second2[$j]); ?></td>
                            <td><?php echo($third2[$j]); ?></td>
                        </tr>
                    <?php
                }
                ?>
                        </tbody>
                </table>
                
                <!--Students in PhD Synopsis-->
                
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                                
                        <?php
                            $write4 = "SELECT s_id, name, supervisor FROM student WHERE status =3";
                            $list4 = mysqli_query($connect, $write4);
                            
                            $first3 = Array();
                            $second3 = Array();
                            $third3 = Array();

                            while($val3 = mysqli_fetch_array($list4)){
                                $first3[] = $val3['s_id'];
                                $second3[] = $val3['name'];
                                $third3[] = $val3['supervisor'];
                            }

                            $s4 = count($first3);
                        ?>
                    <caption><strong>Students in PhD Synopsis</strong></caption>
                        <tbody>
                            <tbody>
                        <tr>
                            <td><strong>Student Id</strong></td>
                            <td><strong>Student name</strong></td>
                            <td><strong>Supervisor</strong></td>
                        </tr>
                <?php
                for($j=0;$j<$s4;$j++){
                    ?>
                        <tr>
                            <td><?php echo($first3[$j]); ?></td>
                            <td><?php echo($second3[$j]); ?></td>
                            <td><?php echo($third3[$j]); ?></td>
                        </tr>
                    <?php
                }
                ?>
                        </tbody>
                </table>
                
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    </script>

</body>

</html>
