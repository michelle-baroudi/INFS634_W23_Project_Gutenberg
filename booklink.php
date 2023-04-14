<?php

require 'database/connection.php'; 

$book_id = $_GET['book_id'];
$author = $_GET['author'];
$search=$_GET['search'];

/*
  Checking if the user is coming from search bar. If yes, search by name.
  If not (else), search by book id.
  If row count is empty, go back to home page.
*/

if (isset($search)) {
  $sql="SELECT * FROM tbooks WHERE name = :search";
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':search', $search);
} else {
  $sql="SELECT * FROM tbooks WHERE book_id = :book_id"; 
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':book_id', $book_id);
}
$stmt->execute();
$results=$stmt->fetch();

if ($stmt->rowCount() == 0) {
  header('Location: index.php');
}
?> 
<!-- Page with the book details -->
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
        <image class= "imagename" img src ='assets/img/<?php echo $results ['file_name']; ?>.jpg' class="d-block w-100">
    </div>
    <div class= "col-6"> 
        <p class="author"><?php echo $results ['name']; ?> by <?php echo $results ['author']; ?> (<?php echo $results ['year']; ?>)</p>
        <p class="description"> <?php echo $results ['description']; ?></p>
        <p class="description"> <b>Total downloads: </b> <?php echo $results ['download_count']; ?></p>
      </div>
      <div class="downloads" div class= "col-3">
      <p class="download">Download Options</p>
          <div class="d-grid gap-2 d-md-flex center-content-md-end btn-group-vertical">
                  <form id="html_link" action="download_updates.php" method="post">
                    <input type="hidden" name="bookId" value="<?php echo $results ['book_id']?>">
                    <input type="hidden" name="link" value="<?php echo $results ['html_link']?>">
                    <a href="#" onclick="javascript: document.getElementById('html_link').submit();">
                      <button class= "link" button class="btn btn-primary" type="button">Read online (HTML 5) 72 kb</button>
                    </a>
                  </form>
                  <form id="ereader3_link" action="download_updates.php" method="post">
                    <input type="hidden" name="bookId" value="<?php echo $results ['book_id']?>">
                    <input type="hidden" name="link" value="Assets/ereader3/<?php echo $results ['file_name']; ?>.epub">
                    <a href="#" onclick="javascript: document.getElementById('ereader3_link').submit();">
                      <button class= "link" button class="btn btn-primary" type="button">EPUB 3 (eReader)</button>
                    </a>
                  </form>
                  <form id="ereader_link" action="download_updates.php" method="post">
                    <input type="hidden" name="bookId" value="<?php echo $results ['book_id']?>">
                    <input type="hidden" name="link" value="Assets/ereader/<?php echo $results ['file_name']; ?>.epub">
                    <a href="#" onclick="javascript: document.getElementById('ereader_link').submit();">
                      <button class= "link" button class="btn btn-primary" type="button">EPUB (old eReader)</button>
                    </a>
                  </form>
                  <form id="kindle_link" action="download_updates.php" method="post">
                    <input type="hidden" name="bookId" value="<?php echo $results ['book_id']?>">
                    <input type="hidden" name="link" value="Assets/kindle/<?php echo $results ['file_name']; ?>.mobi">
                    <a href="#" onclick="javascript: document.getElementById('kindle_link').submit();">
                      <button class= "link" button class="btn btn-primary" type="button">Kindle</button>
                    </a>
                  </form>
                  <form id="kindle_old_link" action="download_updates.php" method="post">
                    <input type="hidden" name="bookId" value="<?php echo $book_id?>">
                    <input type="hidden" name="link" value="Assets/kindle_old/<?php echo $results ['file_name']; ?>.mobi">
                    <a href="#" onclick="javascript: document.getElementById('kindle_old_link').submit();">
                      <button class= "link" button class="btn btn-primary" type="button">Older Kindle</button>
                    </a>
                  </form>
           </div>
           </div>
      </div>
    </div>
<?php include('footer.php'); ?>
<body> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>