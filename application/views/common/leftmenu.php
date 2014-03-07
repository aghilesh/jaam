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
            <div class="wrap">
                <div class="graphite demo-container">
                    <ul class="accordion" id="accordion-1">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us </a><ul>
                                <li><a href="#">About Page 1</a></li>
                                <li><a href="#">About Page 2</a></li>
            
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>