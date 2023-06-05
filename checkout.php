<?php



error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$phone = $_SESSION['phone'];
	echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
	
}
$connect = mysqli_connect("localhost","root","","fyp");


?>

<?php 
    if(empty($username)) {
        echo "<script type='text/javascript'>alert('You must be logged in to continue.');</script>";
        echo '<script>window.location.href = "home.php";</script>';
    }
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>checkout</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	
	


</head>
<body>
<style>
.btn {
  display: inline-block;
  position: relative;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: gray;
  color: #fff;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
}
</style>
<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="http://localhost/fyp/user_home_page.php">4M Online Sport Shoe Store</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
						   <input type="search" name="search" required value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control search" placeholder="Search product">
							<button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
				 <?php
					$select_query = "SELECT * FROM brand";
					$result = mysqli_query($connect, $select_query);
						
					?>

					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="http://localhost/fyp/user_home_page.php">Home</a></li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/men.php">Men</a>

									<ul class="dropdown">
									<?php
										if ($result) {
											while ($row = mysqli_fetch_assoc($result)) {
												$brand_name = $row['brand_name'];
												echo '<li>' . $brand_name . '</li>';
											}
										} else {
											echo "Query failed: " . mysqli_error($connect);
										}
										?>
									
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/women.php">Women</a>
									<ul class="dropdown">
													<?php
									if ($result) {
										mysqli_data_seek($result, 0); // Reset the query result pointer to the first row
										while ($row = mysqli_fetch_assoc($result)) {
											$brand_name = $row['brand_name'];
											echo '<li>' . $brand_name . '</li>';
										}
									} else {
										echo "Query failed: " . mysqli_error($connect);
									}
									?>
									</ul>
								</li>
							
								<li><a href="http://localhost/fyp/about.php">About</a></li>
								<li><a href="viewreview.php">Review</a></li>
                                <li class="has-dropdown">
									<a href="#">Account</a>
									<ul class="dropdown">
										<li><a href="profile.php">Edit Profile</a></li>
										<li><a href="#">Order History</a></li>
                                        <li><a href="logout.php">Logout</a></li>
									</ul>
									
									
									<?php
								
								if (isset($_SESSION['username'])) {
								$username = $_SESSION['username'];
								mysqli_select_db($connect, "fyp");
								$result = mysqli_query($connect, "select * from orders WHERE username = '$username'");	
								$count = mysqli_num_rows($result);//used to count number of rows

								}
								if ($result === false) {
									die(mysqli_error($connect));
								}

							
								?>

								<li class="cart">
									<a href="http://localhost/fyp/cart.php#">
										<i class="icon-shopping-cart"></i> <?php echo $count; ?>
									</a>
								</li>	
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">Welcome to 4M Online Sport Shoe Store</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Let's start a great shopping trip together !</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="http://localhost/fyp/cart.php">Add to cart</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
							<p><span><a href="cart.php" >01</a></span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				
				<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $subtotal = 0; 

    $select_query = "SELECT * FROM orders WHERE username = '$username'";
    $result = mysqli_query($connect, $select_query);

    if ($result === false) {
	
        die(mysqli_error($connect));
	
    }
