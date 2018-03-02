<?php include 'includes/header.php' ?>

<?php

    $id = $_GET['id'];

    //Create DB Object
    $db = new Database();

    //Create Query
    $query = "SELECT * FROM categories WHERE id = ".$id;
    //Run Query
    $category = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM categories";
    //Run Query
    $categories = $db->select($query);

    ?>


<?php

    if(isset($_POST['submit']))
    {
        //Assign Vars
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        //Simple Validation
        if($name == '')
        {
            //Set Error
            $error = 'Please fill out all required fields';
        }
        else
        {
        $query = "UPDATE categories
		    	  SET 
					name = '$name'		
					WHERE id =".$id;

        $update_row = $db->update($query);
    }
}
?>


<?php

    if(isset($_POST['delete'])){
        $query = "DELETE FROM categories WHERE id = ".$id;

        $delete_row = $db->delete($query);
}
?>

    <form method="post" action="edit_category.php?id=<?php echo $id; ?>">
        <div class="form-group">
            <label><b>Category Name</b></label>
            <input name="name" type="text" class="form-control" placeholder="Enter Category" value="<?php echo $category['name']; ?>">
        </div>
        <input name="submit" type="submit" class="btn btn-success" value="Submit" />
        <input name="delete" type="submit" class="btn btn-outline-danger" value="Delete" />
        <a href="index.php" name="cancel" class="btn btn-outline-success">Go back</a>
    </form>


<?php include 'includes/footer.php' ?>