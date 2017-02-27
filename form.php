<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      // error_reporting(E_ALL);
      if (isset($_POST['submit'])) {
        $ok = true;
        if (!isset($_POST['email'])) {
            $ok = false;
        }
        if (!isset($_POST['tc'])) {
            $ok = false;
        }

        if ($ok) {
          $db = mysqli_connect('localhost', 'interviewee', 't#stAccount', 'dev_test');
          $sql = "INSERT INTO users (FULL_NAME, EMAIL, PHONE, COMMENTS) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['comments']."')";
          mysqli_query($db, $sql);
          mysqli_close($db);
          echo '<p>User added.</p>';
        }
      }
    ?>

     <form class="" action="form.php" method="post">
       Full name: <input type="text" name="name"><br>
       Email: <input type="email" name="email"><br>
       Phone: <input type="text" name="phone"><br>
       Comments: <textarea name="comments"></textarea><br>
       <input type="checkbox" name="tc" value="ok">I agree to the terms and conditions<br>
       <input type="submit" name="submit" value="Submit">
     </form>
  </body>
</html>