?>
    <div class="row row-pb-lg">
        <div class="col-md-12">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $product_image = $row['product_image'];
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                $user_quantity = $row['user_quantity'];
                $total_cost = $product_price * $user_quantity; 
                $subtotal += $total_cost; 
				}
			}
		
            ?>
			<form method="POST" class="colorlib-form" style="background-color: #88c8bc;">
				<div class="row">
					<div class="col-md-7">
						<h2>Billing Address</h2>

						<div class="row">
						<?php
									$username = $_SESSION['username'];
									$result = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");
									$count = mysqli_num_rows($result);
									
									// Display user data and edit form
									if ($count > 0) {
									  $row = mysqli_fetch_assoc($result);
									  $id = $row['user_id'];
									  $username = $row['username'];
									  $gender = $row['gender'];
									  $birthday = $row['birthday'];
									  $email = $row['email'];
									  $phone=$row['phone'];
									  $address=$row['address'];
									  $town=$row['town_city'];
									  $state=$row['state_province'];
									  $zipcode=$row['zip_postalcode'];
									
									}
									  
								?>

							<div class="col-md-6">
							<input type="hidden" name="order_id" value="<?php echo $_GET["order_id"]; ?>">
								<div class="form-group">
									<label for="receivername">Receiver Name</label>
									<input type="text" name="received_name" class="form-control" value="<?php echo $username; ?>" required>
								</div>
							</div>
						</div>
						<div class="form-group">
    				<label for="phonenumber">Phone Number</label>
    				<input type="text" name="phone" class="form-control" pattern="\d{3}-\d{8}" title="Please enter a correct phone number in the format, for example: 011-26126335"value="<?php echo $phone; ?>" required>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control" placeholder="Address" pattern="^[0-9]+(, )?.+" title="Please enter a correct address in the format , for example: 26, jalan ah looh" value="<?php echo $address; ?>" required>

						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<body onload="populateCities()">
								<label for="state" >Select State:</label><br>
								<select id="state" name="state_province" class="input-field" onchange="populateCities()"style="width: 200px; height: 50px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
								<option value="">- Select State -</option>
								<option value="Johor" <?php if ($state == "Johor") echo "selected"; ?>>Johor</option>
								<option value="Selangor" <?php if ($state == "Selangor") echo "selected"; ?>>Selangor</option>
								<option value="Melaka" <?php if ($state == "Melaka") echo "selected"; ?>>Melaka</option>
								<option value="Pahang" <?php if ($state == "Pahang") echo "selected"; ?>>Pahang</option>
								<option value="Negeri Sembilan" <?php if ($state == "Negeri Sembilan") echo "selected"; ?>>Negeri Sembilan</option>
								<!-- Add more state options here -->
						</select>
						</div>
							</div>
							<div class="col-md-6">

							<div class="form-group">
								<label for="city">Select City:</label><br>
								<select id="city" name="town_city" class="input-field" value="<?php echo $town; ?>"style="width: 200px; height: 50px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
    							<option value="">- Select City -</option>
 							 </select>
							</div>
						</div>
						</div>
						<div class="form-group">
							<label for="zipcode">Zip Code</label>
							<input type="text" name="zip_postalcode" class="form-control" placeholder="Zip Code" pattern="[0-9]{5}" title="Please enter a correct zip code for example: 83700" value="<?php echo $zipcode; ?>" required>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="cart-detail" style="background-color: whitesmoke;">
							<h2>Cart Total</h2>
							<ul>
								
								<li>
									
									<div class="sub">
									<p><span>Subtotal:</span> <span class="price">RM <?php echo number_format($subtotal, 2); ?></span></p>
									
									
								</div>
								</li>
								<li>
									<span>Shipping</span><span>Free Shipping</span>
										
								</li>
								<li><span>Total</span><span class="price">RM <?php echo number_format($subtotal, 2); ?></span></li>
								<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">

							</ul>
						</div>
						<div class="row">
									
						<div class="col-md-10">
								<div class="form-group">
									<label for="Card Name">Card Holder Name</label>
									<input type="text" id="cardname"  name="card_name" class="form-control" placeholder="" required>
								</div>
							</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="Card Number">Card Number</label>
										<input name="card_number"type="tel" class="input-lg form-control " pattern="[0-9]{16}" title="Please enter a 16-digit card number"  required>
								</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label for="card_expire">Card Expire</label>
								<input name="card_expire" id="cc-exp" type="text" class="input-lg form-control cc-exp" pattern="(0[1-9]|1[0-2])\/(20[2-9]\d|2[3-9]\d{2}|[3-9]\d{3})" min="2024-01"title="Please enter a card expiration date in the format MM/YYYY" placeholder="MM/YYYY" required>
							</div>
							</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="card expire">CVV</label>
										<input name="cvv" class="input-lg form-control "  pattern="[0-9]{3,}" title="Please enter the correct CVV"required>
									</div>
							</div>
							<div class="col-md-12">
							<button type="submit" name="savebtn" class="btn btn-primary btn-addtocart">
								<span>Place an order</span>
							</button>
							</form>
							</div>
							
							</div>
						
						</div>
					</div>
				</div>
								
		</div>
	    </div>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$connect = mysqli_connect("localhost", "root", "", "fyp");

