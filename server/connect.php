<?php
$server = "localhost";
$username = "id16723080_root";
$password = "D@nggD@ngg1234";
$database = "id16723080_users";
$connect = new mysqli($server, $username, $password, $database);
        if ($connect ->connect_error) {
            die("Connection failded! :".$connect->connect_error);
        }
//=========================================
function query($query) {
		global $server, $username, $password, $database;
		$connect = new mysqli($server, $username, $password, $database);
		if ($connect ->connect_error) {
			die("Connection failded! :".$connect->connect_error);
		}

		$ketqua = mysqli_query($connect, $query);
		$rows = [];
		while( $row = mysqli_fetch_assoc($ketqua)){
			$rows[] = $row;
		}
		return $rows;
		if ($connect->query($sql) === TRUE) {
	            return "Send data successfully";
	        }
	        else {
	            return "Error: " . $sql . "<br>" . $connect->error;
	        }
	    $connect->close();
	}
//=============================================================================
	function updateOutput($id, $state) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE outputs SET state='" . $state . "' WHERE id='". $id ."'";

       if ($connect->query($sql) === TRUE) {
            $sql = "UPDATE datajson SET state='" . $state . "' WHERE id='". $id ."'";
            if ($connect->query($sql) === TRUE) {
                return "Output state updated successfully";
        }
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }

    function getAllOutputs() {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT id, name, board, gpio, state FROM outputs ORDER BY board";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
    }

    function getDataJson($board) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        $sql = "SELECT name, state FROM datajson WHERE board='" . $board . "'";
        if ($result = $connect->query($sql)) {
            return $result;
        }
        else {
            return false;
        }
        $connect->close();
    }
//=================================================================================================

function updateTemp($tempset) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE setdata SET tempset='" . $tempset . "'";
        

       if ($connect->query($sql) === TRUE) {
          $sql = "UPDATE datajson SET state='" . $tempset . "' WHERE id='11'";
          if ($connect->query($sql) === TRUE) {
            header("Location: index.php");
        }
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }
function updateHumd($humdset) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE setdata SET humdset='" . $humdset . "'";
       
       if ($connect->query($sql) === TRUE) {
          $sql = "UPDATE datajson SET state='" . $humdset . "' WHERE id='12'";
          if ($connect->query($sql) === TRUE) {
            header("Location: index.php");
        }
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }
function updateTime($timeset) {
        global $server, $username, $password, $database;

        // Create connection
        $connect = new mysqli($server, $username, $password, $database);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "UPDATE setdata SET timeset='" . $timeset . "'";
        
       if ($connect->query($sql) === TRUE) {
          $sql = "UPDATE datajson SET state='" . $timeset . "' WHERE id='13'";
          if ($connect->query($sql) === TRUE) {
            header("Location: index.php");
        }
        }
        else {
            return "Error: " . $sql . "<br>" . $connect->error;
        }
        $connect->close();
    }