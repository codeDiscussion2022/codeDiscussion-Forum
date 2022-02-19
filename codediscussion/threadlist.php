<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/partials/footers.css" rel="stylesheet">
    <title>codeDiscussion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">
    <!-- Bootstrap core CSS -->
    <link href="/partials/bootstrap.min.css" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
</head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?> <?php
                                          $id = $_GET['catid'];
                                          $showresult = false;
                                          if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                            $thread_name = $_SESSION['name'];
                                            $thread_title = $_POST['thread_title'];
                                            $thread_description = $_POST['thread_description'];
                                            $thread_title = str_replace("<", "&lt;", $thread_title);
                                            $thread_title = str_replace(">", "&gt;", $thread_title);
                                            $thread_description = str_replace("<", "&lt;", $thread_description);
                                            $thread_description = str_replace(">", "&gt;", $thread_description);
                                            $sql = "INSERT INTO `threads` (`thread_title`, `thread_cat_id`,`thread_description`,`thread_name`) VALUES ('$thread_title', '$id','$thread_description','$thread_name');";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                              $showresult = true;
                                            }
                                          }
                                          if ($showresult) {
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> Success! </strong> Your thread has been added ! Please wait for community to respond
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                                          }
                                          $sql = "SELECT * FROM `categories` WHERE category_id=$id";
                                          $result = mysqli_query($conn, $sql);
                                          while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<div class="container mt-3 ">
    <div class="p-2 mb-4 bg-light rounded-3">
      <div class="container-fluid py-2">
        <h1 class="display-5 fw-bold text-center my-3">Welcome to ' . $row['category_name'] . '</h1>
        <img src="partials/img/card'.$id.'.jpg" alt="" style="width:80vw;">
        <p class=" fs-4">' . $row['category_description'] . '</p>
       
    </div>
    </div>';
                                          }
                                          ?> <div class="container my-3 mx-3">
        <h1 class="text-center my-4 mx-4">Browse Questions</h1>
        <div class="container my-4">
            <div class="col-md-8">
                <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo   '<div class="h-100 p-5 bg-light border rounded-3">
                    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                        <div class="mb-3">
                            <label for="thread_title" class="form-label">Problem Title</label>
                            <input type="text" class="form-control" id="thread_title" aria-describedby="thread_title"
                                name="thread_title">
                            <div id="Help" class="form-text">Keep your title as crisp and short as possible.</div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Elaborate your problem</span>
                            <textarea class="form-control" aria-label="thread_description" id="thread_description"
                                name="thread_description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </form>
                </div>';
        } else {
          echo '<div class="p-5 mb-4 bg-light rounded-3">
                  <div class="container-fluid py-2">
                    <h1 class="display-5 fw-bold">Please Log In</h1>
                    <p class="col-md-8 fs-4">for contrubute in discussion please logged in</p>
                  </div>
                </div>';
        }
        ?>
            </div>
        </div>
        <div class="container">
            <?php
      $noquestion = true;
      $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $noquestion = false;
        echo '<div class="bg-white p-3 rounded mt-2">
      <div class="d-flex my-2 mx-2">
  <img
    src="partials/img/user.png"
    alt=""
    class="me-3 rounded-circle"
    style="width: 60px; height: 60px;"
  />
  <div>
    <h5 class="fw-bold">
    <h5>' . $row['thread_name'] . '</h5>
    <a href="thread.php?threadid=' . $row['thread_id'] . '">' . $row['thread_title'] . '</a>
    <small class="text-muted"> &nbsp&nbsp' . $row['timestamp'] . '</small>
    </h5>
    <p>' . $row['thread_description'] . '</p>
  </div>
</div>
</div>';
      }
      
      //Media object 
      if ($noquestion) {
        echo '<div class="col-md-8">
  <div class="h-100 p-5 bg-light border rounded-3">
    <h2>No Results Found</h2>
    <p>Be the first person to ask a questions</p>
  </div>
</div>
</div>';
      }
      ?>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>