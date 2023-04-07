<?php

require 'database/connection.php'; 

$book_id = $_GET['book_id'];

$sql="SELECT * FROM tbooks WHERE book_id = :book_id"; 
$stmt=$conn->prepare($sql);
$stmt->bindParam(':book_id', $book_id);
$stmt->execute();
$results=$stmt->fetch();
?> 

 <html>
    <head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/css/mystyle.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=IM+Fell+English+SC&display=swap')
</style>
  </head>
  <?php include('header.php'); ?>
  <div class ="container">
    <div class="row">
    <div class= "col-3">
        <image class= "imagename" img src ='assets/img/<?php echo $results ['image_name']; ?>.jpg' class="d-block w-100">
    </div>
    <div class= "col-6"> 
        <p class="author"><?php echo $results ['name']; ?> by <?php echo $results ['author']; ?> (<?php echo $results ['year']; ?>)</p>
        <p class="description"> <?php echo $results ['description']; ?></p>
        <p class="description"> <b>Total downloads: </b> <?php echo $results ['download_count']; ?></p>
      </div>
      <div class="downloads" div class= "col-3">
      <p class= download>Download Options</p>
          <div class="d-grid gap-2 d-md-flex center-content-md-end btn-group-vertical">
                  <a href="https://www.gutenberg.org/cache/epub/2641/pg2641-images.html">
                    <button class="btn btn-primary" type="button">Read online (HTML 5) 72 kb</button>
                  </a>
                  <button class="btn btn-primary" type="button">EPUB 3 (eReader)</button>
                  <button class="btn btn-primary" type="button">EPUB (old eReader)</button>
                  <button class="btn btn-primary" type="button">Kindle</button>
                  <button class="btn btn-primary" type="button">Older Kindle</button>
           </div>
           </div>
      </div>
    </div>
<?php include('footer.php'); ?>
<body> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>