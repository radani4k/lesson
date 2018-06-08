<?php require_once 'page/top.php'; ?>

<?php foreach ($todo_list as $todo) { ?>
    <div class="card">
        <div class="card-body <?php echo $todo['status']; ?>">
            <form action="todo_change.php" method="post" style="float: right; margin: 0 10px;">
               <input type="hidden" name="id" value="<?php echo $todo['id'] ?>">
               <input type="hidden" name="type" value="change">
               <input type="hidden" name="status" value="hide">
               <button type="submit" class="btn btn-primary">Remove</button>
            </form>

            <form action="todo_change.php" method="post" style="float: right; margin: 0 10px;">
               <input type="hidden" name="id" value="<?php echo $todo['id'] ?>">
               <input type="hidden" name="type" value="change">
               <input type="hidden" name="status" value="done">
               <button type="submit" class="btn btn-primary">Done</button>
            </form>

            <?php echo $todo['message']; ?>
        </div>
    </div>
    <br>
<?php } ?>

<?php require_once 'page/bottom.php'; ?>