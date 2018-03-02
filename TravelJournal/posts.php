<?php include 'includes/header.php' ?>

<?php

    //Create DB Object
    $db = new Database();

    //Check URL For Category
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        //Create Query
        $query = "SELECT *
                  FROM posts
                  WHERE category = ".$category;
        //Run Query
        $posts = $db->select($query);
    }
    else
        {
        //Create Query
        $query = "SELECT *
                  FROM posts
                  ORDER BY id DESC";
        //Run Query
        $posts = $db->select($query);
    }

    //Create Query
    $query = "SELECT *
              FROM categories";
    //Run Query
    $categories = $db->select($query);

?>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Oeste Live, learn to love Portugal</h1>
            <p class="lead my-3">Founded by students it is a project that aims to develop one of the most iconic places around Portugal, the West Side.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
    </div>

<?php if($posts) : ?>
    <main role="main" class="container">
    <div class="row">
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            From Portugal with Love
        </h3>

        <?php while($row = $posts->fetch_assoc()) : ?>


            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="http://goncaloperes.com"><?php echo $row['author']; ?></a></p>

                <p>This is my first post on this magnificent city.</p>
                <hr>
                <p><?php echo shortenText($row['body']); ?></p>
                <a class="btn btn-outline-primary" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
            </div><!-- /.blog-post -->

        <?php endwhile; ?>

    </div><!-- /.blog-main -->

<?php else: ?>

    <p>There are no posts yet.</p>


<?php endif; ?>



<?php include 'includes/footer.php' ?>