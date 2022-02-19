<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/partials/footers.css" rel="stylesheet">
    <title>codeDiscussion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">
    <!-- Bootstrap core CSS -->
    <link href="/partials/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?> 
    
    <div class="container my-5">
    <?php
                                            $id = $_GET['blogid'];
                                            $sql = "SELECT * FROM `blog` WHERE blog_id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="jumbotron">
                                                <h1 class="display-4">' . $row['blog_name'] . '</h1>
                                                <img src="partials/img/card'.$id.'" alt="">
                                                <hr class="my-4">
                                                <h4 class="display-6">' . $row['blog_language'] . '</h4>
                                                <p class="lead">' . $row['blog_description'] . '</p>
                                                <hr class="my-4">
                                                <p class="lead">
                                                <h3 style="color:blue;">Posted by -' . $row['blog_writer'] . ' at ' . $row['blog_time'] . '</h3>
                                                </p>
                                              </div>';
                                            }
                                            ?>
         </div>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>