<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <style>
    body{
      background-image: url('transferbg.jpg');
      background-position: center;
    }
    table{
      border-color: red;
      width: 30%;
      font-size:1.5em;
      margin: 10px;
    }
    tr{
      margin: 8px 1px;
      padding: 12px 15px;
    }
    .bclick{
      font-size: 16px;
      margin: 4px 2px;
      padding: 16px 32px;
      border-radius: 15px;
      border-color: black;
      background-color: #f2f2f2;
      transition-duration: 0.4s;
      cursor: pointer;
      outline: none;
    }
    .bclick:hover{
      background-color: #000000;
      color: #f2f2f2;
    }
    </style>
  </head>
  <body><center>
    <h1>Details</h1>
    <table>
    <?php
      $conn = new mysqli('localhost', 'id15649397_root', 'Bhavana@2000', 'id15649397_bank');
      if($conn-> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
      }
      $submit_name = $_GET['id'];
      $sql = "Select name,email,balance from customers where name='$submit_name'";
      $result = $conn-> query($sql);
      $row = $result->fetch_assoc();
      echo "<tr><th> Name </th>";
      echo '<td>'.$row["name"].'</td></tr>';
      echo "<tr><th> Email </th>";
      echo '<td>'.$row["email"].'</td></tr>';
      echo "<tr><th> Balance($) </th>";
      echo '<td>'.$row["balance"].'</td></tr>';
      $submit_bal = $row['balance'];
      ?>
   </table>
   <form class="" action="transfer.php?name=<?php echo $submit_name?>" method="post">
     <input class="bclick" type="submit" name="submitbutton" value="Transfer Money">
   </form>
  </center></body>
</html>
