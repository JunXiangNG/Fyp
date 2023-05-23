<?php
// Insert product details into the product_details table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fyp";

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected product ID, product color, product size, and product quantity from the form
    $brand_id = $_POST['brand_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_code = $_POST['product_code'];

    // Insert product details into the product_details table
    $insertSql = "INSERT INTO product (brand_id, product_name, product_description, product_code) VALUES ('$brand_id', '$product_name', '$product_description', '$product_code')";

    if ($conn->query($insertSql) === TRUE) {
        // JavaScript code to display a success message and redirect to the add_product page
        echo '<script type="text/javascript">';
        echo 'alert("Product Details Added Successfully.");';
        echo 'window.location.href = "add_product.php";';
        echo '</script>';
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
