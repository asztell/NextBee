<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $db = mysqli_connect('localhost', 'interviewee', 't#stAccount', 'dev_test');
      // $sql = "SELECT * FROM weather";
      // $sql = "SELECT date_header, time_header, hitemp, lowtemp, windspeed, heatindex FROM weather";
      $sql = "SELECT date_header, time_header, hitemp, lowtemp, windspeed, heatindex FROM weather WHERE heatindex < 91 AND windspeed > 0.00;";
      $result = mysqli_query($db, $sql);
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              echo "Date: " . $row["date_header"].
                  " Time: " . $row["time_header"].
                  " High: " . $row["hitemp"].
                  " Low: " . $row["lotemp"].
                  " Windspeed: " . $row["windspeed"].
                  " Heat Index: " .$row["heatindex"].
                  "<br>";
          }
      } else {
          echo "0 results";
      }

      mysqli_close($db);
   ?>
  </body>
</html>
