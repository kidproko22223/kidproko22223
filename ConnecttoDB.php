<!DOCTYPE html>
<!-- saved from url=(0064)https://www.w3schools.com/w3css/tryw3css_templates_architect.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="image/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.php" class="w3-bar-item w3-button">Toys Store</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="ConnecttoDB.php" class="w3-bar-item w3-button">View</a>
      <a href="Insert.php" class="w3-bar-item w3-button">Insert</a>
      <a href="Update.php" class="w3-bar-item w3-button">Update</a>
      <a href="Delete.php" class="w3-bar-item w3-button">Delete</a>
    </div>
  </div>
</div>


		  
		  <div class="w3-container w3-padding-32" id="#">
		    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">View Database</h3>
		    
		  </div>
			



    <?php
      if (empty(getenv("DATABASE_URL"))){
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
      }  
      else{
        echo getenv("dbname");
        $db = parse_url(getenv("DATABASE_URL"));
        $pdo = new PDO("pgsql:" . sprintf(
       "host=ec2-50-19-114-27.compute-1.amazonaws.com;port=5432;user=rkrhyqmezoltlx;password=67b7ce04b44c5507b8cf05e3be1a2b14ea968e575e90d3241569ea30d830e44d;dbname=d2b8o7aiucjc2b",
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
      ?>

    <div class="w3-responsive w3-container">
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable" border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Toy Name</th>
          </tr>
        </thead>
        <tbody>

          <?php
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



    
  </div>
</header>




<footer class="w3-center w3-black w3-padding-16">
  <p>Assignment 2 <a href="#" title="Submited" target="_blank" class="w3-hover-text-green">Cloud Computing</a></p>
</footer>


</body></html>