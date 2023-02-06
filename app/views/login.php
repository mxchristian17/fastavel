<section>
    <form method="post" action="/loginForm">
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="emailInput">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="passwordInput">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMeCheckBox">
            <label class="form-check-label" for="rememberMeCheckBox">Remember me on this device</label>
        </div>
        <input type="hidden" name="_token" value="<?php echo $_SESSION["_token"]; ?>" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>