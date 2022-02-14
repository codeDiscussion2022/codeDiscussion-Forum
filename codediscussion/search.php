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
    body {
        background: #eee;
    }    .icon-container {
        border-radius: 7px;
    }    .stars i {
        margin-right: 2px;
        color: red;
        font-size: 13px
    }    .rating-number {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 2px
    }    .number-ratings {
        font-size: 12px
    }    .listing-title {
        margin-bottom: -7px
    }    .progress-bar {
        background: green
    }    .progress {
        height: 16px
    }    .tags span {
        margin-right: 9px;
        border: 1px solid green;
        padding-right: 9px;
        padding-left: 9px;
        padding-top: 2px;
        padding-bottom: 4px;
        border-radius: 7px;
        background-color: green;
        color: #fff
    }
    </style>
</head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <?php
    $topic = $_GET['search'];
    $sql = "select * from threads where match(thread_title,thread_description) against ('$topic')";
    $result = mysqli_query($conn, $sql);
    echo '<div class="container my-4" style="min-height: 70vh;">
        <div class="search">
            <h2 class="text-center">Search results for ' . $topic . '</h2>';
    $nosearch = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $nosearch = false;
        echo '
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white p-3 rounded mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center icon-container  text-white mb-2">
                                            <img src="https://source.unsplash.com/random/300×200/?coding,' . $row['thread_title'] . ',python,javascript,webdevelopment" class="mh-25" alt="" style="height:45vh;width:100%">
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-right">
                                        <div class="listing-title">
                                            <h5>Thread:<a href="thread.php?threadid=' . $row['thread_id'] . '"> ' . $row['thread_title'] . '</a></h5>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="d-flex flex-row align-items-center ratings">
                                            </div>
                                            <div class="level mr-2"><span class="font-weight-bold">Published at:</span></div>
                                            <div class="level mr-1"> <span class="font-weight-bold">&nbsp;' . $row['timestamp'] . '</span></div>
                                        </div>
                                        <div class="description my-2">
                                            <p><strong>Description:&nbsp;</strong>&nbsp;' . $row['thread_description'] . '<br></p>
                                        </div>
                                    </div>
                                    <div class="d-flex col-md-3">
                                        <div class="d-flex flex-column justify-content-start user-profile w-100">
                                            <div class="d-flex user"><img class="rounded-circle mx-3" src="partials/img/user.png" width="60">
                                                <div class="about ml-1 mx-2 my-2"><span>' . $row['thread_name'] . '</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    if ($nosearch) {
        echo '<div class="p-5 mb-4 bg-light rounded-3 my-5">
          <div class="container-fluid py-2">
            <h1 class="display-5 fw-bold">No results found</h1>
            <p class="col-md-8 fs-4">We did not find results for: ' . $topic . '. Try the suggestions below or type a new query above.</p>
            </br>
            <p class="col-md-8 fs-4">Suggestions:</br>
            Check your spelling.</br>
            Try more general words.</br>
            Try different words that mean the same thing.</br>
            For more helpful tips on searching, contact us</p>
          </div>
        </div>';
    }
    echo '</div>
                </div>';
    ?>
    <Hr>
    </Hr>
    <?php
    $nosearchblog = true;
    $sql = "select * from blog where match(blog_name,blog_language,blog_description) against ('$topic')";
    $result = mysqli_query($conn, $sql);
    echo '<div class="container" style="min-height: 70vh;">
        <div class="search">
            <h2 class="text-center">Blogs for ' . $topic . '</h2>';    while ($row = mysqli_fetch_assoc($result)) {
        $nosearchblog = false;
        echo '
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white p-3 rounded mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column justify-content-center align-items-center icon-container  text-white mb-2">
                                            <img src="https://source.unsplash.com/random/300×200/?coding,' . $row['blog_name'] . ',python,javascript,webdevelopment" class="mh-25" alt="" style="height:45vh;width:100%">
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-right">
                                        <div class="listing-title">
                                            <h5>Thread:<a href="partials/blog?blogid=' . $row['blog_id'] . '"> ' . $row['blog_name'] . '</a></h5>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="d-flex flex-row align-items-center ratings">
                                            </div>
                                            <div class="level mr-2"><span class="font-weight-bold">Published at:</span></div>
                                            <div class="level mr-1"> <span class="font-weight-bold">&nbsp;' . $row['blog_time'] . '</span></div>
                                        </div>
                                        <div class="description my-2">
                                            <p><strong>Description:&nbsp;</strong>&nbsp;' . $row['blog_description'] . '<br></p>
                                        </div>
                                    </div>
                                    <div class="d-flex col-md-3">
                                        <div class="d-flex flex-column justify-content-start user-profile w-100">
                                            <div class="d-flex user"><img class="rounded-circle mx-3" src="partials/img/user.png" width="60">
                                                <div class="about ml-1 mx-2 my-2"><span>' . $row['blog_writer'] . '</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    if ($nosearchblog) {
        echo '<div class="p-5 mb-4 bg-light rounded-3 my-5">
          <div class="container-fluid py-2">
            <h1 class="display-5 fw-bold">No results found</h1>
            <p class="col-md-8 fs-4">We did not find results for: ' . $topic . '. Try the suggestions below or type a new query above.</p>
            </br>
            <p class="col-md-8 fs-4">Suggestions:</br>
            Check your spelling.</br>
            Try more general words.</br>
            Try different words that mean the same thing.</br>
            For more helpful tips on searching, contact us</p>
          </div>
        </div>';
    }
    echo '</div>
        </div>';
    ?> <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>