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
        var form = $(this).parents().closest('form');
        if(form.hasClass('validate-form'))
        {
            if(prospera.validate.form(form))
            {
                form.submit();
            }
        }
        else
        {
            form.submit();
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

var prospera        = {};
prospera.validate   = {
    form : function(formObj){
        var validationPassed = true;
        var errorTagOpen = '<span class="validation-error">';
        var errorTagSearch = 'span.validation-error';
        var errorTagClose = '</span>';
        jQuery(formObj).find('.validate').each(
            function(){
                jQuery(this).parent().find(errorTagSearch).remove();
                var inputValue = jQuery(this).val();
                if(jQuery(this).hasClass('validate-mandatory')){
                    if(jQuery.trim(inputValue)==''){
                       validationPassed = false;
                       jQuery(this).parent().find(errorTagSearch).remove();
                       jQuery(this).parent().append(errorTagOpen+'Please fill this field'+errorTagClose);
                    }
                }
                if(jQuery(this).hasClass('validate-number')){
                    if(isNaN(jQuery.trim(inputValue))){
                       validationPassed = false;
                       jQuery(this).parent().find(errorTagSearch).remove();
                       jQuery(this).parent().append(errorTagOpen+'Please fill a valid number here'+errorTagClose);
                    }
                }
                if(jQuery(this).hasClass('validate-email')){
                    var emailMatch = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!emailMatch.test(inputValue)) {
                        validationPassed = false;
                        jQuery(this).parent().find(errorTagSearch).remove();
                        jQuery(this).parent().append(errorTagOpen+'Please fill a valid email here'+errorTagClose);
                    }
                }
            }
        );
        return validationPassed;
    }
}