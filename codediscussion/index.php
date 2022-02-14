<!doctype html>
<html lang="en">
<head>
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
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
</head>
<body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <?php include 'partials/carousel.php'; ?>
    <div class="container my-3">
        <h2 class="text-center mx-3 my-3">Welcome to codeDiscussion-Categories</h2>
        <div class="row">
            <!-- Fetch all categories -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                //use afor loop to itrate through categories 
                echo    '<div class="col-md-4 my-2">
                <div class="card">
                    <img src="partials/img/card' . $row['category_id'] . '.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid=' . $row['category_id'] . '">' . substr($row['category_name'], 0, 20) . '</a></h5>
                        <p class="card-text">' . substr($row['category_description'], 0, 150) . '....</p>
                        <a href="threadlist.php?catid=' . $row['category_id'] . '" class="btn btn-success">View Threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
    <hr>
    <div class="container">
        <h2 class="text-center mx-2 my-3">Blogs</h2>
        <div class="row mb-2">
            <?php
            $sql = "SELECT * FROM `blog`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo  '<div class="col-md-4 my-3">
                    <div class="card">
                    <div class="container mh-25"><img src="https://source.unsplash.com/random/300×200/?coding,' . $row['blog_language'] . ',python,javascript,webdevelopment" class="mh-25" alt="' . $row['blog_name'] . '"  style="height:150px;width:100%"></div>
                        <div class="card-body">
                        <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">' . $row['blog_language'] . '</strong>
                        <h4 class="mb-0">' . substr($row['blog_name'], 0, 30) . '</h4>
                        <div class="mb-1 text-muted my-2">' . $row['blog_time'] . '</div>
                        <p class="card-text mb-auto">' . substr($row['blog_description'], 0, 100) . '</p>
                        <strong class="d-inline-block mb-2 text-primary my-2">Posted by- ' . $row['blog_writer'] . '</strong>
                        <a href="partials/blog?blogid=' . $row['blog_id'] . '" class="stretched-link">Continue reading</a>
                      </div>
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
</body>

</html>