<?php  require_once 'part/header.php'; ?>

<div class="col-6 offset-md-3">
    <form action="./?router=/signin" method="post">
        <div class="form-group">
            <label for="form_email">Email</label>
            <input type="email" name="email" id="form_email" class="form-control">
        </div>
        <div class="form-group">
            <label for="form_pass">Password</label>
            <input type="password" name="password" id="form_pass" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
</div>

<?php require_once 'part/footer.php'; ?>