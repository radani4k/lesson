<?php  require_once 'page/top.php'; ?>

    <div class="col-6 offset-md-3">
        <form action="./signup.php" method="post">
            <div class="form-group">
                <label for="form_login">Login</label>
                <input type="text" name="login" id="form_login" class="form-control">
            </div>
            <div class="form-group">
                <label for="form_pass">Password</label>
                <input type="password" name="password" id="form_pass" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </div>
        </form>
    </div>

<?php require_once 'page/bottom.php'; ?>