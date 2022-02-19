<?php


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-0 small px-3 row">
<div class="container-fluid">
  <a class="navbar-brand" href="/index.php"><img src="partials/img/logo.jpg" alt="codediscussion" style="height:10vh;">codeDiscussion</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
 
      
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top 5 Languages
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="addblog.php">Add Blog</a></li>'; 
        $sql="SELECT category_name,category_id FROM `categories` LIMIT 5";
       $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_assoc($result)){
        echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';}
  echo '</ul>
  <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">contact</a>
      </li>';
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
     echo '<li class="nav-item">
      <a class="nav-link" href="addblog.php">Add blog</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="addcategory.php">Add category</a>
  </li>';}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo  '<form class="d-flex" action="/search.php" method="GET">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">

      <button class="btn btn-outline-success" type="submit">Search</button><h6  class="h6 small text-light text-center mx-2">
      WELCOME ' . $_SESSION['name'] . '</h6><a href="partials/logout.php" class="btn btn-outline-success ml-2">Logout</a></form>';
} else {
  echo '<form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button></form>
    <div class="mx-2">
    <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
}

echo '</div>
  </div>
</div>
</nav>';

include 'partials/login.php';
include 'partials/signup.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!  </strong> signup done
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Fail!  </strong> Try once again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>