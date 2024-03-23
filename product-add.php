<?php
// Require the PHP files containing the definitions of the Product and Category classes
require_once("entities/product.class.php");
require_once('entities/category.class.php');

// Check if the form submission button is clicked
if (isset($_POST["btnsubmit"])) {
    // Get values from the form
    $productName = $_POST["txtname"];
    $cateID = $_POST["txtcateid"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];

    // Initialize the Product object with the retrieved values
    $newProduct = new Product(
        $productName,
        $cateID,
        $price,
        $quantity,
        $description,
        $picture
    );
    // Initialize an array to store errors
    $loi = array();
    $loi_str = "";

    // Save to the database
    $result = $newProduct->save($loi);
    // Check if the query was successful
    if (!$result) {
        // Redirect to the product-add.php page with a failure status if there's an error
        header("Location: product-add.php?status=failure");
    } else {
        // Redirect to the product-add.php page with a success status if the product is successfully added
        header("Location: product-add.php?status=inserted");
    }
}
?>
<?php
// Display error message if there are any errors
if ($loi_str != "") {
?>
    <div class="alert alert-danger"><?php echo $loi_str ?></div>
<?php } ?>
<?php require 'header.php'; ?>

<?php
// Display success or failure message based on the status in the URL query parameter
if (isset($_GET["status"])) {
    if ($_GET["status"] == 'inserted') {
        echo "<h2>Add successful product.</h2>";
    } else {
        echo "<h2>Add failed product.</h2>";
    }
}
?>

<!-- Form to add products -->
<form method="post" enctype="multipart/form-data">
    <!-- Product's name -->
    <div class="row">
        <div class="lbltitle">
            <label> Product's name </label>
        </div>
        <div class="lblinput">
            <input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
        </div>
    </div>
    <!-- Product Description -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Description </label>
        </div>
        <div class="lblinput">
            <textarea type="text" name="txtdesc" cols="21" rows="10"><?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?></textarea>
        </div>
    </div>
    <!-- The number of products -->
    <div class="row">
        <div class="lbltitle">
            <label> The number of products </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">
        </div>
    </div>
    <!-- Product price -->
    <div class="row">
        <div class="lbltitle">
            <label> Product price </label>
        </div>
        <div class="lblinput">
            <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">
        </div>
    </div>
    <!-- Product Type -->
    <div class="row">
        <div class="lbltitle">
            <label> Product Type </label>
        </div>
        <div class="lblinput">
            <select name="txtcateid">
                <option value="" selected>-- Select type --</option>
                <?php $cates = Category::list_category() ?>
                <?php foreach ($cates as $ite
