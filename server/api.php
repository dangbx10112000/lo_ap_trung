<?php 

require_once 'config.php';
ini_set('date.timezone', 'Asia/Ho_Chi_Minh');

$now = new DateTime();

$datenow = $now->format("Y-m-d H:i:s");

        $temp     = $_POST['temp'];
        $humd     = $_POST['humd'];

         $query = "INSERT INTO sensor(temp,humd,datenow) VALUES ('".$temp."','".$humd."','".$datenow."')";
        mysqli_query($connect,$query);

        if ($connect->query($query) === TRUE) {
            echo json_encode("Ok");
        } else {
            echo "Error: " . $query . "<br>" . $connect->error;
        }

    $connect->close();
 ?>