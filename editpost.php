<?php
    require('config.php');
    require('config/db.php');

    // check for submit
    if(isset($_POST['submit'])){
       // get form data
       $updateid = mysqli_real_escape_string($conn, $_POST['updateid']);
       $title = mysqli_real_escape_string($conn, $_POST['title']);
       $body = mysqli_real_escape_string($conn, $_POST['body']);
       $author = mysqli_real_escape_string($conn, $_POST['author']);

       $query1 = "UPDATE posts SET title='$title', author='$author', body='$body' WHERE id='$updateid'";

        if(mysqli_query($conn, $query1)){
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }


    // get id
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // create query
    $query = 'SELECT *FROM posts WHERE id = '. $id;

    // Get Result 
    $result = mysqli_query($conn, $query);

    // fetch data
    $post = mysqli_fetch_assoc($result);

    //free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

?>

<?php include('inc/header.php');?>
   <div class="container">
       <h1>Edit Post</h1>
       <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control"
                value="<?php echo $post['title']?>">
            </div>
            <div class="form-group">
                <label for="">Author</label>
                <input type="text" name="author" class="form-control"
                value="<?php echo $post['author']?>">
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <input type="text" name="body" class="form-control"
                value="<?php echo $post['body']?>">
            </div>
            <input type="hidden" name="updateid" value="<?php echo $post['id'] ?>">
            <input type="submit" name="submit" value="submit" 
            class="btn btn-primary">
       </form>
   </div>
    
<?php include('inc/footer.php'); ?>