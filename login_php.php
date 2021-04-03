
    <?php
    $dbhost='localhost';
    $dbname='verison';
    $dbusername='root';
    $dbpass='';

    $mysqli=mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);


        session_start();  

        $login_email = $_POST['user_email'];
        $login_pass = $_POST['user_password'];
        $sql = "SELECT * FROM `user_detail` WHERE user_email = '$login_email' && user_password='$login_pass'";
        //$result = $mysqli->query($sql);
        if ($is_query_run = mysqli_query($mysqli,$sql))
        {
          $row = mysqli_num_rows($is_query_run);
          $q = mysqli_fetch_array($is_query_run);
          $nm = $q['user_fname'];
          $_SESSION['n'] = $nm;
          if($row == 1)

          {
            
            //echo '<script>alert("Succcessfully Login done.")</script>';
            //$_SESSION['n'];
            header('location:index.php');
          }
          else{
            //echo'<script>alert("Email is not registered")</script>';
          }
        }

        //$user_email = mysqli_real_escape_string($mysqli,trim($_REQUEST['user_email']));
        //$user_password = mysqli_real_escape_string($mysqli,trim($_REQUEST['user_password']));
        //$sql = "SELECT user_email, user_password,user_fname FROM user_detail WHERE user_email='".$user_email."' AND user_password='".$user_password."' limit 1";
        //$result = $mysqli->query($sql);
        //echo $result;



        

      //if($result)
      //{
        //echo $_SESSION['name']; 
        //echo '<script>alert("Succcessfully Login done.")</script>';
	   //header('location:index.php');

      //}
      //else{
        //echo'<script>alert("Email is not registered")</script>';
      //}
  
  ?>