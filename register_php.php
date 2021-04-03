
    <?php
    include('dbConnection.php');

    session_start();  

    if(!isset($_SESSION['is_adminlogin'])){
      if(isset($_REQUEST['aEmail'])){
        $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
        $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
        $sql = "SELECT email, password FROM user_tb WHERE email='".$aEmail."' AND password='".$aPassword."' limit 1";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
          
          $_SESSION['is_adminlogin'] = true;
          $_SESSION['aEmail'] = $Email;
          // Redirecting to RequesterProfile page on Correct Email and Pass
          echo "<script> location.href='user_dashboard.php'; </script>";
          exit;
        } else {
          $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
        }
      }
    } else {
      echo "<script> location.href='user_dashboard.php'; </script>";
    }
  ?>