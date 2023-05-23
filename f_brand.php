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
    $brand_name = $_POST['brand_name'];
    $brand_code = $_POST['brand_code'];

    // Insert product details into the product_details table
    $insertSql = "INSERT INTO brand (brand_name, brand_code) VALUES ('$brand_name', '$brand_code')";

    if ($conn->query($insertSql) === TRUE) {
        // JavaScript code to display an alert and redirect to the add_brand page
        echo '<script type="text/javascript">';
        echo 'alert("New Brand Added Successfully.");';
        echo 'window.location.href = "add_brand.php";';
        echo '</script>';
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
