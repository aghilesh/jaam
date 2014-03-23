<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/prospera.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/dcaccordion.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url') ?>css/skins/graphite.css" />
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/jquery.hoverIntent.minified.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/jquery.dcjqaccordion.2.7.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->item('base_url') ?>js/common.js"></script>
        <?php if (isset($load_js)): echo load_js($load_js);
        endif; ?>
<?php if (isset($load_css)): echo load_css($load_css);
endif; ?> 
    </head>
    <body>
        <header class="fl header full-width" id="header">
            <?php
            $this->load->view($this->config->item('common_page') . 'header', $this->gen_contents);
            ?>
        </header>
        <div class="clear"></div>
        <div class="main-body">
            <div class="fl left-menu">
                <?php
                $this->load->view($this->config->item('common_page') . 'leftmenu', $this->gen_contents);
                ?>
            </div>
            <div class="fl page-content">
                <h2 class="fl common-page-title"><?php echo @$page_title ?></h2><div class="clear"></div>
                <?php
                if (isset($dynamic_views) && is_array($dynamic_views)) {
                    foreach ($dynamic_views as $dynamic_view) {
                        $this->load->view($dynamic_view, $this->gen_contents);
                    }
                }
                ?>
            </div>
        </div><div class="clear"></div>
        <footer class="fl footer full-width" id="footer">
            <?php
            $this->load->view($this->config->item('common_page') . 'footer', $this->gen_contents);
            ?>
        </footer>
    </body>
</html>