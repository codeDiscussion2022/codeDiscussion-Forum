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
    <link href="/partials/bootstrap.min.css" rel="stylesheet">
</head><body>
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/navbar.php'; ?>

    <div class="contair mx-0 my-0" style="background-image:url('partials/img/aboutbg.jpg') ; height:100vh; color:white ;font: weight 900px;">

    <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="partials/img/logo.jpg" alt="" width="90" height="90">
    <h1 class="display-5 fw-bold"><strong>CodeDiscussion<strong></h1>

    <div class="col-lg-6 mx-auto">
      <h4 class="mb-4" style="color:white"><strong>"Being the legend in programming can be easy, especially if you start with us!"<strong></h4>

      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="/codediscussion/contact.php"><button type="button" class="btn btn-primary btn-lg px-4 gap-3">Contact Us</button></a>
        <a href="/codediscussion/index.php"><button type="button" class="btn btn-outline-secondary btn-lg px-4">HOME</button></a>
      </div>

    </div>

  </div>

  </div>

    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>