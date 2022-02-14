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
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }        .be-comment-block {
            margin-bottom: 50px !important;
            border: 1px solid #edeff2;
            border-radius: 2px;
            padding: 50px 70px;
            border: 1px solid #ffffff;
        }        .comments-title {
            font-size: 16px;
            color: #262626;
            margin-bottom: 15px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }        .be-img-comment {
            width: 60px;
            height: 60px;
            float: left;
            margin-bottom: 15px;
        }        .be-ava-comment {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }        .be-comment-content {
            margin-left: 80px;
        }        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }        .be-comment-name {
            font-size: 13px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }        .be-comment-content a {
            color: #383b43;
        }        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }        .be-comment-time {
            text-align: right;
        }        .be-comment-time {
            font-size: px;
            color: #b4b7c1;
        }        .be-comment-text {
            font-size: 13px;
            line-height: 18px;
            color: #7a8192;
            display: block;
            background: #f6f6f7;
            border: 1px solid #edeff2;
            padding: 15px 20px 20px 20px;
        }        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }        .form-group textarea.form-input {
            height: 150px;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?> <?php
                                            $id = $_GET['threadid'];
                                            $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '
                                                <div class="container mt-4">
    <div class="p-2 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome to ' . $row['thread_title'] . '</h1>
        <hr>
        <p class=" fs-4">' . $row['thread_description'] . '</p>
     </br>
     </br>
        <p class=" fs-6">Posted by- ' . $row['thread_name'] . '</p>
      </div>
    </div>
    </div>';
                                            }
                                            ?>




    <?php
    $showresult = false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $comment_content = $_POST['comment_content'];
        $comment_content = str_replace("<", "&lt;", $comment_content);
        $comment_content = str_replace(">", "&gt;", $comment_content);
        $comment_name = $_SESSION['name'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`,`comment_name`) VALUES ('$comment_content', '$id',' $comment_name');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showresult = true;
        }
       
    }
    ?>
    <div class="container">
        <h1 class=" text-center">Comments</h1>
        <div class="be-comment-block"> <?php
                                        $noquestion = true;
                                        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $noquestion = false;
                                            echo '<div class="be-comment my-4">
		<div class="be-img-comment">	
			<a href="blog-detail-2.html">
				<img src="partials/img/user.png" alt="" class="be-ava-comment">
			</a>
		</div>
		<div class="be-comment-content">
				<span class="be-comment-name">
					<h5>' . $row['comment_name'] . '</h5>
					</span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					' . $row['thread_time'] . '
				</span>
			<p class="be-comment-text">' . $row['comment_content'] . '</p>
		</div>
	</div>';
                                        }
                                        ?>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<div class="h-100 p-5 bg-light border rounded-3">
                <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                    <div class="input-group">
                        <span class="input-group-text">Elaborate your problem</span>
                        <textarea class="form-control" aria-label="comment_content" id="comment_content"
                            name="comment_content" rows="3"></textarea>
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
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>