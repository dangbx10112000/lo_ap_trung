<?php 
    include_once('connect.php');
    if (isset($_GET["btntempset"])) {
        $tempset = test_input($_GET["tempset"]);
        $result = updateTemp($tempset);
        echo $result;
    }
    else if (isset($_GET["btnhumdset"])) {
        $humdset = test_input($_GET["humdset"]);
        $result = updateHumd($humdset);
        echo $result;
    }
    else if (isset($_GET["btntimeset"])) {
        $timeset = test_input($_GET["timeset"]);
        $result = updateTime($timeset);
        echo $result;
    }
//=================================
     function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
