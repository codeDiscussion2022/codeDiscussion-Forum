<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">SignUp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="partials/handlesignup.php" method="post">
            <div class="modal-body">
                    <div class="col-12 my-2">
                        <label for="email" class="form-label">Email <span class="text-muted">*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required>
                        <div class="invalid-feedback form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="row g-3 align-items-center my-2">
                        <div class="col-auto">
                            <label for="Password" class="col-form-label">Password</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="password" class="form-control" name="password"
                                aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                Must be 8-20 characters long.
                            </span>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center my-2">
                        <div class="col-auto">
                            <label for="cPassword" class="col-form-label">Confirm Password</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="cpassword" class="form-control" name="cpassword"
                                aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                                Both password are same.
                            </span>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="" value="" name="firstname"  required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="" value="" name="lastname"  required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="mobileno" class="form-label">Mobile number<span
                                class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="mobileno" placeholder="+91" name="mobileno"
                            maxlength="10">
                    </div>
                <button type="submit" class="btn btn-primary my-3">Submit</button>
                    <button type="button" class="btn btn-secondary my-3" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>