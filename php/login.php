<!doctype html>
<body>
  <?php


  $_SESSION['message'] = "";




  $servername = "localhost";
  $db="shop";
  $username = "root";
  $password = "root";

  //Connect to mysql server
  $link = new mysqli($servername, $username, $password,$db);
  if(!$link) {
      die('Failed to connect to server: ' . mysql_error());
  }
  $login = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($login) && !empty($password)) {



      $query = "SELECT * FROM login WHERE email='$login' AND pass='$password'";
      $data = $link->query($query);
      if($data) {
          if (mysqli_num_rows($data) == 1 ) {
              $row = mysqli_fetch_assoc($data);
              $_SESSION['userid'] = $row['phone'];
              $_SESSION['username'] = $row['name'];
              $_SESSION['message'] = "Welcome,&nbsp;" . $_SESSION['username'];
             header('Location:../index.html');
            echo $_SESSION['message'];

              exit();
          }
          else {
              $_SESSION['message'] = "Please enter a valid username or password";
              $error=implode(" ",$_SESSION);
              echo '<script language="javascript">';
              echo "alert('$error')";
              echo '</script>';
              header('Location: ../login.html');



              exit();
          }

      }
      else {
          die("Query failed");
      }

  }
  else {
      $_SESSION['message'] = "Please enter a username or password";
      //header('Location: error.php');
      exit();
  }
$_SESSION['login_user']=$_SESSION['username'];

  ?>
</body>
</html>
