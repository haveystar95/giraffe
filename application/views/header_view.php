<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?=$user?></a>
        </div>





        <div class="navbar-collapse collapse auth">


            <form class="navbar-form navbar-right" role="form" action="" method="post" style="display:<?=$form?>">

                <div class="form-group">
                    <input type="login" placeholder="Login" id="login" name="login" class="form-control" autofocus autocomplete="off">
                    <div class ="win">Заполните поле</div>
                    <div class ="spec">Запрещенный символ</div>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" id="password" name="password" class="form-control" >
                    <div class ="win2">Заполните поле</div>

                </div>
                <button type="submit" class="btn btn-success" id="signin" name="signIn">Sign in</button>
            </form>




            <form method="post" action="<?=base_url()?>main/logout/" style="display:<?=$but_log_out?> ">
                <input  type="submit" class="btn btn-danger signout"  name="log_out" value="Log Out">
            </form>


        </div><!--/.navbar-collapse -->
    </div>
</div>