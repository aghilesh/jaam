<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <title><?php if (isset($title)) echo $title; ?></title>
                <meta name="description" content="">
                    <?php if (isset($load_js)): echo load_js($load_js);
                    endif; ?>
<?php if (isset($load_css)): echo load_css($load_css);
endif; ?> 
                    <script type="text/javascript">
                        var base_url = '<?php echo base_url(); ?>';
                    </script>         
                    <?php if (@$payment_page): ?>
                        <script charset="UTF-8" src="https://ssl.ditonlinebetalingssystem.dk/integration/ewindow/paymentwindow.js" type="text/javascript"></script>
<?php endif; ?>    
                    </head>
                    <body>
                        <!--[if lt IE 7]>
                            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                        <![endif]-->

                        <div id="outer-panel">
                            <div class="header-panel">
                                <header class="wrapper">
                                    <!-- Begin : Top Section -->
                                    <div class="topsection">
                                        <div class="pullleft logout">
                                            <?php if ($this->session->userdata('userid')): ?>
                                                <a href="<?php echo base_url() ?>cuser/logout">Logout</a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pullleft">
                                            <a href="<?php echo base_url(); ?>cevent/showPrintPage">Print Ticket</a>
                                        </div>
                                        <div id="signup_loginContent" name="signup_loginContent" class="pullleft">
                                            <?php 
                                            $userName         = $this->session->userdata('userName');

                                            if($userName != ''){?>
                                                Welcome <?php echo $userName; ?>
                                                <a href="<?php echo base_url() ?>cuser/logout">Logout</a>
                                            <?php }?>
                                        </div>
                                        <div class="clearboth"></div>
                                    </div>
                                    <div class="clearboth"></div>
                                    <!-- End : top Section -->
                                    <!-- Begin : Main Header -->
                                    <div class="mainheader">
                                        <div class="logosection">
                                            <a href="<?php echo $this->config->item('base_url') ?>" id="logo">IT ticket.com.au</a>
                                            <div class="social-icons">
                                                <a href="#" class="twr" title="Twitter">Twitter</a>
                                                <a href="#" class="fb" title="Facebook">Facebook</a>
                                                <a href="#" class="rss" title="RSS">RSS</a>
                                                <a href="#" class="gplus" title="Google Plus">Google Plus</a>
                                            </div>
                                            <div class="clearboth"></div>
                                        </div>
                                        <div class="menusection">
                                            <nav class="globalmenu">
                                                <ul>
                                                    <li><a href="<?php echo base_url(); ?>" title="Home">Home</a></li>
                                                    <li><a href="<?php echo base_url(); ?>cevent/category/movie" title="Movies" class="<?php echo isSelected($this->uri->segment(3), 'movie') ?>">Movies</a></li>
                                                    <li><a href="<?php echo base_url(); ?>cevent/category/concerts" title="Concerts" class="<?php echo isSelected($this->uri->segment(3), 'concerts') ?>">Concerts</a></li>
                                                    <li><a href="<?php echo base_url(); ?>cevent/category/comedy" title="Comedy" class="<?php echo isSelected($this->uri->segment(3), 'comedy') ?>">Comedy</a></li>
                                                    <li><a href="<?php echo base_url(); ?>cevent/category/exhibitions" title="Exhibitions" class="<?php echo isSelected($this->uri->segment(3), 'exhibitions') ?>">Exhibitions</a></li>
                                                    <li><a href="<?php echo base_url(); ?>cevent/category/others" title="All/Others" class="<?php echo isSelected($this->uri->segment(3), 'others') ?>">All/Others</a></li>
                                                </ul>
                                            </nav>
            <form method="post" action="<?php echo base_url() ?>cevent/search/basic" id="search-form">
                <div class="textbox" style="float:left">
                    <?php
                    $searchKeyword = ($this->session->userdata('searchterm')) ? $this->session->userdata('searchterm') : $this->input->post('search-input');
                    ?>
                    <input type="text" name="search-input" id="search-input" class="search-input" value="<?php echo $searchKeyword; ?>" placeholder="Search...">
                </div>
                <img src="<?php echo base_url() ?>images/search-lens.png" title="Search" class="searchBtn"/>
<!--                                <input type="submit" value="Search" id="search-submit">                                    -->
            </form>
                                            <div class="clearboth"></div>
                                        </div>
                                    </div>
                                    <!-- End : Main Header -->



