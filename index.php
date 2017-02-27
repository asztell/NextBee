<DOCTYPE! html>
<html>
<head>
    <title></title>
</head>
<body>
<p><?php

    // all PHP code is written and run in PHP 7
    // not tested in PHP 5.*

    echo "<br><br><strong>Question 4</strong>";

    // =============== Problem 1. ===============

    echo "<br><br>Problem 1<br><br>";

    $servername = "localhost";
    $username = "root";
    $password = "1MysqlPass!";
    $database = "NextBee";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    // ---- a. ----

    $sql = 'select age, count(age) from NextBee.member group by age order by count(age) desc';
    $result = mysqli_query($conn, $sql);

    $result_array = array(
        'age'=>array(),
        'count(age)'=>array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $result_array['age'][] = $row['age'];
        $result_array['count(age)'][] = $row['count(age)'];
    }

    // prints the query results
    for($i = 0; $i < sizeof($result_array['age']); $i++) {
        echo $result_array['age'][$i] . " -- " . $result_array['count(age)'][$i] . "<br>";
    }
    echo "<br>";

    $most_members_array = array();

    if($result_array['count(age)'][0] > 0) {
        for($i = 0; $i < sizeof($result_array['age']); $i++) {
            if(($result_array['count(age)'][$i] == $result_array['count(age)'][0])) {
                $most_members_array[] = $result_array['age'][$i];
            }
        }
    } else {
        echo "table 'member' is empty";
    }

    // output results ( could be written better but works as is )
    echo "The following age group(s) has the most members: <br>";
    foreach($most_members_array as $value) {
        echo "age group " . $value . ", <br>";
    }
    echo " with " . $result_array['count(age)'][0] . " members";
    if(sizeof($most_members_array) > 1){
        echo " each";
    }
    echo ".<br><br>";



    // ---- b. ----

    $sql = 'select age, count(age) from NextBee.member group by age';
    $result = mysqli_query($conn, $sql);

    $result_array = array(
        'age'=>array(),
        'count(age)'=>array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $result_array['age'][] = $row['age'];
        $result_array['count(age)'][] = $row['count(age)'];
    }

    // prints the query results
    for($i = 0; $i < sizeof($result_array['age']); $i++) {
        echo $result_array['age'][$i] . " -- " . $result_array['count(age)'][$i] . "<br>";
    }
    echo "<br>";

    $age_group_range_array = array(
        "lower_age_group" => null,
        "higher_age_group" => null,
        "total" => null,
    );

    if($result_array['count(age)'][0] > 0) {
        // the for loop checks only a range of 3 for the sake of brevity
        // this can easily be scaled to look for ranges of 5 years
        $size = (sizeof($result_array['age']))-2;
        for($i = 0; $i < $size; $i++) {
            if($age_group_range_array['total'] < ($result_array['count(age)'][$i] + $result_array['count(age)'][$i+1] + $result_array['count(age)'][$i+2])) {
                $age_group_range_array['lower_age_group'] = $result_array['age'][$i];
                $age_group_range_array['higher_age_group'] = $result_array['age'][$i+2];
                $age_group_range_array['total'] = $result_array['count(age)'][$i] + $result_array['count(age)'][$i+1] + $result_array['count(age)'][$i+2];
            }
        }
    }

    echo "The most members are between the age groups "
        . $age_group_range_array['lower_age_group']
        . " and "
        . $age_group_range_array['higher_age_group']
        . " with a total of "
        . $age_group_range_array['total']
        . " members.<br><br>";




    // =============== Problem 2. ===============

    echo "<br><br>Problem 2<br><br>";

    $arr = array(1, 3, 4, 1, 2, 6, 1, 9, 8, 3);
    // instead of doubles I considered multiples because there could be more than 2 instances
    // of the same number within 4 neighboring indices
    $multiples = array();

    for($i = 0; $i < sizeof($arr)-1; $i++) {
//        echo "\$arr[\$i] == ".$arr[$i]."<br>";
        for($j = $i+1; $j < $i+4; $j++) {
//            echo ". "."\$arr[\$j] == ".$arr[$j]."<br>";
            if($arr[$i] == $arr[$j]) {
//                echo "<br>".sizeof($multiples)."<br>";
                $is_double = False;
                for($k = 0; $k < sizeof($multiples); $k++) {
                    if($arr[$i] == $multiples[$k]) {
//                        echo "\$arr[\$i] == ".$arr[$i]." and \$multiples[\$k] == ".$multiples[$k];
                        $is_double = True;
                    }
                }
                if(!$is_double){
                    array_push($multiples, $arr[$i]);
                }
            }
        }
    }

    echo "The numbers that occur multiple times within three consecutive indices are";
    foreach ($multiples as $num) {
        echo " ".$num;
    }
    echo ".";

    echo "<br><br>";

    // ============= Question 5 =============

    echo "<hr><br><br><strong>Question 5</strong><br><br>";

    // ---- a. ----

    echo "<strong>a.</strong>"."<br><br>";

    // this solves the need for adding an hour
    // to the start date to get interval

    // $timestamp would be a parameter from a form
    // sent in a $_POST['start_time']

    // the variable $timestamp1 can be used
    // in a query, but not before it is cast with intval
    // e.g. $timestamp = intval($_GET['start_time']);

    // (for demo purposes I am using hardcoded present time)
    $timestamp1 = time();
    echo "\$timestamp1 == ".$timestamp1."<br>";
    $timestamp2 = $timestamp1 + 3600;
    echo "\$timestamp2 == ".$timestamp2."<br>";

    // this function can be used to output date or parts of it
    // to the front end
    function formatdate($unixtime) {
        return $time = date("m/d/Y h:i:s",$unixtime);
    }

    $formatted_timestamp1 = formatdate($timestamp1);
    $formatted_timestamp2 = formatdate($timestamp2);
    echo "\$formatted_timestamp1 == ".$formatted_timestamp1."<br>";
    echo "\$formatted_timestamp1 == ".$formatted_timestamp2."<br>";

    echo "<br>";


    // ---- b. ----

    echo "<strong>b.</strong>"."<br><br>";

    // These two functions getDailyHigh and getWeeklyHigh should
    // probably be called in a cron job at night time (e.g. 2 am PST)
    // since they are quite costly from a performance point of view.
    // The results can be saved to another table or even another database
    // and revised later by dev / analytics team.

    function getDailyHigh($day){
        $highest = array("beg"=>null, "end"=>null,);
        $current = array("beg"=>null, "end"=>null,);
        $beg = $day;
        $end = $day + 60*14;

        echo "\$beg == ".$beg;
//        $day2 = $day + 60;
        echo "<br><br>";
        echo "\$end == \$beg + 60*14 == ".$end;
        echo "<br>";

        // for the real world application the loop will keep going
        // for 1426 times, which covers all 15 minute intervals of
        // a 24 hour day
        // for($i = 0; $i < 1426; $i++){

        // this loop however checks only 5 consecutive 15 minute intervals
        for($i = 0; $i < 5; $i++){
            echo "\$end - \$beg == ";
            echo $end-$beg;
            echo "<br>";

//            $sql = 'select id from test.visits where timestamp between $beg and $end';

            $beg += 60;
            echo "<br>";
            echo "\$beg "."&nbsp;&nbsp;== ".$beg;

            $end += 60;
            echo "<br>";
            echo "\$end == ".$end;
            echo "<br>";

        }

        return $highest;
    }

    // this would be a parameter from a form
    // sent in a $_POST['start_time']
    // $unixtime = $_POST['start_time'];
    // but for demo purpose I am using hardcoded present time
    $day = time();
    getDailyHigh($day);


    function getWeeklyHigh($day){
        $highest = array("beg"=>null, "end"=>null,);
        $current = array("beg"=>null, "end"=>null,);

        for($i = 0; $i < 34224; $i++){

        }

        return $highest;
    }



    // ---- c. ----


    echo '<br><br>';



    // ============= Question 6 ==============

    echo "<hr><br><br><strong>Question 6</strong><br><br>";

    echo "<script type='text/javascript' src='array.js'></script>";

    echo "<script type='text/javascript'>
            var array_answer = document.createElement('h4');
            array_answer.textContent = solution;
            document.body.appendChild(array_answer);
          </script>";


    ?></p>
</body>
</html>
