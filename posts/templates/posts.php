<?php require_once 'part/header.php'; ?>

<?php foreach ($posts as $post) { ?>
    <div class="card">
        <div class="card-body">
            <?php if (User::getIdUser() == $post->user_id) { ?>
                <form action="?router=/post/delete" method="post" style="float: right; margin: 0 10px;">
                    <input type="hidden" name="post_id" value="<?php echo $post->id ?>">
                    <button type="submit" class="btn btn-primary">Remove</button>
                </form>
            <?php } ?>

            <a href="./?router=/post&id=<?php echo $post->id ?>">
                <h1><?php echo $post->title; ?></h1>
            </a>

            <h6>
                <a href="./?router=/posts&user_id=<?php echo $post->user_id; ?>"><?php echo $post->user_email; ?></a>
                -
                <?php echo $post->date(); ?>
            </h6>

            <p><?php echo $post->preview(); ?></p>
        </div>
    </div>
    <br>
<?php } ?>

<?php require_once 'part/footer.php'; ?>
