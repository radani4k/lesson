<?php require_once 'part/header.php'; ?>

    <div class="col-6 offset-md-3">
        <form action="./?router=/post/create" method="post">
            <div class="form-group">
                <label for="form_title">Title</label>
                <input type="text" name="title" id="form_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="form_body">Body</label>
                <textarea type="text" name="body" id="form_body" class="form-control"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add post</button>
            </div>
        </form>
    </div>

<?php require_once 'part/footer.php';?>