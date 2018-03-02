<?php include '../config/config.php' ?>

<?php include '../libraries/Database.php' ?>

<?php include '../helpers/format_helper.php' ?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <meta name="description" content="">-->
    <meta name="Gonçalo Peres" content="">
    <!--    <link rel="icon" href="../../../../favicon.ico">-->

    <title>Gonçalo Peres - Travel Blog - Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="index.php">Admin Area</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a>
                <a class="btn btn-sm btn-outline-secondary" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="index.php">Dashboard</a>
            <a class="p-2 text-muted" href="add_post.php">Add Post</a>
            <a class="p-2 text-muted" href="add_category.php">Add Category</a>
            <a class="p-2 text-muted" href="../index.php">Go to Blog</a>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 blog-main">

            <?php if(isset($_GET['msg'])): ?>

                <div class="alert-success"><?php echo htmlentities($_GET['msg']); ?></div>

            <?php endif; ?>
