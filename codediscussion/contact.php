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
  $showresult = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $contact_name = $_POST['contact_name'];
    $contact_name = str_replace("<","&lt;",$contact_name);
    $contact_name = str_replace(">","&gt;",$contact_name);    $contact_email = $_POST['contact_email'];
    $contact_email = str_replace("<","&lt;",$contact_email);
    $contact_email = str_replace(">","&gt;",$contact_email);    $contact_phone = $_POST['contact_phone'];
    $contact_phone = str_replace("<","&lt;", $contact_phone);
    $contact_phone = str_replace(">","&gt;", $contact_phone);    $contact_subject = $_POST['contact_subject'];
    $contact_subject = str_replace("<","&lt;", $contact_subject);
    $contact_subject = str_replace(">","&gt;", $contact_subject);    $contact_message = $_POST['contact_content'];
    $contact_message = str_replace("<","&lt;",$contact_message);
    $contact_message = str_replace(">","&gt;",$contact_message);    $sql = "INSERT INTO `contact` (`contact_name`, `contact_mobileno`, `contact_message`, `contact_subject`, `contact_email`) VALUES ('$contact_name', '$contact_phone', '$contact_message', '$contact_subject','$contact_email');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showresult = true;
    }
    if ($showresult) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>success!</strong> thanks for feedback.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
  }
  ?>
    <div class="container my-3">
        <h2 class="text-center mx-3 my-4">Contact Us</h2>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="partials/img/contact.gif" alt="" style="width: 100%;">
                </div>
                <div class="col-md-6 h-100 p-4 bg-light border rounded-3">
                    <h2 class="text-center mx-3 my-2">Contact Us</h2>
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                        <div class="mb-3">
                            <div class="row my-2">
                                <div class="col-sm-12 my-2">
                                    <label for="contact_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="contact_name" placeholder="" value=""
                                        name="contact_name" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>
                                <div class="col-sm-12 my-2">
                                    <label for="email" class="form-label">Email <span class="text-muted">*</span>
                                    </label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                        name="contact_email" required>
                                    <div class="invalid-feedback form-text">
                                        We'll never share your email with anyone else.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 my-3">
                                <label for="mobileno" class="form-label">Mobile number<span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="contact_phone" placeholder="+91"
                                    name="contact_phone" maxlength="10">
                            </div>                            <div class="col-sm-12 my-2">
                                <label for="contact_subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="contact_subject" placeholder=""
                                    name="contact_subject">
                            </div>
                            <div class="input-group my-2">
                                <span class="input-group-text">concern</span>
                                <textarea class="form-control" aria-label="contact_content" id="contact_content"
                                    name="contact_content" rows="10"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="/partials/bootstrap.bundle.min.js"></script>
</body></html>