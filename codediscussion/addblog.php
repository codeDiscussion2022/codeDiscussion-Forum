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
    <title>codeDiscussion</title>    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">
    <!-- Bootstrap core CSS -->
    <link href="/partials/bootstrap.min.css" rel="stylesheet"></head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $blog_title = $_POST['blog_title'];
        $blog_title  = str_replace("<", "&lt;", $blog_title);
        $blog_title  = str_replace(">", "&gt;", $blog_title);        
        $blog_content = $_POST['blog_content'];
        $blog_content = str_replace("<", "&lt;", $blog_content);
        $blog_content = str_replace(">", "&gt;", $blog_content);        
        $blog_writer = $_POST['blog_writer'];
        $blog_writer = str_replace("<", "&lt;", $blog_writer);
        $blog_writer = str_replace(">", "&gt;", $blog_writer);        
        $blog_language = $_POST['blog_language'];
        $blog_language = str_replace("<", "&lt;", $blog_language);
        $blog_language = str_replace(">", "&gt;", $blog_language);        
        $sql = "INSERT INTO `blog` (`blog_name`, `blog_language`, `blog_description`, `blog_writer`) VALUES ('$blog_title', '$blog_language','$blog_content','$blog_writer');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showresult = true;
        }
        if ($showresult) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>success!</strong> thanks for upload blog.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <div class="container mx-3 my-3">
        <h2 class="text-center mx-3 my-4">Admin page : For upload data</h2>
        <div class="container my-5">
            <div class="col-md-12">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <div class="mb-3">
                            <label for="blog_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="blog_title" aria-describedby="blog_title"
                                name="blog_title">
                            <div id="Help" class="form-text">Keep your title as crisp and short as possible.</div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">content</span>
                            <textarea class="form-control" aria-label="blog_content" id="blog_content"
                                name="blog_content" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thread_title" class="form-label">Languge</label>
                            <input type="text" class="form-control" id="blog_language" aria-describedby="blog_language"
                                name="blog_language">
                            <div id="Help" class="form-text">language are used.</div>
                        </div>
                        <div class="mb-3">
                            <label for="blog_writer" class="form-label">writer</label>
                            <input type="text" class="form-control" id="blog_writer" aria-describedby="thread_title"
                                name="blog_writer">
                        </div>
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>        <?php include 'partials/footer.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>