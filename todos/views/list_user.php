<?php require_once 'page/top.php'; ?>

<ul class="list-group">
    <?php foreach ($user_list as $user) { ?>
        <li class="list-group-item"><?php echo $user['login']; ?></li>
    <?php } ?>
</ul>

<?php require_once 'page/bottom.php'; ?>