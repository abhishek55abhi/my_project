<?php
include 'connection.php';
$error = array();

if (isset($_POST) && !empty($_POST)) { //check if form was submitted
    if (empty($_POST['name'])) {
        $error[] = "Name is required";
         // check name only contains letters and whitespace
    } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
            $error[] = "Name only letters and white space allowed";
    }else{
        $name = valid_input($_POST['name']);
    }

    /* email***************** */
    if (empty($_POST["email"])) {
        $error[] = "Email is required";
    } else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
     //Valid email!
             $error[] = "Invalid email format";
          }else{
        $email = $_POST["email"];
        // check if e-mail address syntax is valid or not     
    }
    /* company name************** */
    if (empty($_POST['comp_name'])) {
        $error[] = "Company Name is required";
    } else if (!preg_match("/^[A-Za-z_][A-Za-z\d_]*$/", $_POST['comp_name'])) {
            $error[] = "Company Name only letters and white space allowed";
        } else {
        $comp_name = valid_input($_POST['comp_name']);
        
    }
    /* Address************************** */
    if (empty($_POST['address'])) {
        $error[] = "Address is required";
        // check name only contains letters and whitespace
    }else{
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        
        
    }
    /*     * ********image */
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    $img_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    if (empty($_FILES['image']['name'])) {
        $error[] = "Image is required";
    } else if (!in_array($img_extension, $allowed_image_extension)) {
        $error[] = "Upload valiid images. Only PNG and JPEG  And JPG are allowed.";
    } else {
        $image = valid_input($_FILES['image']['name']);
        // check name only contains letters and whitespace
    }

    $sig_extension = pathinfo($_FILES["signature"]["name"], PATHINFO_EXTENSION);
    if (empty($_FILES['signature']['name'])) {
        $error[] = "Signature is required";
    } else if (!in_array($sig_extension, $allowed_image_extension)) {
        $error[] = "Upload valiid images. Only PNG and JPEG are allowed.";
    } else {
        $signature = valid_input($_FILES['signature']['name']);
        // check name only contains letters and whitespace
    }



    if (empty($error)) {
        $sql = "INSERT INTO information(name,email,comp_name,address,image,signature)VALUES('$name','$email','$comp_name','$address','$image','$signature')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            header("Location: http://localhost/accordion/showdata.php?id=$last_id");
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else {
            session_start();
            $_SESSION['value'] = $error;
            $_SESSION['data'] = $_POST;
            $_SESSION['file_data'] = $_FILES;
            header("Location: http://localhost/accordion/indexForm.php");
        
             
        
    }
}
function valid_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>