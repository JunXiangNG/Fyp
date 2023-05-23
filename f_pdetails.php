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
    $product_id = $_POST['product_id'];
    $product_color = $_POST['product_color'];
    $product_size = $_POST['product_size'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $product_gender = $_POST['product_gender'];
    $product_status = $_POST['product_status'];

    // Handle image upload
    $file = $_FILES['product_image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    if ($fileError === 0) {
        // Generate a unique product details ID
        $product_details_id = uniqid();

        // Read the image data
        $imageData = file_get_contents($fileTmpName);
        $imageData = $conn->real_escape_string($imageData); // Escape the image data to prevent SQL injection

        // Construct the SQL query with the inserted values
        $insertSql = "INSERT INTO product_details (product_id, product_color, product_size, product_quantity, product_price, product_gender, product_status, product_image) 
                      VALUES ('$product_id', '$product_color', '$product_size', '$product_quantity', '$product_price', '$product_gender', '$product_status', '$imageData')";

        // Check if the SQL query executed successfully
        if ($conn->query($insertSql)) {
            echo "<script>alert('Product Details Added Successfully.');</script>";
            echo "<script>window.location = 'product_list.php';</script>";
            exit; // Exit to prevent further execution of the code
        } else {
            echo "<script>alert('Error inserting product details: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error uploading the image.');</script>";
    }

    $conn->close();
}
?>
