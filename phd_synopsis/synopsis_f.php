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
                        <a href="../comprehensive/Cmpr_f.php">PhD Comprehensive</a>
                    </li>
                    <li>
                        <a href="../rps/rps_f.php">RPS</a>
                    </li>
                    <li>
                        <a href="synopsis_f.php">PhD Synopsis</a>
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
            $link1 = connection();
            $baat = "SELECT syn_std_id, syn_stud_name, attempt FROM synopsis s WHERE syn_convenor_id=$u_id AND attempt = (SELECT MAX(attempt) FROM synopsis s1 WHERE s.syn_std_id = s1.syn_std_id) AND syn_std_id=(SELECT s_id FROM student WHERE s_id = syn_std_id AND status=3)";
            $res = mysqli_query($link1, $baat);
            
            $syn_id = Array();
            $names = Array();
            $att = Array();
            
            
            
            while($fetched = mysqli_fetch_array($res)){
                
                $syn_id[] = $fetched['syn_std_id'];
                $names[] = $fetched['syn_stud_name'];
                $att[] = $fetched['attempt'];
            }
            
            $length = count($syn_id);
            
            if($length==0){
                ?>
            <label>Convener for no student</label>
            <?php
            }
            else{
            ?>
            <form method="post" action="convener.php">
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption>Convener for students</caption>
                    <tbody>
                        <tr>
                            <td><strong>Student ID</strong></td>
                            <td><strong>Student Name</strong></td>
                            <td><strong>Attempt</strong></td>
                            
                            
                        </tr>
                        <?php
                        for($y=0;$y<$length;$y++){
                            ?>
                        <tr>
                            <td><input type="radio" name="con_id" value="<?php echo($syn_id[$y]); ?>"> <?php echo($syn_id[$y]); ?></td>
                            <td><?php echo($names[$y]); ?></td>
                            <td><?php echo($att[$y]);?></td>
                            
                        </tr>
                        
                        <?php
                        }
                        ?>
                        <tr>
                            <td><input type="submit" name="con-id" value="Submit"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        <?php
            }
                        ?>
                        
                    </tbody>
                </table>
            </form>
            <br>
            <!-- AS A PART OF COMMITTEE -->
            <?php
            $baat ="SELECT syn_std_id, syn_stud_name, attempt FROM synopsis s WHERE (comm_1 =$u_id OR comm_2 = $u_id OR comm_3 = $u_id OR comm_4 = $u_id) AND attempt = (SELECT MAX(attempt) FROM synopsis s1 WHERE s.syn_std_id = s1.syn_std_id) AND syn_std_id=(SELECT s_id FROM student WHERE s_id = syn_std_id AND status=3)";
            $res1 = mysqli_query($link1, $baat);
           
            
            $syn_id1 = Array();
            $names1 = Array();
            
            $att1 = Array();
            
                
                while($fet2 = mysqli_fetch_array($res1)){
                    
                    $syn_id1[] = $fet2['syn_std_id'];
                    $names1[] = $fet2['syn_stud_name'];
                    $arr1[] = $fet2['attempt'];
                }
                
                    $length1 = count($syn_id1);
                
                if($length1==0){
                    ?>
            <label>Not a part of any committee.</label>
            <?php
                }
                else{
                ?>
            <form method="post" action="committee.php">
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption>As a committee member for students</caption>
                    <tbody>
                        <tr>
                            <td><strong>Student ID</strong></td>
                            <td><strong>Student Name</strong></td>
                            
                            
                        </tr>
                        <?php
                        for($y=0;$y<$length1;$y++){
                            ?>
                        <tr>
                            <td><input type="radio" name="comm_id" value="<?php echo($syn_id1[$y]); ?>"></td>
                            <td><?php echo($names1[$y]); ?></td>
                            
                        </tr>
                        
                        <?php
                        }
            
                        ?>
                        <tr>
                            <td><input type="submit" name="comm-id" value="Submit"> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                    </tbody>
                </table>
            </form>
            
            <?php
                        
                }
                ?>
            <!-- Previous Synopsis Semesters  -->
            <?php
            $baat1 ="SELECT syn_std_id, syn_stud_name, attempt FROM synopsis s WHERE (comm_1 =$u_id OR comm_2 = $u_id OR comm_3 = $u_id OR comm_4 = $u_id OR syn_convenor_id=$u_id) AND attempt = (SELECT MAX(attempt) FROM synopsis s1 WHERE s.syn_std_id = s1.syn_std_id) AND syn_std_id=(SELECT s_id FROM student WHERE s_id = syn_std_id AND (status=3 OR status=5))";
            $res2 = mysqli_query($link1, $baat1);
           
            
            $syn_id2 = Array();
            $names2 = Array();
            
            $att2 = Array();
            
                
                while($fet3 = mysqli_fetch_array($res2)){
                    
                    $syn_id2[] = $fet3['syn_std_id'];
                    $names2[] = $fet3['syn_stud_name'];
                    $arr2[] = $fet3['attempt'];
                }
                
                    $length2 = count($syn_id2);
            
            if($length2==0){
                    ?>
            <br>
            <label>No Previous Semesters</label>
            <?php
                }
                else{
                ?>
            <form method="post" action="prev.php">
                <table align="center" border="1" cellspacing="1" width="30%" style="text-align: center">
                    <caption>Previous Students</caption>
                    <tbody>
                        <tr>
                            <td><strong>Student ID</strong></td>
                            <td><strong>Student Name</strong></td>
                            
                            
                        </tr>
                        <?php
                        for($y=0;$y<$length2;$y++){
                            ?>
                        <tr>
                            <td><input type="radio" name="prev_id" value="<?php echo($syn_id2[$y]); ?>"></td>
                            <td><?php echo($names2[$y]); ?></td>
                            
                        </tr>
                        
                        <?php
                        }
            
                        ?>
                        <tr>
                            <td><input type="submit" name="prev-id" value="Submit"> </td>
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
