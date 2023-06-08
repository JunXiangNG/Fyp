<!DOCTYPE html>
<html lang="en">
<title>Profile</title>
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
	

	<style>
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  label {
    margin-bottom: 10px;
	font-size:15px;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="date"],
  input[type="password"] {
    width: 300px;
    padding: 5px;
    margin-bottom: 15px;
  }
  
  input[type="radio"] {
    margin-right: 10px;
	font-size:15px;
  }
  
  input[type="submit"] {
    width: 120px;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
	border-radius:20px;
  }
  
  input[type="submit"]:hover {
    background-color: #45a049;
  }
.input-field
{
	border-radius:20px;
	margin-left:5px;
}
.password-container {
  		position: relative;
		
		}
		
#formContainer {
      display: none;
    }
select{
	width:300px;
	height:44px;
}	

</style>
	</head>

	<body>

    
	<?php
// Start session
session_start();

// Connect to database
include("dataconnection.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
  // Redirect to login page
  header('Location: login.php');
  exit();
}

// Check if user has submitted the form
if (isset($_POST['submit'])) {
  // Retrieve form data
  $id = $_POST['id'];
  $username = $_POST['username'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $email = $_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $town=$_POST['town_city'];
  $state=$_POST['state_province'];
  $zipcode=$_POST['zip_postalcode'];

  // Check if email already exists in the database
  $result = mysqli_query($connect, "SELECT user_id FROM users WHERE email='$email' AND user_id != $id");
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    // Display error message
    echo "<script>alert('Email already exists in the database. Please choose a different email.')</script>";
  } else {
    // Update user data in the database
    $result = mysqli_query($connect, "UPDATE users SET username='$username', gender='$gender', birthday='$birthday', email='$email',phone='$phone',address='$address',town_city='$town',state_province='$state',zip_postalcode='$zipcode' WHERE user_id=$id");

    if ($result) {
      // Display success message
	  echo "<script>alert('Details Succesful updated.Login again to check the updated information.');window.location.href = 'logout.php';</script>";
    
    } else {
      // Display error message
      echo "<script>alert('Failed to update user details.');</script>" . mysqli_error($connect);
    }

    // Check if the password checkbox is checked
    if (isset($_POST['change_password'])) {
      $password = md5($_POST['password']);
      $cpassword = md5($_POST['cpassword']);

      // Check if the new password and confirm password match
      if ($password === $cpassword) {
        // Update user password in the database
        $result = mysqli_query($connect, "UPDATE users SET password='$password' WHERE user_id=$id");

        if ($result) {
          // Display success message
          echo "<script>alert('Password updated successfully.');window.location.href = 'logout.php';</script>";
        } else {
          // Display error message
          echo "<script>alert('Failed to update password.');window.location.href = 'profile.php';</script>" . mysqli_error($connect);
        }
      } else {
        // Display error message if the new password and confirm password do not match
        echo "<script>alert('New password and confirm password do not match.');window.location.href = 'profile.php';</script>";
      }
    }
  }
}

// Retrieve user data from the database
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


  ?>

<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="http://localhost/fyp/user_home_page.php">4M Online Sport Shoe Store</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
						<form action="http://localhost/fyp/search.php" class="search-wrap" method="GET">
						<div class="form-group">
							<input type="search" name="search" required value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control search" placeholder="Search product">
							<button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
						</div>
					</form>

						
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="http://localhost/fyp/user_home_page.php">Home</a></li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/men.php">Men</a>
									<ul class="dropdown">
										<li><a href="#">Nike</a></li>
										<li><a href="#">Adidas</a></li>
									
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/women.php">Women</a>
									<ul class="dropdown">
									    <li><a href="#">Nike</a></li>
										<li><a href="#">Adidas</a></li>
										
									
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
								$result = mysqli_query($connect, "select * from add_to_cart WHERE username = '$username'");	
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

				
			<form method="POST" action="profile.php"onsubmit="return validateForm();">
      <fieldset>
        <h1>User Profile</h1>
		<label>Email :</label>
        <input type="email" name="email" class="input-field" value="<?php echo $email; ?>"readonly>
        <br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		<br>
        <label>Username :</label>
        <input type="text" name="username" class="input-field" value="<?php echo $username; ?>"><br><br>
        <label>Gender :<?php echo "\t\t$gender" ?></label><br>
        <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; else if (!$gender) echo "checked"; ?>>Male<br>
        <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; else if (!$gender) echo "checked"; ?>>Female<br><br>
        <label>Birthday :</label>
        <input type="date" name="birthday" min="1963-01-01" max="2005-01-01" class="input-field" value="<?php echo $birthday; ?>"><br><br>

        <input type="checkbox" name="change_password" id="change-password-checkbox" onchange="togglePasswordFields()"> Change Password<br><br>
		
        <div id="password-fields" style="display: none;">
          <label>New Password :</label>
          <input type="password" name="password" id="password" class="input-field password-container"  pattern="(?=.*[@#!$*()])(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Password must contain at least 8 characters and at least 1 Alphabet and 1 Special Character"><br><br>
			
			<p id="message" style="display:none; font-weight: bold;" >Password is <span id="strenght"></span></p>

          <label>Confirm Password :</label>
          <input type="password" name="cpassword" class="input-field" id="confirm-password"><br><br>
        </div>

		<input type="checkbox" name="set_address" id="set_address-checkbox" onchange="toggleAddressFields()">  Billing Address<br><br>
		<div id="address-fields" style="display: none;">
							<div class="form-group">
							<label for="phonenumber">Phone Number :</label>
							<input type="text" name="phone"class="input-field" placeholder="Phone Number" pattern="\d{3}-\d{8}" title="Please enter a correct phone number in the format , for example: 011-26126335"value="<?php echo $phone; ?>" >

						</div>
						<div class="form-group">
							<label for="address">Address :</label>
							<input type="text" name="address" class="input-field" placeholder="Address" pattern="^[0-9]+(, )?.+" title="Please enter a correct address in the format , for example: 26, jalan ah looh" value="<?php echo $address; ?>" >

						</div>
					
							
								<div class="form-group">
                <body onload="populateCities()">

