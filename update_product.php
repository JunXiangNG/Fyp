<?php
    include 'config.php';
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="admin_dashboard.html"><img class="main-logo" src="#" alt="" /></a>
                <strong><img src="#" alt="" /></strong>
            </div>
            <div class="nalika-profile">
    <div class="profile-dtl">
        <?php
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        
        // Retrieve the logged-in admin's ID from the session
        $adminId = $_SESSION['admin_id']; // Replace 'admin_id' with the actual session variable name
        
        $query = "SELECT admin_image, admin_username FROM admin WHERE admin_id = $adminId";
        $result = mysqli_query($conn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $adminImage = $row['admin_image'];
            $adminUsername = $row['admin_username'];
            
            // Display the admin image
            echo '<a href="#"><img src="data:image/jpeg;base64,'.base64_encode($adminImage).'" alt="" /></a>';
        } else {
            // If admin image not found, display a default image or error message
            echo '<a href="#"><img src="img/default_admin_image.jpg" alt="" /></a>';
        }
        
        // Free the result
        mysqli_free_result($result);
        ?>
        <h2><?php echo $adminUsername; ?></h2>
    </div>
    <div class="profile-social-dtl">
        <ul class="dtl-social">
            <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
            <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
            <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
        </ul>
    </div>
</div>



            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a href="admin_dashboard.php">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span href="admin_dashboard.php">Admin Dashboard</span>
								</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Product</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="File Manager" href="product_list.php"><span class="mini-sub-pro">Product List</span></a></li>
                                <li><a title="File Manager" href="add_brand.php"><span class="mini-sub-pro">Add Brand</span></a></li>
                                <li><a title="Blog" href="add_product.php"><span class="mini-sub-pro">Add Product</span></a></li>
                                <li><a title="Blog Details" href="update_product.php"><span class="mini-sub-pro">Update Product</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-forms icon-wrap"></i> <span class="mini-click-non">Order</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Basic Form Elements" href="#"><span class="mini-sub-pro">Order List</span></a></li>
                                <li><a title="Advance Form Elements" href="#"><span class="mini-sub-pro">Order Approvement</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">My Profile</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="#"><span class="mini-sub-pro">My Profile</span></a></li>
                                <li><a title="Data Maps" href="#"><span class="mini-sub-pro">Update Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-table icon-wrap"></i> <span class="mini-click-non">User</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Peity Charts" href="user_list.php"><span class="mini-sub-pro">User List</span></a></li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>


    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="admin_dashboard.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
												<form role="search" class="">
													<input type="text" placeholder="Search..." class="form-control">
													<a href=""><i class="fa fa-search"></i></a>
												</form>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-88 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>
															<span class="admin-name"><?php echo $adminUsername; ?></span>
															<i class="icon nalika-down-arrow nalika-angle-dw nalika-icon"></i>
														</a>
                                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                            <li><a href="admin_profile.php"><span class="icon nalika-user author-log-ic"></span> My Profile</a>
                                                            </li>
                                                            <li><a href="logout.php"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                            </li>
                                                        </ul>                                         
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-ctn">
												<h2>Update Product</h2>
												<p>Welcome to 4M Online Shoes <span class="bread-ntd">Admin Dashboard</span></p>
											</div>
										</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Update Product</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                        <?php
                                            // Connect to the database
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "fyp";

                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }

                                            if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["product_details_id"])) {
                                                $product_details_id = $_GET["product_details_id"];

                                            // Retrieve product details from the database
                                            $sql = "SELECT pd.product_details_id, pd.product_id, pd.product_status, pd.product_size, pd.product_price, pd.product_quantity, pd.product_gender, pd.product_color, pd.product_image, p.product_name, b.brand_name
                                                    FROM product_details pd
                                                    INNER JOIN product p ON pd.product_id = p.product_id
                                                    INNER JOIN brand b ON p.brand_id = b.brand_id
                                                    WHERE pd.product_details_id = '$product_details_id'";

                                             $result = $conn->query($sql);

                                            if ($result === false) {
                                                die("Error: " . $conn->error);
                                            }

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $product_details_id = $row['product_details_id'];
                                                $product_status = $row['product_status'];
                                                $product_size = $row['product_size'];
                                                $product_price = $row['product_price'];
                                                $product_quantity = $row['product_quantity'];
                                                $product_gender = $row['product_gender'];
                                                $product_color = $row['product_color'];
                                                $product_name = $row['product_name'];
                                                $brand_name = $row['brand_name'];

                                                // Display the form with current data
                                        ?>
                                                    <form method="post" action="fupdate_product.php?product_details_id=<?php echo $product_details_id; ?>" enctype="multipart/form-data">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="review-content-section">
                                                                <p>Product Name</p>
                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="false"></i></span>
                                                                    <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?php echo $brand_name . ' ' . $product_name; ?>" readonly>
                                                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                                                    <input type="hidden" name="product_details_id" value="<?php echo $product_details_id; ?>">
                                                                </div>
                                                                <p>Product Status</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="false"></i></span>
                                                                <select class="form-control" name="product_status" required>
                                                                    <option value="ACTIVE" <?php if ($product_status === "ACTIVE") echo "selected"; ?>>Active</option>
                                                                    <option value="INACTIVE" <?php if ($product_status === "INACTIVE") echo "selected"; ?>>Inactive</option>
                                                                </select>
                                                            </div>
                                                            <p>Product Size</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                                <input type="number" class="form-control" name="product_size" placeholder="Product Size" value="<?php echo $product_size; ?>" readonly>
                                                            </div>
                                                            <p>Product Price</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                                <input type="number" class="form-control" name="product_price" placeholder="Product Price" value="<?php echo $product_price; ?>" required>
                                                            </div>
                                                            <p>Product Quantity</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                                <input type="number" class="form-control" name="product_quantity" placeholder="Product Quantity" value="<?php echo $product_quantity; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="review-content-section">
                                                            <p>Product Gender</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="false"></i></span>
                                                                <select class="form-control" name="product_gender" required>
                                                                    <option value="Men" <?php if ($product_gender === "Men") echo "selected"; ?>>Men</option>
                                                                    <option value="Women" <?php if ($product_gender === "Women") echo "selected"; ?>>Women</option>
                                                                </select>
                                                            </div>
                                                            <p>Product Color</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="false"></i></span>
                                                                <input type="text" class="form-control" name="product_color" placeholder="Product Color" value="<?php echo $product_color; ?>" readonly>
                                                            </div>
                                                            <p>Product Image</p>
                                                            <div class="input-group mg-b-pro-edt">
                                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="false"></i></span>
                                                                <input type="file" accept="image/*" class="form-control" name="product_image" onchange="previewImage(event)">
                                                                <div id="preview-container" class="preview-container">
                                                                    <?php
                                                                        // Display the image from the database, if available
                                                                        if (!empty($row['product_image'])) {
                                                                            $imageData = base64_encode($row['product_image']);
                                                                            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                                                                            echo '<img src="' . $imageSrc . '" style="width: 188px; height: 188px;">';
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>           
                                    </form>
                                    <?php
                                } else {
                                    echo "No product found.";
                                }
                            }

                            $conn->close();
                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>


