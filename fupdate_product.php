<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product_details_id from the query string
    $product_details_id = $_GET["product_details_id"];

    // Retrieve form data
    $product_status = $_POST["product_status"];
    $product_price = $_POST["product_price"];
    $product_quantity = $_POST["product_quantity"];

    // Validate and sanitize the input data
    // ...

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle image update, if provided
    if (!empty($_FILES['product_image']['name'])) {
        $image = file_get_contents($_FILES['product_image']['tmp_name']);

        // Update product image in the database
        $updateImageQuery = "UPDATE product_details SET product_image = '" . $conn->real_escape_string($image) . "' WHERE product_details_id = '" . $product_details_id . "'";
        if ($conn->query($updateImageQuery) === true) {;
        } else {
            echo '<script>alert("Failed to update product image: ' . $conn->error . '");</script>';
        }
    }

    // Update product details excluding the image
    $updateQuery = "UPDATE product_details SET ";
    $updateQuery .= "product_status = '" . $product_status . "', ";
    $updateQuery .= "product_price = " . $product_price . ", ";
    $updateQuery .= "product_quantity = " . $product_quantity . " ";
    $updateQuery .= "WHERE product_details_id = '" . $product_details_id . "'";

    // Execute the update query
    if ($conn->query($updateQuery) === true) {
        echo '<script>alert("Product details updated successfully."); window.location.href = "product_list.php";</script>';
        exit;
    } else {
        echo '<script>alert("Failed to update product details: ' . $conn->error . '");</script>';
    }

    $conn->close();
}
?>
