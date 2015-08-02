<?php

require_once('../includes/initialize.php');
       include_once('../includes/config.php');
    if (! $session->is_logged_in() ){
        session_start();
    }
    if( ! isset($_SESSION['user_id']) ){
        header("location:../login.php");
    }

if(isset($_POST['delete'])){
    if(isset($_POST['rad'])){
        
        $store = $_POST['rad'];
        
        $connect = connection();
        
        $que = "DELETE FROM user WHERE user_id=$store";
        $do = mysqli_query($connect, $que);
        
        if($do){
            ?>
<script type="text/javascript">
    alert('Successfully Deleted');
    window.location.href='admin_panel.php';
    </script>
<?php
        }
        else{
            ?>
    <script type="text/javascript">
    alert('Error in Deletion');
    window.location.href='admin_panel.php';
    </script>
    <?php
        }
        
    }
}