if (isset($_POST['savebtn'])) {
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $select_query = "SELECT * FROM add_to_cart WHERE username = '$username'";
        $result = mysqli_query($connect, $select_query);

        if ($result === false) {
            die(mysqli_error($connect));
        }

        $name = $_POST['received_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $town = $_POST['town_city'];
        $state = $_POST['state_province'];
        $zipcode = $_POST['zip_postalcode'];
        $cardname = $_POST['card_name'];
        $cardnumber = $_POST['card_number'];
        $cardexpire = $_POST['card_expire'];
        $cvv = $_POST['cvv'];

        // Perform validation against the dummy table
        $query = "SELECT COUNT(*) FROM dummy_table WHERE card_number = '$cardnumber' AND card_expire = '$cardexpire' AND cvv = '$cvv'";
        $result = mysqli_query($connect, $query);
        $numRows = mysqli_fetch_array($result)[0];

        if ($numRows > 0) {
            // Payment data matches the dummy table, proceed with insertion
            while ($cart_row = mysqli_fetch_array($result)) {
                $order_id = $cart_row['order_id'];
                $product_id = $cart_row['product_id'];
                $user_size = $cart_row['size'];
                $user_color = $cart_row['colour'];
                $user_quantity = $cart_row['quantity'];

                // Insert checkout record
                $sql = "INSERT INTO checkout(order_id, product_id, username, received_name, phone, address, town_city, state_province, zip_postalcode, card_name, card_number, card_expire, cvv)
                        VALUES ('$order_id', '$product_id', '$username', '$name', '$phone', '$address', '$town', '$state', '$zipcode', '$cardname', '$cardnumber', '$cardexpire', '$cvv')";

                $result = mysqli_query($connect, $sql);

                if (!$result) {
                    echo "Error inserting checkout record: " . mysqli_error($connect);
                    exit;
                }
            }

            // Update user details
            $update_query = "UPDATE users SET phone = '$phone', address = '$address', town_city = '$town', state_province = '$state', zip_postalcode = '$zipcode' WHERE username = '$username'";
            $result2 = mysqli_query($connect, $update_query);

            if (!$result2) {
                echo "Error updating user details: " . mysqli_error($connect);
                exit;
            }

            // Update product quantity
            while ($cart_row = mysqli_fetch_array($result)) {
                $order_id = $cart_row['order_id'];
                $product_id = $cart_row['product_id'];
                $user_size = $cart_row['size'];
                $user_color = $cart_row['colour'];
                $user_quantity = $cart_row['quantity'];

                $product_query = "SELECT product_details_id, product_quantity
                                  FROM product_details
                                  WHERE product_id = '$product_id' AND product_size = '$user_size' AND product_color = '$user_color'";
                $product_result = mysqli_query($connect, $product_query);

                if ($product_row = mysqli_fetch_array($product_result)) {
                    $product_details_id = $product_row['product_details_id'];
                    $product_quantity = $product_row['product_quantity'];
                    $new_product_quantity = $product_quantity - $user_quantity;

                    $update_query = "UPDATE product_details
                                     SET product_quantity = $new_product_quantity
                                     WHERE product_details_id = '$product_details_id'";

                    $update_result = mysqli_query($connect, $update_query);

                    if (!$update_result) {
                        echo "Error updating product quantity: " . mysqli_error($connect);
                        exit;
                    }
                }
            }

            // Clear the cart
            $delete_query = "DELETE FROM add_to_cart WHERE username = '$username'";
            $delete_result = mysqli_query($connect, $delete_query);

            if (!$delete_result) {
                echo "Error clearing cart: " . mysqli_error($connect);
                exit;
            }

            echo "<script>alert('Payment Successful.'); window.location.href = 'order-complete.php';</script>";
            exit;
        } else {
            echo "<script>alert('Card Details not matched.'); window.location.href = 'http://localhost/fyp/checkout.php';</script>";
            exit;
        }
    }
}

