<!-- <?php

	session_start();

	if(!empty($_SESSION['users']))
	{	

		$user = $_SESSION['users'];
	}
	else
	{
	}

?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="profile.CSS">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<title>profile</title>
</head>
<body>


	<div class="container-fluid border">
		
		<div class="row">
			<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DRIVE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
       
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-danger" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>
		</div>


		<div class="row mt-2">
			

			<div class="col-md-3 border left">
						<div class="profile_box mt-4">

						<div class="profile">
						<form id="profileForm" enctype="multipart/form-data">
    <input type="file" name="profile_pic" class="profile_pic">
</form>
								<i class="fa fa-user" aria-hidden="true"></i>
									
						</div>


						</div>
						<h1 class="ms-5">Username</h1>
						<button class="btn btn-primary rounded shadow"> upload  files</button>

						<div class="btn btn-primary mt-4 p-0">
							<div class="used_strge rounded">0 MB</div>
						</div>

						<p class="storage_info text-center">0/5mb</p>

			</div>
			<div class="col-md-9 border right">
					

					<p class="mt-4">
						



					</p>	

			</div>
		</div>


	</div>



<script>
	
	$(document).ready(function(){
    $(".profile_pic").on('change', function(){

        var formData = new FormData($("#profileForm")[0]);

        $.ajax({
            type: "POST",
            url : "../php/profile_upload.php",
            data : formData,
            contentType : false,
            processData : false,

            success:function(response)
            {
                alert(response);
            } 
        });
    });
});
</script>

</body>
</html>


