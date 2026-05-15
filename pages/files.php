<?php

        require("../db.php");
        session_start();
        $email = $_SESSION['users'];
                    $fetch_data = $db->query("SELECT * FROM users WHERE email = '$email'");

                    $aa = $fetch_data->fetch_assoc();
                    $user_id = $aa['id'];

                    $username = $aa['name'];
                    $user_idd = $aa['id'];

                    $userId = "users_".$user_id;

                    $total_storage = $aa['total_storage'];

?>



<div class="row">

                                    <?php
                                        // print_r($userId);


                                                    $storage_data = $db->query("SELECT * FROM $userId");
                                                
                                                                
                                                    while($aa_data = $storage_data->fetch_assoc())
                                                    {

                                                        
                                                        // print_r($aa_data);
                                                         $file_name = $aa_data['file_name'];

            $file_info = pathinfo($file_name);

            $f_ext = $file_info['extension'];

            $pr_file_name = $file_info['basename'];

            


                                                        





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
                echo "<img src='../user_".$user_idd."/".$file_name."' class='thumb'>";
            }


                                                        echo '
                                                    </div>


                                                    <div class="">
                                                    <p>'.$file_name.'</p>

                                                    <hr>
                                            <div class="d-flex justify-content-around">
                <a href="../user_'.$user_idd.'/'.$file_name.'" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="../user_'.$user_idd.'/'.$file_name.'" target="_blank" download><i class="fa fa-download" aria-hidden="true"></i></a>
                <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </div>
                                                    </div>



                                                </div>

                                        ';  


                                                    }

                                                                                    ?>

                        

    </div>

