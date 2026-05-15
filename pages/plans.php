	<?php


	session_start();
	$email = $_SESSION['users'];


	?>


<!DOCTYPE html>
<html>
<head>
    
    <title>Bootstrap Card Design</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <div class="bg-primary text-white text-center py-4">

                    <h2 class="fw-bold mb-1">
                        Silver Plan
                    </h2>

                    <h1 class="fw-bold pur_value">
                        ₹499
                    </h1>

                    <p class="mb-0">
                        Per Month
                    </p>

                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            100Mb Access
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Free Support
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Daily Updates
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Features
                        </li>

                    </ul>

                    <!-- Button -->
                    <div class="d-grid mt-4">

                        <button class="btn btn-primary btn-lg rounded-pill buy_plan">
                            Buy Now
                        </button>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-md-4">
        	 <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <div class="bg-warning  text-dark text-center py-4">

                    <h2 class="fw-bold mb-1">
                        Gold Plan
                    </h2>

                    <h1 class="fw-bold pur_value">
                        ₹999
                    </h1>

                    <p class="mb-0">
                        Per Month
                    </p>

                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Unlimited Access
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Free Support
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Daily Updates
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Premium Features
                        </li>

                    </ul>

                    <!-- Button -->
                    <div class="d-grid mt-4">

                        <button class="btn btn-primary btn-lg rounded-pill buy_plan">
                            Buy Now
                        </button>

                    </div>

                </div>

            </div>
        </div>

        <div class="col-md-4">
        	 <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <div class="bg-danger text-white text-center py-4">

                    <h2 class="fw-bold mb-1">
                        Premium Plan
                    </h2>

                    <h1 class="fw-bold pur_value">
                        ₹1499
                    </h1>

                    <p class="mb-0">
                        Per Month
                    </p>

                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Unlimited Access
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Free Support
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Daily Updates
                        </li>

                        <li class="list-group-item border-0 py-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Premium Features
                        </li>

                    </ul>

                    <!-- Button -->
                    <div class="d-grid mt-4">

                        <button class="btn btn-primary btn-lg rounded-pill buy_plan">
                            Buy Now
                        </button>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

<script>

$(document).ready(function(){

    $(".buy_plan").click(function(){

        var priceText = $(this).closest(".card").find(".pur_value").text();
        var amount = parseInt(priceText.replace("₹","")) * 100;

        var options = {
            "key": "rzp_test_xxxxxxxx",
            "amount": amount,
            "currency": "INR",
            "name": "NetGen Pvt Ltd",
            "description": "Plan Purchase",

            "handler": function (response) {
                alert("Payment Success: " + response.razorpay_payment_id);
                console.log(response);
            },

            "prefill": {
                "name": "<?php echo $email; ?>",
                "email": "test@gmail.com",
                "contact": "9999999999"
            },

            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();

    });

});

</script>






</body>
</html>
