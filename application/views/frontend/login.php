<form class="user" action="<?php echo base_url('Login/cek_login'); ?>" method="POST">
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="username" aria-describedby="username" placeholder="Enter Username..." name="txt_user">
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="txt_pass">
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember Me</label>
        </div>
    </div>
    <input type="submit" name="btn_log" class="btn btn-primary btn-user btn-block" value="Login">
    <hr>
    <a href="index.html" class="btn btn-google btn-user btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
    <a href="index.html" class="btn btn-facebook btn-user btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
    </a>
</form>