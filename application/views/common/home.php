<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?php if (isset($title)) echo $title; ?></title>
            <meta name="description" content="">
            <?php if (isset($load_js)): echo load_js($load_js); endif; ?>
            <?php if (isset($load_css)): echo load_css($load_css); endif; ?> 
            <script type="text/javascript">
            $(document).ready(function($){
                $('#accordion-1').dcAccordion({
                        eventType: 'click',
                        autoClose: true,
                        saveState: true,
                        disableLink: true,
                        speed: 'slow',
                        showCount: true,
                        autoExpand: true,
                        cookie	: 'dcjq-accordion-1',
                        classExpand	 : 'dcjq-current-parent'
                });
                $('#accordion-2').dcAccordion({
                        eventType: 'click',
                        autoClose: false,
                        saveState: true,
                        disableLink: true,
                        speed: 'fast',
                        classActive: 'test',
                        showCount: true
                });
                $('#accordion-3').dcAccordion({
                        eventType: 'click',
                        autoClose: false,
                        saveState: false,
                        disableLink: false,
                        showCount: false,
                        speed: 'slow'
                });
                $('#accordion-4').dcAccordion({
                        eventType: 'hover',
                        autoClose: true,
                        saveState: true,
                        disableLink: true,
                        menuClose: false,
                        speed: 'slow',
                        showCount: true
                });
                $('#accordion-5').dcAccordion({
                        eventType: 'hover',
                        autoClose: false,
                        saveState: true,
                        disableLink: true,
                        menuClose: true,
                        speed: 'fast',
                        showCount: true
                });
                $('#accordion-6').dcAccordion({
                        eventType: 'hover',
                        autoClose: false,
                        saveState: false,
                        disableLink: false,
                        showCount: false,
                        menuClose: true,
                        speed: 'slow'
                });
            });
            </script>                
   </head>
    <body>

    </body>
</html>
