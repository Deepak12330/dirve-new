<?php

	require("../php/db.php");
	session_start();

	if(!empty($_SESSION['users']))
	{	

		$user = $_SESSION['users'];
		$fetch_data = "SELECT * FROM profile_data WHERE email = '$user'";
		$response_data = $db->query($fetch_data);
		$data_array = $response_data->fetch_assoc();
		$userEmail = $data_array['username'];
		$profiledata_pic = $data_array['profile_pic'];
		$used_storage = $data_array['used_storage'];
		$total_storage = $data_array['total_storage'];
		$used_percentage = ($used_storage/$total_storage)*100;



	}
	else
	{
		echo "session is not started";
	}

?>

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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<title>profile</title>

	<style>
		.thumb 
{
	width:75px;
	height:75px;

}
	</style>
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
								<!-- <i class="fa fa-user" aria-hidden="true"></i> -->
								<img src="../profile_pics/<?php echo $profiledata_pic; ?>" style="width:170px; height:170px; border-radius:50%; object-fit:cover; margin-top:-20px;">
									
						</div>


						</div>
						<h1 class="ms-5"><?php echo $userEmail ?></h1>
						
						<form class="p-0" id="upload_files_form">

							<div class="btn btn-primary p-0 m-0 w-80"> 
									<input type="file" name="upload_files" style="opacity:" class="upload__files">
							</div>
							
						</form>

						<div class="btn btn-primary mt-4 p-0">
							<div class="used_strge rounded" style="width:<?php echo $used_percentage; ?>%;
	background-color: red;
	margin: 0;">

<?php echo $used_percentage?>%
		</div>
						</div>

						<p class="storage_info text-center"><?php echo $used_storage?>MB / <?php echo $total_storage?>  MB</p>

			</div>
			<div class="col-md-9 border right">
					

					<p class="mt-4">

							<div class="row">

						
						<?php

							$dataEmail = $_SESSION['users'];
							$fetchdata = "SELECT * FROM profile_data WHERE email = '$dataEmail'";

							$data_query = $db->query($fetch_data);

							$responseData = $data_query->fetch_assoc();

							$users_id = $responseData['id'];

							$newDatausers = "SELECT * FROM users_$users_id";
							$responseData_users = $db->query($newDatausers);
							
							 while($final_array = $responseData_users->fetch_assoc())

							 {
							 		$file_name = $final_array['file_name'];
							 		$file_info = pathinfo($file_name);
							 		$f_ext = $file_info['extension'];
							 		$pr_file_name = $file_info['basename'];
							 		// print_r($file_ex);


							 		echo '

							 				<div class="col-md-4 d-flex align-items-center mt-2">
							 					<div style="margin-right:10px;">';

							 					 if ($f_ext == "mp4") {
            echo "<img src='../logos/mp4.png' class='thumb'>";
        }
        else if ($f_ext == "mp3") {
            echo "<img src='../logos/mp3.png' class='thumb'>";
        }
        else if ($f_ext == "pdf") {
            echo "<img src='../logos/pdf.png' class='thumb'>";
        }
        else if ($f_ext == "docx" || $f_ext == "doc") {
            echo "<img src='../logos/doc.png' class='thumb'>";
        }
        else if ($f_ext == "xlsx" || $f_ext == "xls") {
            echo "<img src='../logos/xls.png' class='thumb'>";
        }
        else if ($f_ext == "pptx" || $f_ext == "ppt") {
            echo "<img src='../logos/ppt.png' class='thumb'>";
        }
        else if ($f_ext == "zip") {
            echo "<img src='../logos/zip.png' class='thumb'>";
        }
        else if ($f_ext == "txt") {
            echo "<img src='../logos/txt.png' class='thumb'>";
        }
        else if ($f_ext == "mov") {
            echo "<img src='../logos/mov.png' class='thumb'>";
        }
        else if ($f_ext == "wmv") {
            echo "<img src='../logos/wmv.png' class='thumb'>";
        }
        else if ($f_ext == "jpg" || $f_ext == "jpeg" || $f_ext == "png" || $f_ext == "gif") {
            echo "<img src='../user_".$users_id."/".$file_name."' class='thumb'>";
        }


							 						echo '
							 					</div>


							 					<div class="">
							 					<p>'.$file_name.'</p>

							 					<hr>
							 			<div class="d-flex justify-content-around">
			<a href="../user_'.$users_id.'/'.$file_name.'" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
			<a href="../user_'.$users_id.'/'.$file_name.'" target="_blank" download><i class="fa fa-download" aria-hidden="true"></i></a>
			<i class="fa fa-trash" aria-hidden="true"></i>
							 						</div>
							 					</div>



							 				</div>

							 		';							 		
							 }






						?>

</div>
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



    $(".upload__files").on('change',function(){
    	var form_data = new FormData($("#upload_files_form")[0]);

    	$.ajax({
    		type: "POST",
    		url : "../php/upload_files.php",
    		data : form_data,
    		contentType : false,
    		processData : false,

    		success:function(response){
    				console.log(response);

    		}
    		
    	})
    })
});
</script>

</body>
</html>




