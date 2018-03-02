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
              FROM categories"; //To populate the dropdown of categories
    //Run Query
    $categories = $db->select($query);

?>


<?php

    if(isset($_POST['submit']))
    {
        //Assign Vars
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
        //Simple Validation
        if($title == '' || $body == '' || $category == '' || $author == '')
        {
            //Set Error
            $error = 'Please fill out all required fields';
        }
        else
        {
            $query = "UPDATE posts 
					  SET 
					    title = '$title',
					    body = '$body',
					    category = '$category',
					    author = '$author',
					    tags = '$tags' 
					  WHERE id =".$id;

            $update_row = $db->update($query);
        }
    }

?>


<?php

    if(isset($_POST['delete']))
    {
        $query = "DELETE FROM posts
                  WHERE id = ".$id;

        $delete_row = $db->delete($query);
    }
?>


    <br>
    <form  method="post" action="edit_post.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label><b>Post Title</b></label>
            <input name="title" type="text" class="form-control" placeholder="Enter Post Title" value="<?php echo $post['title']; ?>">
        </div>
        <div class="form-group">
            <label><b>Post Body</b></label>
            <textarea name="body" class="form-control" placeholder="Enter Post Body"><?php echo $post['body']; ?></textarea>
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
                    <option value="<?php echo $row['id']?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label><b>Author</b></label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author']; ?>">
        </div>
        <div class="form-group">
            <label><b>Tags</b></label>
            <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags']; ?>">
        </div>
        <input name="submit" type="submit" class="btn btn-success" value="Submit Changes" />
        <input name="delete" type="submit" class="btn btn-outline-danger" value="Delete" />
        <a href="index.php" name="cancel" type="submit" class="btn btn-outline-success">Go back</a>
    </form>
    <br>


<?php include 'includes/footer.php' ?>