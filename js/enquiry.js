var Enquiry = function(){
    return {
        eduAction : function(obj){
            switch($(obj).val()) {
                case 'add':
                    this.replicateEduRow($(obj).parent().parent());
                    break;
                case 'remove':
                    var totalItems = $(obj).parent().parent().parent().children().length;
                    if(totalItems>1){
                       $(obj).parent().parent().remove();
                    }
                    break;
            }
        },
        
        replicateEduRow : function(rowObj){
            
            $(rowObj).clone().appendTo($(rowObj).parent());
        },
        
        toggleDescription : function(selObj) {
            var txt = $("#publicity_source").children("option").filter(":selected").text().toLowerCase();
            if(txt=='other') {
                $('.source-desc-visible').show();
            }
            else
            {
                $('.source-desc-visible').hide();
            }
        }
        
    }
}()
$(document).ready(function(){
    $('body').on("keypress", "#enquiry_edu_details .edu-percentage", function(e) {
        if(e.which=='13'){
            Enquiry.replicateEduRow($(this).parent().parent());
        }
    });
    $('body').on("keypress", "#enquiry_course_details .course-name", function(e) {
        if(e.which=='13'){
            Enquiry.replicateEduRow($(this).parent().parent());
        }
    });
});

