<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/bootstrap-theme.min.css'); ?>">
    <script src="<?php echo site_url('application/views/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/bootstrap.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/show.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/media.css'); ?>">




    <title>Document</title>
</head>
<body>



<div class="container show_box">

    <div class="starter-template">
        <h1><?=$title?></h1>
        <h3>Author: <?=$author_name?></h3>
        <h5><?=$created_at_datetime?></h5>


        <div class="jumbotron">
        <p class="lead"><?=$description?></p>

        </div>
        <div class="delete"><a href="<?=base_url().'delete/'.$id?>"   style="<?php if($author_name==$user){ echo 'display:block';}else{echo 'display:none';} ?>" class="btn btn-danger">Delete</a></div>
        <div class="edit"><a href="<?=base_url().'edit/'.$id?>"   style="<?php if($author_name==$user){ echo 'display:block';}else{echo 'display:none';} ?>" class="btn btn-info">Edit</a></div>


        <div class="cancel"><a href="<?=base_url()?>" class="btn btn-warning">Back</a></div>
    </div>

</div>




</body>
</html>

