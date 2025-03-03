<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Sabari Car Rental Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Lato', sans-serif;
    }
    .banner-section {
        background: linear-gradient(to right, #007bff, #6610f2);
        color: white;
        padding: 50px 0;
        text-align: center;
    }
    .banner-content h1 {
        font-size: 2.5rem;
    }
    .section-header {
        margin-bottom: 40px;
    }
    .car-list .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .car-list .card:hover {
        transform: scale(1.05);
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<section class="banner-section">
  <div class="container">
    <h1>Find Your Perfect Ride</h1>
    <p>Best rental cars at unbeatable prices.</p>
  </div>
</section>
<!-- /Banners --> 

<!-- Featured Cars -->
<section class="container mt-5">
    <div class="section-header text-center">
        <h2>Our Featured <span>Cars</span></h2>
    </div>
    <div class="row car-list">
    <?php 
    $sql = "SELECT * FROM tblvehicles LIMIT 6";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    { ?>  
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="card-img-top" alt="image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlentities($result->VehiclesTitle);?></h5>
                    <p class="card-text">$<?php echo htmlentities($result->PricePerDay);?> / Day</p>
                    <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    <?php }} ?>
    </div>
</section>
<!-- /Featured Cars -->

<!-- Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer --> 

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
</body>
</html>
