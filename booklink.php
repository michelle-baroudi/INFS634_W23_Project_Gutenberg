<?php

require 'database/connection.php'; 

$name = $_GET['name'];

$sql="SELECT name, author FROM tbooks WHERE name = :name"; 
$stmt=$conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->execute();
$results=$stmt->fetch();
?> 

 <html>
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/mystyle.css">
  </head>
  <?php include('header.php'); ?>
  <h2><?php echo $results['name'];?></h2>
    <h3><?php echo $results['author'];?></h3>
<?php include('footer.php'); ?>
<body> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>