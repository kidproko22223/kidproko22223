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
    <a href="index.php" class="w3-bar-item w3-button">Toy Store</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="ConnecttoDB" class="w3-bar-item w3-button">View</a>
      <a href="Insert.php" class="w3-bar-item w3-button">Insert</a>
      <a href="Update.php" class="w3-bar-item w3-button">Update</a>
      <a href="Delete.php" class="w3-bar-item w3-button">Delete</a>
    </div>
  </div>
</div>

	
		  <!-- Contact Section -->

		  <div class="w3-container w3-padding-32" id="#">
		    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Delete</h3>
		    <p>Delete Store</p>
		    <form name="DeleteData" action="Delete.php" method="POST">
		      <input class="w3-input w3-border" type="text" placeholder="ID:" required="" name="toyid">

		      <button class="w3-button w3-black w3-section" type="submit">
		        <i class="fa fa-paper-plane"></i> Delete
		      </button>
		    </form>
		  </div>
			


    <?php
      if (empty(getenv("DATABASE_URL"))){
        echo '<p>The DB does not exist</p>';
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
      }
      else{
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
      $sql = "DELETE FROM toystore WHERE toyid = '$_POST[toyid]'";
      $stmt = $pdo->prepare($sql);
      if (is_null($_POST[toyid]) == FALSE){
        if($stmt->execute() == TRUE){
          echo "Record deleted successfully.";
        } else {
          echo "Error deleting record: ";
        }
      }
      ?>
    
  </div>
</header>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Assignment 2 <a href="#" title="Submited" target="_blank" class="w3-hover-text-green">Cloud Computing</a></p>
</footer>


</body></html>