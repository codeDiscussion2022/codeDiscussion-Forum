<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showerror = false;
    $showalert = false;
    include 'dbconnect.php';
    $loginuser_email = $_POST["loginemail"];
    $loginuser_email = str_replace("<","&lt;",$loginuser_email);
    $loginuser_email = str_replace(">","&gt;",$loginuser_email);

    $loginpassword = $_POST["loginpassword"]; 
    $loginpassword = str_replace("<","&lt;",$loginpassword);
    $loginpassword = str_replace(">","&gt;",$loginpassword);

    // check whether this username existlist
    $existsql = "SELECT * FROM `users` WHERE email='$loginuser_email';";
    $existresult = mysqli_query($conn, $existsql);
    $num = mysqli_num_rows($existresult);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($existresult);
        echo var_dump($row);
        if (password_verify($loginpassword, $row['password'])) {
            session_start();
            $name = $row['first_name'] . " " . $row['last_name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $name;
            header("Location:/index.php");
            exit();
        } else {
            header("Location:/index.php?login=false");
        }
    } else {
        // echo "unable";
    }
}
?>