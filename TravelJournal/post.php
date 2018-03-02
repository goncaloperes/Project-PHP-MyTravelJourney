<?php include 'includes/header.php' ?>

<?php

    $id = $_GET['id'];

    //Create DB Object
    $db = new Database();

    //Create Query
    $query = "SELECT *
              FROM posts
              WHERE id = ".$id;
    //Run Query
    $post = $db->select($query)->fetch_assoc();

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

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    From Portugal with Love
                </h3>

                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="http://goncaloperes.com"><?php echo $post['author']; ?></a></p>
                    <hr>
                    <p><?php echo $post['body']; ?></p>
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->

<?php include 'includes/footer.php' ?>