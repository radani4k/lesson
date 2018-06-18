<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Posts</title>

    <style>
        .done {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Example: Posts</h5>

    <ul class="nav nav-pills">

        <?php if(!User::status()) { ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['router'] == '/signin' ? 'active' : ''; ?>" href="./?router=/signin">Sign in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['router'] == '/signup' ? 'active' : ''; ?>" href="./?router=/signup">Sign up</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link <?php echo $_GET['router'] == '/post/create' ? 'active' : ''; ?>" href="./?router=/post/create">Create post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo $_GET['router'] == '/posts' ? 'active' : ''; ?>" href="./?router=/posts">Show posts</a>
        </li>
    </ul>
    &nbsp;
    &nbsp;
    <?php if(User::status()) { ?>
        <a class="btn btn-outline-primary" href="./?router=/signout">Sign out</a>
    <?php } ?>

</div>
<div class="container">