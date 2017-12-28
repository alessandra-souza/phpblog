<?php

    require('config/config.php');
    require('config/db.php');


    	// Check For Submit
    	if(isset($_POST['delete'])){
    		// Get form data
    		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    		$query = "DELETE FROM posts WHERE id = {$delete_id}";

    		if(mysqli_query($conn, $query)){
    			header('Location: '.ROOT_URL.'');
    		} else {
    			echo 'ERROR: '. mysqli_error($conn);
    		}
    	}


    // Getting Id
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    // Creating a query
    $query = 'SELECT * FROM posts WHERE id='.$id;

    // Getting the result
    $result = mysqli_query($conn, $query);

    // Fetching Data
    $post = mysqli_fetch_assoc($result);
    //var_dump($posts);

    // Freeing the Result
    mysqli_free_result($result);

    // Closing the Connection
    mysqli_close($conn);

?>

<?php include('includes/header.php'); ?>
    <div class="container">
        <a class="btn btn-outline-success" href="<?php echo ROOT_URL; ?>">Back</a><br><br>
        <h3 class="card-title"><?php echo $post['title']; ?></h3>
        <small>Created on <?php echo $post['created_at']; ?></small>
        <p class="card-text"><?php echo $post['body']; ?></p>
        <hr>
        <form class="float-right" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-success">Edit</a>
    </div>
<?php include('includes/footer.php'); ?>
