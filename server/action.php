<?php
    include_once('connect.php');

    $action = $id = $name = $gpio = $state = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $action = test_input($_GET["action"]);
        if ($action == "get_data_json") {
            $board = test_input($_GET["board"]);//1
            $result = getDataJson($board);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rows[$row["name"]] = $row["state"];
                }
            }
            echo json_encode($rows);
        }
        else if ($action == "output_update") {
            $id = test_input($_GET["id"]);
            $state = test_input($_GET["state"]);
            $result = updateOutput($id, $state);
            echo $result;
        }

       
        }
//=================================
     function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>