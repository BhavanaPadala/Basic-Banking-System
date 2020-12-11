<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Transactions</title>
    <style>
    body, html {
      height: 100%;
      margin: 0;
    }
      body {
        background-image: url('transferbg3.png');
        height: 650px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .tran{
        background-color: green;
        padding: 2px;
        font-size: 18px;
        margin-bottom: 20px;
        color: white;
      }
      .content{
        font-size: 20px;
        color: black;
      }
      a:link{
        position: absolute;
        left: 10px;
      }
    </style>
  </head>
  <body><center>
    <div class="tran">
        <h1>Transactions</h1>
      </div>
    <div class="content">
      <a href="accounts.php">Back</a><br>
    <?php $conn = new mysqli('localhost', 'id15649397_root', 'Bhavana@2000', 'id15649397_bank');
    if($conn-> connect_errno) {
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
    }
    $sql = "Select sender, receiver,amount,date from transfers";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo $row['sender']." has transferred ".$row['amount']."$ to ".$row['receiver']." on ".$row['date']. "<br>";
      }
    }
    else
    {
      echo "No transactions have been done.";
    }
    $conn->close();
     ?>
   </div>
  </center></body>
</html>
