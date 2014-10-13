var Registration = function(){
    return {
        eduAction : function(obj){
            switch($(obj).val()) {
                case 'add':
                    this.replicateEduRow();
                    break;
                case 'remove':
                    var totalItems = $(obj).parent().parent().parent().children().length;
                    if(totalItems>1){
                       $(obj).parent().parent().remove();
                    }
                    break;
            }
        },
        
        replicateEduRow : function(){
            var dummyRow = $('#dummyRowEducation').clone();
            dummyRow.attr('id','').removeClass('hidden').removeClass('dummyDataRows');
            dummyRow.appendTo($('#eduRows'));
        },
        
        courseAction : function(obj){
            switch($(obj).val()) {
                case 'add':
                    this.replicateCourseRow();
                    break;
                case 'remove':
                    var totalItems = $(obj).parent().parent().parent().children().length;
                    if(totalItems>1){
                       $(obj).parent().parent().remove();
                    }
                    break;
            }
        },
        
        replicateCourseRow : function(){
            var dummyRow = $('#dummyRowCourse').clone();
            dummyRow.attr('id','').removeClass('hidden').removeClass('dummyDataRows');
            dummyRow.appendTo($('#courseRows'));
        },
        
        toggleDescription : function(selObj) {
            var txt = $("#publicity_source").children("option").filter(":selected").text().toLowerCase();
            if(txt=='other') {
                $('.source-desc-visible').removeClass('hidden');
            }
            else
            {
                $('.source-desc-visible').addClass('hidden');
            }
        }
        
    }
}()
$(document).ready(function(){
    $('body').on("keypress", "#enquiry_edu_details .edu-percentage", function(e) {
        if(e.which=='13'){
            Registration.replicateEduRow($(this).parent().parent());
        }
    });
    $('body').on("keypress", "#enquiry_course_details .course-name", function(e) {
        if(e.which=='13'){
            Registration.replicateEduRow($(this).parent().parent());
        }
    });
});

