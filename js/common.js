/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery( document ).ready(function() {
    jQuery('.common-add-btn-click').on('click',function(){
        jQuery('.generic-add-form-slider').slideDown('slow');
    });
    
    /**
     * Hide Opened Message boxes
     */
    if(jQuery('.common_message_div').length){
        jQuery('.common_message_div').fadeOut(4000);
    }
    /**
     * Common save button form submit action
     */
    jQuery('.common-save-btn-click').click(function(){
        if($(this).parents().closest('form')){
            $(this).parents().closest('form').submit()
        }
    });
    
    $('.delete').click(function(){
        var _link = $(this).data('link');
        if(_link){
            if(confirm('Are you sure you want to delete?')){
                window.location = _link;
            }
        }
    });
});