<div class="form-group">
  <label for="state">Select State:</label>
  <select id="state" name="state_province" class="input-field" onchange="populateCities()">
    <option value="">- Select State -</option>
    <option value="Johor" <?php if ($state == "Johor") echo "selected"; ?>>Johor</option>
    <option value="Selangor" <?php if ($state == "Selangor") echo "selected"; ?>>Selangor</option>
    <option value="Melaka" <?php if ($state == "Melaka") echo "selected"; ?>>Melaka</option>
    <option value="Pahang" <?php if ($state == "Pahang") echo "selected"; ?>>Pahang</option>
    <option value="Negeri Sembilan" <?php if ($state == "Negeri Sembilan") echo "selected"; ?>>Negeri Sembilan</option>
    <!-- Add more state options here -->
  </select>
</div>

<div class="form-group">
  <label for="city">Select City:</label>
  <select id="city" name="town_city" class="input-field" value="<?php echo $town; ?>">
    <option value="">- Select City -</option>
  </select>
</div>
						
						<div class="form-group">
							<label for="zipcode">Zip Code</label>
							<input type="text" name="zip_postalcode" class="input-field" placeholder="Zip Code" pattern="[0-9]{5}" title="Please enter a correct zip code for example: 83700"value="<?php echo $zipcode; ?>"   >
						</div>
					</div>
					
        <input type="submit" name="submit" value="Save"><br>
      </fieldset>
    </form>
  </div>



<?php } ?>




	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
    
  <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
   <!-- popper -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.js"></script>
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
  
	<script>
				var pass =document.getElementById("password");
				var msg =document.getElementById("message");
				var str =document.getElementById("strenght");
				var uppercaseRegex = /[A-Z]/;
                var punctuationRegex = /[!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/;
				pass.addEventListener('input',() => {
					if(pass.value.length  > 0){
						
						msg.style.display="block";
					}
					else{
						msg.style.display="none";
					}
					if(pass.value.length < 4){
						str.innerHTML = "weak";
						pass.style.bordercolor="#ff5925";
						msg.style.color="#ff5925";
					}
					else if(pass.value.length >= 4 && pass.value.length <8 && uppercaseRegex.test(pass.value)){
						str.innerHTML = "medium";
						pass.style.bordercolor="gold";
						msg.style.color="gold";
					}
					else if (pass.value.length >=8 && uppercaseRegex.test(pass.value) && punctuationRegex.test(pass.value)) {
					str.innerHTML ="strong";
					pass.style.bordercolor="#26d730";
					msg.style.color="#26d730";
				}
				
				})
				</script>
	<script>
    function togglePasswordFields() {
      var passwordFields = document.getElementById("password-fields");
      var changePasswordCheckbox = document.getElementById("change-password-checkbox");

      if (changePasswordCheckbox.checked) {
        passwordFields.style.display = "block";
      } else {
        passwordFields.style.display = "none";
      }
    }
  </script>

  <script>
    function toggleAddressFields() {
      var AddressFields = document.getElementById("address-fields");
      var SetaddressCheckbox = document.getElementById("set_address-checkbox");

      if (SetaddressCheckbox.checked) {
        AddressFields.style.display = "block";
      } else {
        AddressFields.style.display = "none";
      }
    }
  </script>

   <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm-password").value;

      if (password !== confirmPassword) {
        alert("New password and confirm password do not match.");
        return false; // Prevent form submission
      }

      return true; // Allow form submission
    }
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
