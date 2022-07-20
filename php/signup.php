<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $password = password_hash($pass,PASSWORD_BCRYPT);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //checking if email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //checking if email is already exist in database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(!mysqli_num_rows($sql) > 0){ //email not exist in database
                //checking if user uploaded file or not
                if(isset($_FILES['image'])){ //if file is uploaded
                    $img_name = $_FILES['image']['name'];
                    // $img_type = $_FILES['image']['type'];
                    $temp_name = $_FILES['image']['tmp_name'];

                    //spliting the image name into 2 parts name and extention
                    $img_split = explode(".", $img_name);
                    $img_ext = end($img_split);   //got the extention of file

                    $extentions = ['png', 'jpg', 'jpeg'];
                    if(in_array($img_ext, $extentions) == true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($temp_name, "images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            //inserting user data into database
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }else{
                                echo "Something Went Wrong!";
                            }
                        }
                    
                    }else{
                    echo "Please Select a file of extentions:(jpeg, png, jpg)";
                    }
                
                }else{
                    echo "Please Select an Image file!";
                }
            
            }else{
                echo "$email - This Email Already Exist!";
            }
        
        }else{
            echo "$email - This is not valid Email";
        }
    
    }else{
        echo "All input field are required";
    }
?>