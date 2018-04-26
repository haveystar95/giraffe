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
  
    
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/style_edit.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/media.css'); ?>">



    <title>Edit</title>
</head>
<body>



<div class="container">
    <div class="edit_ad">

        <form role="form" method="post" action="<?=base_url()?>edit/">
            <div class="form-group">
               
                <input type="text" value="<?=$array_ad[0]['id']?>" name="id" style="display: none">
                <label for="title">Title</label>
                
                <input type="text" name="title" class="form-control" id="title" value="<?=$array_ad[0]['title']?>" placeholder="Type title" autocomplete="off"   maxlength="60" required>
                    <div class="countstr"></div>
            </div>
            <div class="form-group">
                <label for="title">Description</label>
                <textarea class="form-control" name="description"  id="description" maxlength="60"  required ><?=$array_ad[0]['description']?></textarea>
                <div class="countarea"></div>
            </div>



            <button type="submit" name="create_new" class="btn btn-success"><?php if($array_ad[0]['id']==0){echo 'Create';}else{ echo 'Save';}?></button>
                   
                    <div class="cancel"><a class="btn btn-warning" href="<?=base_url()?>">Back</a>
            </div>
        </form>
         
            
       
    </div>












</div>


<script src="<?php echo site_url('application/views/js/edit.js'); ?>"></script>
</body>
</html>