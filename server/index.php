<?php
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/haui.jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">   
    <link rel="stylesheet" href="styleIndex.css">
	<title>HaUI-Đồ án môn-Lò ấp trứng thông minh</title>
</head>
<body>
    <div class="header">
                <a href="#">HOME | </a>
                <a href="database.php"> Data Base |</a>
                <a href="index.php"> Control Board |</a>
                <a href="tracking.php"> Tracking</a>
    </div>

    <h3 id="ctr">Control Boad</h3>
    <div class="control"> 
            <?php 
                $result = getAllOutputs();
                $html_buttons = null;
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row["state"] == "1"){
                            $button_checked = "checked";
                        }
                        else {
                            $button_checked = "";
                        }
                        $html_buttons .= '<h3>' . $row["name"] . '</h3><label class="switch"><input type="checkbox" onchange="updateOutput(this)" id="' . $row["id"] . '" ' . $button_checked . '><span class="slider"></span></label>';
                    }
                }
                echo $html_buttons;
            ?>
        </div>

            
     
    <h3>Setup Temp & Humd & Time</h3>
    <div class="container" id="container1">
        <form action="setdata.php" method="GET">
            <div class="form-group"><br>
                <label for="">TEMP:</label>
                <input type="number" class="font-control" name="tempset" step="0.1" id="input1">
            </div>
            <button type="submit" class="btn-defaut" id="" name="btntempset">OK</button>   
        </form>
      </div>
    <div class="container" id="container2">
        <form action="setdata.php" method="GET">
            <div class="form-group"><br>
                <label for="">HUMD:</label>
                <input type="number" class="font-control" name="humdset" step="0.1" id="input2">
            </div>
            <button type="submit" class="btn-defaut" id="" name="btnhumdset">OK</button>   
        </form>
      </div>
    <div class="container" id="container3">
        <form action="setdata.php" method="GET">
            <div class="form-group"><br>
                <label for="">TIME:</label>
                <input type="number" class="font-control" name="timeset" step="1" id="input3">
            </div>
            <button type="submit" class="btn-defaut" id="" name="btntimeset">OK</button>   
        </form>
      </div>
    <?php require_once "tableSetdata.php"; ?>
    <div class="panel-heading">
    <center><img src="image/haui.jpg" width="50px" alt="Gambar" class="img-thumbnail" class="text-muted"> Desinged by Bx HaUI </p></center>
    </div>
    <script>
        
        var xhttp = new XMLHttpRequest();
        function updateOutput(element) {
            if(element.checked){
                xhttp.open("GET", "action.php?action=output_update&id="+element.id+"&state=1", true);
            }
            else {
                xhttp.open("GET", "action.php?action=output_update&id="+element.id+"&state=0", true);
            }
            xhttp.send();
        }
    </script>
</body>
</html>
