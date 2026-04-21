<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Drive - Singup Login</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<script src="./js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



	<div class="container-fluid ">
			<nav class="navbar navbar-expand-lg bg-body-tertiary shadow rounded mt-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DRIVE</a>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
      
        <button class="btn btn-primary ms-auto" id="login_btn">Login</button>
      
    </div>
  </div>
</nav>


			<div class="row mt-3 singup">
				
					<div class="col-md-4 border rounded shadow">
						
						<form>

							<center><h3 class="mt-2">Singup</h3></center>

					<div class="mb-3">
						
								<label for="username" class="form-label mt-2">Username</label>
  		<input type="text" id="username" class="form-control">
					</div>

  <div class="mb-3" id="singup_div">

    <label for="exampleInputEmail1" class="form-label mt-2">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">

    <div class="mt-2" id="otp_box">
    	<input type="number" id="otp" style="width:100px;" placeholder="OTP" >
    </div>
    <div id="loading" class="d-none"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>

    <div id="send_otp" class="btn btn-primary mt-2 d-none">Enter Otp </div>
  </div>
  <div class="mb-2">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password">
    	<button class="btn btn-danger mt-2">Generate</button>

  </div>
  
  <button type="submit" class="btn btn-primary w-100 mb-3 mt-4"  id="singup_btn">Submit</button>
</form>
					</div>

			</div>
	</div>







<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
  <div class="mb-3">
    <label for="login_user" class="form-label">Email address</label>
    <input type="email" class="form-control" id="login_user" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="login_password" class="form-label">Password</label>
    <input type="password" class="form-control" id="login_password">
  </div>
  
  
</form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary" id="login_user_btn">Login..</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>