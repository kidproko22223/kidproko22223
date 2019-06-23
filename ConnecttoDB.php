<!DOCTYPE html>
<html>
<body>

<h1>DATABASE CONNECTION</h1>

<?php
ini_set('display_errors', 1);
echo "Welcome to Toys Store";
?>

<?php
if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
        "host=ec2-50-19-114-27.compute-1.amazonaws.com ;port=5432;user=rkrhyqmezoltlx;password=67b7ce04b44c5507b8cf05e3be1a2b14ea968e575e90d3241569ea30d830e44d,dbname=d2b8o7aiucjc2b",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  
$sql = "SELECT * FROM toystore ORDER BY id";
$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Toys information:</p>';
?>
<div id="container">
<table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Toyname</th>
      </tr>
    </thead>
    <tbody>
      <?php
        //while($r = mysql_fetch_array($result)){
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['id'] ?></td>
        <td><?php echo $row['toyname'] ?></td>
       
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>