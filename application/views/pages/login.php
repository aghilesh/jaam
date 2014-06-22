<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/prospera.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/dcaccordion.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/skins/graphite.css" />
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/login.js"></script>
        <?php
        if (isset($load_js)): echo load_js($load_js);
        endif;
        ?>
        <?php
        if (isset($load_css)): echo load_css($load_css);
        endif;
        ?> 
    </head>
    <body>
        <div class="login-outer">
            <form method="post">
                <div class="login-box">
                    <div class="fl cb login-row">
                        <input type="text" name="username" class="login-text" required placeholder="User Name">
                    </div>
                    <div class="fl cb login-row">
                        <input type="password" name="password" class="login-text fl" required="" placeholder="Password">
                        <input type="submit" class="login-button fl" value="Go">
                    </div>
                    <div class="fl cb message-row">
                        <div class="error-line">
                            <?php 
                            echo $this->session->flashdata('message') ? $this->session->flashdata('message') : '';
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>