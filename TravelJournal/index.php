<?php include 'includes/header.php' ?>

<?php
    //Create DB Object
    $db = new Database();


    //Create Query
    $query = "SELECT *
              FROM posts
              ORDER BY id DESC";
    //Run Query
    $posts = $db->select($query);


//    //Create Query
//    $query = "SELECT *
//              FROM categories";
//    //Run Query
//    $categories = $db->select($query);

?>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Oeste Live, learn to love Portugal</h1>
            <p class="lead my-3">Founded by students it is a project that aims to develop one of the most iconic places around Portugal, the West Side.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Peniche</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Peniche Live</a>
                    </h3>
                    <div class="mb-1 text-muted">March 5</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
<!--                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">-->
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Berlengas</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Visit Berlengas</a>
                    </h3>
                    <div class="mb-1 text-muted">March 1</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="#">Continue reading</a>
                </div>
<!--                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">-->
            </div>
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


            <nav class="blog-pagination">
                <a class="btn btn-success" href="posts.php">All Posts</a>
                <!--        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>-->
            </nav>

        </div><!-- /.blog-main -->

    <?php else: ?>

    <p>There are no posts yet.</p>


<?php endif; ?>



<?php include 'includes/footer.php' ?>