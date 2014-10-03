var Checklist = function(){
    return {
        checkListAction : function(obj){
            switch($(obj).attr("rel")) {
                case 'add':
                    this.replicateChecklistRow();
                    break;
                case 'remove':
                    var classList =$(obj).attr('class').split(/\s+/);
                    $('.'+classList[0]).remove();
                    break;
            }
        },
        
        replicateChecklistRow : function(){
            var dummyRow = $('#dummyRowChecklist').html();
            var dynamicClass = Math.random().toString().split('.');
            dynamicClass = dynamicClass.length>1 ? dynamicClass[1] : dynamicClass[0] ;
            dummyRow = dummyRow.replace(/{REPL_CLASS}/g, dynamicClass);
            $('#checkListRows').append(dummyRow);
        }
    }
}()
$(document).ready(function(){
    $('body').on("keypress", "#enquiry_edu_details .edu-percentage", function(e) {
        if(e.which=='13'){
            
        }
    });
});