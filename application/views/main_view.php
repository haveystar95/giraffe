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

    <link rel="stylesheet" href="<?php echo site_url('application/views/css/style_main.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/media.css'); ?>">
    <title>Main page</title>
</head>
<body>





<div class="container">




<div class="addNew" style="display: <?=$but_log_out?>">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="<?=base_url()?>edit" method="post">
            <input type="submit" class="btn btn-success button_create" name="CreateNew" value="Create">
            </form>
        </div>
        <div class="col-md-4"></div>
        

    </div>
</div>


       <div class="ad">     
<?php foreach($array as $el): ?>
               
         <div class="block">
                
                <div class="row">
                     <div class="col-md-2">

                         <a  href="<?= base_url().$el['id']?>" role="button"> <h2><?=$el['title'] ?></h2></a>
                     </div>
                     
                </div>
                
                <div class="row">
                     <div class="col-md-2">
                         <h3>Creator: <?=$el['author_name'] ?></h3>
                     </div>
                     
                </div>
                
                <div class="row">
                     <div class="col-md-3">
                        <h4><?=$el['created_at_datetime'] ?></h4>
                     </div>
                     
                </div>

                <div class="row">
                     <div class="col-md-12">
                       <p><?=$el['description'] ?></p>
                     </div>
                     
                </div>

                <div class="row">
                     <div class="col-md-5">

                       <a class="btn btn-md btn-warning btn-user" href="<?=base_url()?>edit/<?=$el['id'] ?>" style="<?php if($el['author_name']!=$user){echo 'display:none';} else{ echo ' ';}?>" role="button">Редактировать &raquo;</a>
                       <a class="btn btn-md btn-danger btn-user" href="<?=base_url()?>delete/<?=$el['id'] ?>" style="<?php if($el['author_name']!=$user){echo 'display:none';} else{ echo ' ';}?>" role="button">Удалить </a>
                       
                     </div>
                     
                </div>
    <hr>
        </div>  
                
<?php endforeach ?>
</div>
           <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                   
                   
                   <div class="pagination">
            <?php    echo $this->pagination->create_links();?>

            </div>
                   
                   
               </div>
               <div class="col-md-4"></div>
           </div>
            


   





</div> <!-- /container -->


<script src="<?php echo site_url('application/views/js/main.js'); ?>"></script>
</body>

</html>