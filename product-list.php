<?php
// Require the Product class file to access its methods
require_once('entities/product.class.php');
?>
<?php
// Include the header.php file to maintain consistency in the header across pages
include_once('header.php');
// Retrieve a list of products using the static method list_product from the Product class
$prods = Product::list_product();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Display a table to show product details -->
            <table border="1" class="table">
                <tr>
                    <td>Picture</td>
                    <td>Product Name</td>
                    <td>CateID</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Description</td>
                </tr>
                <?php
                // Loop through each product in the $prods array
                foreach ($prods as $item) {
                ?>
                    <!-- Display each product's details in a table row -->
                    <tr>
                        <td><?php echo $item['Picture'] ?></td>
                        <td><?php echo $item['ProductName'] ?></td>
                        <td><?php echo $item['CateID'] ?></td>
                        <td><?php echo $item['Price'] ?></td>
                        <td><?php echo $item['Quantity'] ?></td>
                        <td><?php echo $item['Description'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php
// Include the footer.php file to maintain consistency in the footer across pages
include_once('footer.php');
?>
