<?php
echo '<div class="mb-0  pb-0">
<footer class="pt-5 mb-0 px-4" style="background-color:black; color:white;">
  <div class="row">
    <div class="col-4">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2 my-2"><a href="#" class="nav-link p-0 " style="color:white;">Home</a></li>
        <li class="nav-item mb-2 my-2"><a href="#" class="nav-link p-0 " style="color:white;">Features</a></li>
        <li class="nav-item mb-2 my-2"><a href="#" class="nav-link p-0 " style="color:white;">Pricing</a></li>
        <li class="nav-item mb-2 my-2"><a href="#" class="nav-link p-0 " style="color:white;">FAQs</a></li>
        <li class="nav-item mb-2 my-2"><a href="#" class="nav-link p-0 " style="color:white;">About</a></li>
      </ul>
    </div>

    <div class="col-4">
      <h5>Top 5 Languages</h5>
      <ul class="nav flex-column">';
      $sql="SELECT category_name,category_id FROM `categories` LIMIT 5";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
       echo '<li class="nav-item mb-2 my-2"><a href="/codediscussion/threadlist.php?catid='.$row['category_id'].'" class="nav-link p-0 " style="color:white;" >' .substr($row['category_name'], 0, 20) . '</a></li>';
      }
    echo  '</ul>
    </div>
    <div class="col-4">
      <h5>Blogs</h5>
      <ul class="nav flex-column">';

      $sql="SELECT blog_name,blog_id FROM `blog` LIMIT 5";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
        echo '<li class="nav-item mb-2 my-2"><a href="/codediscussion/partials/blog?blogid='.$row['blog_id'].'" class="nav-link p-0 " style="color:white;" >' . substr($row['blog_name'], 0, 25) . '</a></li>';
      }
    echo  '</ul>
    </div>

  <div class="d-flex justify-content-between py-4 mt-4 border-top white">
    <p style="color: white;">&copy; 2022 codeDiscussion, Inc. All rights reserved.</p>
    <ul class="list-unstyled d-flex">
      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </div>
</footer>
</div>';