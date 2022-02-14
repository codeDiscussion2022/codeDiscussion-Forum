<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $showerror = false;
    $showalert = false;
    include 'dbconnect.php';
    $user_email = $_POST["email"];
    $user_email = str_replace("<","&lt;",$user_email);
    $user_email = str_replace(">","&gt;",$user_email);


    $password = $_POST["password"];
    $password = str_replace("<","&lt;",$password);
    $password = str_replace(">","&gt;",$password);


    $cpassword = $_POST["cpassword"];
    $cpassword = str_replace("<","&lt;",$cpassword);
    $cpassword = str_replace(">","&gt;",$cpassword);


    $firstname = $_POST["firstname"];
    $firstname = str_replace("<","&lt;",$firstname);
    $firstname = str_replace(">","&gt;",$firstname);


    $lastname = $_POST["lastname"];
    $lastname = str_replace("<","&lt;",$lastname);
    $lastname = str_replace(">","&gt;",$lastname);


    $mobileno = $_POST["mobileno"];
    $mobileno = str_replace("<","&lt;",$mobileno);
    $mobileno = str_replace(">","&gt;",$mobileno);


    // check whether this username existlist
    $exists=false;
$existsql="SELECT * FROM `users` WHERE email='$user_email';";
$existresult=mysqli_query($conn,$existsql);
$numexistrows=mysqli_num_rows($existresult);
if($numexistrows>0){
    $exists=true;
}
else{
    $exists=false;
    if (($password == $cpassword)) {
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`password`, `email`, `mobileno`, `first_name`, `last_name`) VALUES ('$hash', '$user_email', '$mobileno', '$firstname', '$lastname');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showalert = true;
            header("Location:/codediscussion/index.php?signupsuccess=true");
            exit();
        }
    }
    else{
        $showerror=true;
       
    }
} header("Location:/codediscussion/index.php?signupsuccess=false");
}
?>