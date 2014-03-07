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
            });
            </script>                
            <?php
            $currentMenu = @strtolower($leftmenu_selected);
            ?>
            <div class="wrap">
                <div class="graphite demo-container">
                    <ul class="accordion" id="accordion-1">
                        <li><a href="#">Home</a></li>
                        <li><a class="<?php echo $currentMenu=='departments' ? 'selected' : ''?>" href="<?php echo $this->config->item('base_url')?>departments">Departments</a></li>
                        <li><a class="<?php echo $currentMenu=='enquiries' ? 'selected' : ''?>" href="<?php echo $this->config->item('base_url')?>enquiries">Enquiries</a></li>
                        <li><a class="<?php echo $currentMenu=='universities' ? 'selected' : ''?>" href="<?php echo $this->config->item('base_url')?>universities">Universities</a></li>
                        <li><a href="#">About Us </a><ul>
                                <li><a href="#">About Page 1</a></li>
                                <li><a href="#">About Page 2</a></li>
            
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>