mysqli_close($connect);
?>


						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
	<!--Payment-->
	<script src="js/payment.js"></script>
	<script>
  document.getElementById("cc-exp").addEventListener("input", function (event) {
    var input = event.target;
    var trimmed = input.value.replace(/\s+/g, "");
    var formatted = trimmed.replace(/^(\d{2})\/?(\d{0,4})/, "$1/$2");
    input.value = formatted;
  });
</script>

<script>
    function populateCities() {
      var stateSelect = document.getElementById("state");
      var citySelect = document.getElementById("city");
      var state = stateSelect.value;
      var town = "<?php echo isset($town) ? $town : ''; ?>";

      // Clear city options
      citySelect.innerHTML = '<option value="">- Select City -</option>';

      if (state === "Johor") {
        // Add Johor cities
        var johorCities = ["Yong Peng", "Segamat", "Johor Bahru", "Tangkak", "Skudai", "Muar", "Kluang", "Pasir Gudang", "Kulai"];
        for (var i = 0; i < johorCities.length; i++) {
          var option = document.createElement("option");
          option.text = johorCities[i];
          option.value = johorCities[i];
          citySelect.add(option);
        }
      } else if (state === "Selangor") {
        // Add Selangor cities
        var selangorCities = ["Petaling Jaya", "Shah Alam", "Klang", "Puchong", "Cheras", "Rawang", "Semenyih", "Putrajaya", "Cyberjaya"];
        for (var i = 0; i < selangorCities.length; i++) {
          var option = document.createElement("option");
          option.text = selangorCities[i];
          option.value = selangorCities[i];
          citySelect.add(option);
        }
      } else if (state === "Melaka") {
        // Add Melaka cities
        var melakaCities = ["Ayer Keroh", "Alor Gajah", "Malacca City (Bandaraya Melaka)", "Klebang", "Jasin", "Batu Berendam", "Bukit Katil"];
        for (var i = 0; i < melakaCities.length; i++) {
          var option = document.createElement("option");
          option.text = melakaCities[i];
          option.value = melakaCities[i];
          citySelect.add(option);
        }
      } else if (state === "Pahang") {
        // Add Pahang cities
        var pahangCities = ["Kuantan", "Cameron Highlands", "Temerloh", "Raub", "Mentakab", "Pekan", "Kuala Lipis", "Gambang"];
        for (var i = 0; i < pahangCities.length; i++) {
          var option = document.createElement("option");
          option.text = pahangCities[i];
          option.value = pahangCities[i];
          citySelect.add(option);
        }
      } else if (state === "Negeri Sembilan") {
        // Add Negeri Sembilan cities
        var negerisembilanCities = ["Seremban", "Port Dickson", "Nilai", "Seri Menanti", "Bahau", "Kuala Pilah", "Rembau", "Gemas"];
        for (var i = 0; i < negerisembilanCities.length; i++) {
          var option = document.createElement("option");
          option.text = negerisembilanCities[i];
          option.value = negerisembilanCities[i];
          citySelect.add(option);
        }
      }

      // Set the selected city if it matches the previous selection
      if (town !== "") {
        citySelect.value = town;
      }
    }

    // Call the populateCities() function when the page loads
    window.onload = populateCities;
  </script>



</body>
</html>
