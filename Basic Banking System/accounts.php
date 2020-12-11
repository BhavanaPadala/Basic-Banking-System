<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer</title>
    <style>
    html, body {
      margin:0;
      padding: 0;
      width: 100%;
    }

    body{
      width: 100%;
      background-image: url('transferbg3.png');
      background-position: center;
    }

    .content-table{
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 1em;
      width: 70%;
    }

    .content-table tr{
      text-align: left;
      font-family: sans-serif;
      background-color: #fff;
    }

    .content-table tr:nth-child(odd){
      background-color: #FCBB03 ;
    }

    .content-table th{
      background-color: #000000;
      color: #FCBB03;
    }

    .content-table th,.content-table td{
      padding: 15px 20px;
    }

    button{
      padding: 12px 4px;
      margin: 10px 10px;
      background-color: #000000;
      color: #ffffff;
      width: 110px;
      font-size: 1em;
      cursor: pointer;
      border-color: #000000;
      border-radius: 5px;
      outline: none;
      color: #FCBB03;
    }

    .content-table button:nth-child(odd){
        color: #ffffff;
    }

    </style>
  </head>
  <body><center>
    <h1>Account Holders</h1>
    <table class="content-table">
        <tr>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>BALANCE($)</th>
          <th></th>
        </tr>
        <?php
        $conn = new mysqli('localhost', 'id15649397_root', 'Bhavana@2000', 'id15649397_bank');
        if($conn-> connect_errno) {
          echo "Failed to connect to MySQL: " . $conn -> connect_error;
          exit();
        }
        $sql = "Select name, email, balance from customers";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0)
        {
          while($row = $result->fetch_assoc())
          {
            echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["balance"]."</td>";
            echo "<td><a href='details.php?id=".$row["name"]."'>View</a></td></tr>";
          }
          echo "</table>";
        }
        else
        {
          echo "0 result";
        }
        $conn->close();
        ?>
        <button type="button" name="back" onclick="window.location='index.html'">Back</button>
        <button type="button" name="transaction" onclick="window.location='transactions.php'">Transactions</button>
  </center></body>
</html>
