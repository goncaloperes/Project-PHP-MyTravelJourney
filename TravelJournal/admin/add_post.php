<?php include 'includes/header.php' ?>

<?php

    //Create DB Object
    $db = new Database();


    if(isset($_POST['submit']))
    {
        //Assign Post Vars
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
        //Simple Validation
        if($title == '' || $body == '' || $category == '' || $author == '')
        {
            //Set Error
            $error = 'Please fill out all the required fields';
        }
        else
        {
            $query = "INSERT INTO posts (title, body, category, author, tags)
                      VALUES ('$title', '$body', '$category', '$author', '$tags')";

            $insert_row = $db->insert($query);
        }
    }

?>

<?php

    //Create Query
    $query = "SELECT *
              FROM categories"; //To populate the dropdown of categories
    //Run Query
    $categories = $db->select($query);


?>


    <br>
    <form  method="post" action="add_post.php">
        <div class="form-group">
            <label><b>Post Title</b></label>
            <input name="title" type="text" class="form-control" placeholder="Enter Post Title">
        </div>
        <div class="form-group">
            <label><b>Post Body</b></label>
            <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
        </div>
        <div class="form-group">
            <label><b>Category</b></label>
            <select name="category" class="form-control">
                <?php while($row = $categories->fetch_assoc()) : ?>
                    <?php if($row['id'] == $post['category'])
                    {
                        $selected = 'selected';
                    }
                    else
                    {
                        $selected = '';
                    }
                    ?>
                    <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label><b>Author</b></label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
        </div>
        <div class="form-group">
            <label><b>Tags</b></label>
            <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
        </div>
        <input name="submit" type="submit" class="btn btn-success" value="Submit" />
        <a href="index.php" name="cancel" type="submit" class="btn btn-outline-success">Go back</a>
    </form>
    <br>


<?php include 'includes/footer.php' ?>