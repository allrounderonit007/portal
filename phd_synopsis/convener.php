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
                <div class="col-lg-12">
                    <div class="form-group">
                        
                        <?php
                        
                        if(isset($_POST['con-id'])){
                            
                            if(isset($_POST['con_id'])){
                                
                                $id = $_POST['con_id'];
                                
                                //echo($sid);
                                
                                $_SESSION['stud_id'] = $id;
                                
                                $damn = "SELECT syn_stud_name, syn_con_name, comm_1, comm_2, comm_3, comm_4, grade, stud_report, fac_report, MAX(attempt) FROM synopsis WHERE syn_std_id=$id AND syn_convenor_id = $u_id";
                            
                                $chalo = connection();
                                $queq = mysqli_query($chalo, $damn);
                                $aram = mysqli_fetch_array($queq);
                                
                            $_SESSION['stud_name'] = $aram[0];    
                            $_SESSION['attempt'] = $aram[9];
                        
                        ?>
                        
                        <label>Student name</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[0]); ?>" readonly>
                        <label>Student Id</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($id); ?>" readonly>
                        <label>Committee Convener ID</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($u_id); ?>" readonly>
                        <label>Committee Convener Name</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[1]); ?>" readonly>
                        <label>Committee Member 1</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[2]); ?>" readonly>
                        <label>Committee Member 2</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[3]); ?>"readonly>
                        <label>Committee Member 3</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[4]); ?>" readonly>
                        <label>Committee Member 4</label><br>
                        <input class="form-control" type="text" placeholder="<?php echo($aram[5]); ?>" readonly>
     
                        
                        <label>GRADE</label>
                        <form action="grade.php" method="post" role="form">
                            <input type="text" placeholder="<?php echo($aram[6]); ?>" readonly><br>
                            <select name="grade" id="grade">
                                <option value="sat">MINOR CHANGES</option>
                                <option value="un">MAJOR CHANGES</option>
                                <option value="in">INCOMPLETE</option>
                            </select>
                            <input type="submit" name="g-s" value="Submit Grade">
                        </form>
                        
                        <br>
                        <label>STUDENT REPORT</label>
                        
                        <?php
                        if($aram[7]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../synopsis/student/$id");
                            //echo($sid);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
                        ?>
                        
                        <br>
                        <label>COMMITTEE REPORT</label>
                        <?php
                            if($aram[8]=="NA"){
                                ?>
                            <form action="upload_f.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button type="submit" name="btn-upload">upload</button>
                            </form>
                        <?php
                            if(isset($_GET['success']))
                        {
                         ?>
                        <label>File Uploaded Successfully.<a href="view_f.php">click here to view file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                         ?>
                               <label>Problem While File Uploading !</label>
                               <?php
                        }
                        else if(isset($_GET['exists'])){
                            ?>
                               <label>Filename exists. Upload new file.</label>
                               <?php
                        }
                        else
                        {
                         ?>
                               <label>The File should be in PDF format with filename as "Student-ID_Faculty_ID_phd_comp"</label>
                               <?php
                        }
                        ?>
                        <?php
                            }
                            else{
                                ?>
                               
                               <form action="upload_f.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file" />
                            <button type="submit" name="btn-upload">upload</button>
                            </form>
                        <?php
                            if(isset($_GET['success']))
                        {
                         ?>
                        <label>File Uploaded Successfully.<a href="view_f.php">click here to view file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['fail']))
                        {
                         ?>
                        <label>Problem While File Uploading !<a href="view_f.php">View Previous file.</a></label>
                               <?php
                        }
                        else if(isset($_GET['exists'])){
                            ?>
                        <label>Filename exists. Upload new file.<a href="view_f.php">View Previous File.</a></label>
                               <?php
                        }
                        else
                        {
                         ?>
                            <label><a href="view_f.php">Click here to view uploaded File. You can upload a new file.</a></label>
                               <?php
                        }
                        ?>
                                <?php
                            }
                        ?>
                        
                        <br>
                        <br>
                        <?php
                        
                        
            $baat1 ="SELECT syn_stud_name, syn_convenor_name, attempt, grade, stud_report, fac_report FROM synopsis s WHERE syn_convenor_id=$u_id AND syn_std_id=$id AND attempt<(SELECT MAX(attempt) FROM synopsis s1 WHERE s1.syn_std_id=$id)";
            $res2 = mysqli_query($link1, $baat1);
           
            
            
            
                
                $fet3 = mysqli_fetch_array($res2)
                    
                    
                
                
                    //$length2 = count($syn_id2);
                    
                   
                        ?>
   
            <label>Student Id</label><br>
            <input type="text" placeholder="<?php echo($id); ?>" readonly>
            <br>
            <label>Student Name</label><br>
            <input type="text" placeholder="<?php echo($fet3[0]); ?>" readonly>
            <br>
            
            <label>Convener Name</label><br>
            <input type="text" placeholder="<?php echo($fet3[1]); ?>" readonly>
            <br>
            <label>Attempt</label><br>
            <input type="text" placeholder="<?php echo($fet3[2]+1); ?>" readonly>
            <br>
            <label>Grade</label><br>
            <input type="text" placeholder="<?php echo($fet3[3]); ?>" readonly>
            <br>
            <label>STUDENT REPORT</label>
                        
                        <?php
                        if($fet3[4]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../synopsis/student/$id");
                            //echo($sid);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
                        ?>
                        
                        <br>
                        <label>Faculty Report</label>
                        
                        
                        <?php
                        if($fet3[5]=="NA"){
                            echo("<input class=\"form-control\" type=\"text\" placeholder=\"");
                            echo("NO FILE UPLOADED");
                            echo("\" readonly>");
                        }
                        else{
                            echo("<br><a href=\"../synopsis/faculty/$id");
                            //echo($sid);
                            echo("\"target=\"_blank\">View File</a><br>");
                        }
                        ?>
                        
                        <br>
        
                        
                        <?php
                            }
                        }
                        ?>
                    </div>
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

</body>

</html>
