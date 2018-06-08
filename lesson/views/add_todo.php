<?php  require_once 'page/top.php'; ?>

    <div class="col-6 offset-md-3">
        <form action="./todo_change.php" method="post">
            <div class="form-group">
                <label for="form_message">Message</label>
                <input type="hidden" name="type" value="save">
                <input type="text" name="message" id="form_message" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add todo</button>
            </div>
        </form>
    </div>

<?php require_once 'page/bottom.php'; ?>