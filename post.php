<?php 
    require('include/post_utils.php');
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $post_id = $_GET['post_id'];

    //Create comment
    $content = $image_url = '';
    //TODO show error messages
    $content_error = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $image_url = trim($_POST['image_url']);
        $content = $_POST['content'];

        if(empty($content)) {
            $content_error = 'Please Enter Content';
        }

        if(empty($content_error)) {
            create_comment($_SESSION['username'], $post_id, $image_url, $content);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/bootstrap-grid.css"/>
    <!-- <link rel="stylesheet" href="css/styles.css"/> -->
    <link rel="stylesheet" href="css/index3.css"/>
    <link rel="stylesheet" href="css/modal.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>  
  
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="img/favicons/favicon.ico">
    <link rel="manifest" href="img/manifest.json">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#1976D2">
    <meta name="theme-color" content="#ffffff">
    <title>Forum Post</title>
</head>
<body>
    <nav id="top-nav" class="navbar navbar-dark fixed-top">
        <a href="index.html" class="navbar-brand">
            <img src="img/skull_icon.png" alt="" width="40" height="40">
        </a>
        <div id="user-ref">
            <img src=<?php echo get_user_image(); ?> alt="" width="40" height="40">
            <span><?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></span>
        </div>
        <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">All</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">General</a></li>
                <li class="nav-item"><a href="index2.html" class="nav-link">Movies</a></li>
                <li class="nav-item"><a href="login.html" class="nav-link">Television</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Music</a></li>
                <li class="nav-item"><a href="index2.html" class="nav-link">Video Games</a></li>
                <li class="nav-item"><a href="login.html" class="nav-link">Politics</a></li>
                <li class="nav-item"><a href="login.html" class="nav-link">Wasteland</a></li>
            </ul>
        </div>
    </nav>
    <div id="sidebar-wrapper">
        <div id="sidebar">
                <div id="sidebar-header">
                    <img src=<?php echo get_user_image(); ?> width="80px" height="80px" alt="" id="sidebar-img">
                    <span><?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></span>
                </div>
                <div id="sidebar-content">
                    <ul id="sidebar-nav">
                        <li class="list-item selected">All</li>
                        <li class="list-item">General</li>
                        <li class="list-item">Movies</li>
                        <li class="list-item">Television</li>
                        <li class="list-item">Music</li>
                        <li class="list-item">Video Games</li>
                        <li class="list-item">Politics</li>
                        <li class="list-item">Wasteland</li>
                    </ul>
                </div>
            </div>
    </div>
    <div id="content">
        <div id="content-header">
            <button id="new-comment-btn">Reply</button>
        </div>
        <?php 
            global $post_id;
            echo get_post_and_comments($post_id);
        ?>
    </div>

    <!-- NEW COMMENT MODAL -->
    <div id="comment-blanket" class="blanket"></div>
    <div id="comment-modal" class="form-modal">
        <form action="#" method="post">
            <label for="image_url">Image</label>
            <input type="text" name="image_url" id="new-comment-image" maxlength="120">
            <label for="title">Content</label>
            <textarea name="content" id="new-comment-content" maxlength="4499"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>