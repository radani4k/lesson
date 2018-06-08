<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Todo</title>

    <style>
        .done {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Example: Todo</h5>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] == 'add_todo' ? 'active' : ''; ?>" href="./?action=add_todo">Add todo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] == 'add_user' ? 'active' : ''; ?>" href="./?action=add_user">Add user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] == 'list_doto' ? 'active' : ''; ?>" href="./?action=list_doto">Show todos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['action'] == 'list_user' ? 'active' : ''; ?>" href="./?action=list_user">Show users</a>
            </li>
        </ul>
        &nbsp;
        &nbsp;
        <?php if(User::status()) { ?>
            <a class="btn btn-outline-primary" href="signout.php">Sign out</a>
        <?php } ?>

    </div>
    <div class="container">