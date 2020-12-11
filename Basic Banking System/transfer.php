<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Transfer</title>
    <style>
      body{
        background-image: url('transferbg.jpg');
        background-position: center;
      }
    .cus{
      padding: 10px 20px;
      margin: 10px 10px;
      background-color: DodgerBlue;
      color: #f2f2f2;
      font-size: 20px;
    }
    #recipient{
      font-size: 25px;
    }
    .sclick{
      font-size: 16px;
      margin: 4px 2px;
      padding: 16px 32px;
      border-radius: 45px;
      border-style: solid;
      border-color: black;
      cursor: pointer;
      outline: none;
      background-color: #f2f2f2;
    }
    .sclick:hover{
      background-color: #000000;
      color: #f2f2f2;
    }

    </style>
  </head>
  <body><center>
    <h1>Transfer Money</h1>
    <form action="" method="post">
    <?php
    $conn = new mysqli('localhost', 'id15649397_root', 'Bhavana@2000', 'id15649397_bank');
    if($conn-> connect_errno) {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
    }
    $submit_name = $_GET['name'];
    echo '<label id="recipient" >Recipient:</label>';
    echo "<select name='customer' class='cus'>";
      $sql1="Select name from customers where name<>'$submit_name'";
      $result = $conn->query($sql1);
      if($result-> num_rows > 0)
      {
        while ($row = $result->fetch_assoc()) {
        unset($username);
        $username = $row['name'];
        echo '<option value=" '.$username.'"  >'.$username.'</option>';
       }
     }
     echo "</select>";
    ?>
    <br><label id="recipient" >Amount:</label>
    <select class="cus" name="amount">
      <option value=100>100</option>
      <option value=200>200</option>
      <option value=300>300</option>
      <option value=400>400</option>
      <option value=500>500</option>
      <option value=600>600</option>
      <option value=700>700</option>
      <option value=800>800</option>
      <option value=900>900</option>
      <option value=1000>1000</option>
    </select><br>
    <input type="submit" name='submit' class="sclick" value="Done">
  </form>
  <?php
    if( isset($_POST['submit']) ) {
      $recipient = $_POST['customer'];
      $amount = $_POST['amount'];
      $recipient = ltrim(($recipient));
      $sql = "SELECT name,email,balance from customers where name = '$recipient' ";
      if($result = $conn->query($sql)){
        while(  $row = $result->fetch_assoc()){
          $a = $row['balance'];
        }
      }
      $sql2 = "SELECT name,email,balance from customers where name = '$submit_name'";
      if($result = $conn->query($sql2)){
        while(  $row2 = $result->fetch_assoc()){
          $b = $row2['balance'];
        }
      }
      if($b>=$amount){
        $b = $b - $amount;
        $a = $a + $amount;
        $sql3 = "UPDATE customers SET Balance='".$a."' WHERE name= '".$recipient."' ";
        $conn->query($sql3);
        $sql4 = "UPDATE customers SET Balance='".$b."' WHERE name= '".$submit_name."' ";
        $conn->query($sql4);
        date_default_timezone_set("Asia/Kolkata");
        $date = date('d-m-Y H:i:sa');
        $sql5 = "INSERT INTO transfers values('$submit_name','$recipient','$amount','$date')";
        $conn->query($sql5);
        echo "<h3>Successfully transferred.</h3";
      }
      else{
        echo "<h3>No sufficient balance to transfer.</h3>";
      }
    }
    $conn-> close();
  ?>
  </center>
  <a href="accounts.php">Back to accounts</a></body>
</html>
