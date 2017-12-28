<?php

    require('config/config.php');
    require('config/db.php');

    // Creating a query
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    // Getting the result
    $result = mysqli_query($conn, $query);

    // Fetching Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);

    // Freeing the Result
    mysqli_free_result($result);

    // Closing the Connection
    mysqli_close($conn);

?>

<?php include('includes/header.php'); ?>
    <div class="container">
        <div>
            <h3>Posts</h3>
            <?php foreach ($posts as $post): ?>
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $post['title']; ?></h4>
                        <p>Created by <?php echo $post['author']; ?></p>
                        <small>Created on <?php echo $post['created_at']; ?></small>
                        <p class="card-text"><?php echo $post['body']; ?></p>
                        <a  class="btn btn-success" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php include('includes/footer.php'); ?>
