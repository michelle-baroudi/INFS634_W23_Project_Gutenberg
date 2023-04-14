<?php

require 'database/connection.php';

$book_id=$_POST['bookId'];
$link=$_POST['link'];

$sql="UPDATE tbooks SET download_count = download_count + 1 where book_id = :book_id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':book_id', $book_id);
$stmt->execute();
?>

<script>
   window.open("<?php echo $link ?>", '_blank');

   <?php header("Location: booklink.php?book_id={$book_id}"); ?>
</script>