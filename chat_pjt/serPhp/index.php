<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_escape_string($conn,$_POST['f-name']);
    $lname = mysqli_escape_string($conn,$_POST['l-name']);
    $email = mysqli_escape_string($conn,$_POST['email']);
    $password = mysqli_escape_string($conn,$_POST['pass']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(isset($email)){
            $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){
                echo "This $email is already exist";
            }
            else{
                if(isset($_FILES['choose'])){
                    $img_name = $_FILES["choose"]['name'];
                    $img_type = $_FILES["choose"]['type'];
                    $tmp_name = $_FILES["choose"]['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png','jpeg','jpg'];
                    if(in_array($img_ext,$extensions) === true){
                        $time = time();

                        $new_img_name = $time.$img_name;

                        if(move_uploaded_file($tmp_name,"../user_image/".$new_img_name)){
                            $status = "Active";
                            $random_id = rand(time(),10000000);

                            $sql2 = mysqli_query($conn,"INSERT INTO `users` (`unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`)
                                                                    VALUES ('$random_id', '$fname', '$lname', '$email', '$password', '$new_img_name', '$status')");
                            if($sql2){
                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                            else{
                                echo "Something went wrong!";
                            }
                        }
                    }
                    else{
                        echo "Please select an Image file with jpeg,jpg or png!";
                    }
                }
            }
        }
        else{
            echo "$email - This email is not valid!";
        }
    }
    else{
        echo "All input field are required!";
    }
?>