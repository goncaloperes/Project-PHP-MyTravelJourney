<?php include 'includes/header.php' ?>

<?php

    //Create DB Object
    $db = new Database();

    if(isset($_POST['submit'])){
        //Assign Vars
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        //Simple Validation
        if($name == ''){
            //Set Error
            $error = 'Please fill out the Category Name';
        }
        else
        {
            $query = "INSERT INTO categories (name) 
				      VALUE('$name')";

            $update_row = $db->update($query);
        }
}
?>


    <form method="post" action="add_category.php">
        <div class="form-group">
            <label><b>Category Name</b></label>
            <input name="name" type="text" class="form-control" placeholder="Enter Category">
        </div>
        <input name="submit" type="submit" class="btn btn-success" value="Submit" />
        <a href="index.php" class="btn btn-outline-success">Go back</a>
    </form>


<?php include 'includes/footer.php' ?>