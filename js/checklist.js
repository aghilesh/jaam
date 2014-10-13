var Checklist = function(){
    return {
        checkListAction : function(obj, explicitAction){
            if(explicitAction) {
                var actionVal = explicitAction;
            } else {
                var actionVal = $(obj).attr("rel");
            }
            switch(actionVal) {
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
            var txtBoxes = $('#checkListRows').find('.checklist-field');
            var lastElem = txtBoxes[txtBoxes.length-1];
            $(lastElem).focus();
        },
        
        editRow : function(checkListId) {
            var checkAlreadyEdit = $('#checkListRow-'+checkListId).find('input.checklist-field');
            $('#save-all-btn').removeClass('hidden');
            return !checkAlreadyEdit.length ? $('#checkListRow-'+checkListId).html(this.getCheckListEditTemplate(checkListId)) : '';
        },
        
        getCheckListEditTemplate : function(checkListId) {
            var dummyRow = $('#checkListEditTemplate').html();
            dummyRow = dummyRow.replace(/{REPL_CHECKLIST_ID}/g, checkListId);
            dummyRow = dummyRow.replace(/{REPL_CHECKLIST_VALUE}/g, $('#checkListRow-'+checkListId).html());
            return dummyRow;
        },
        
        submitCheckListSaveAllForm : function() {
            $('#checkListSaveAllForm').submit();
        }
    }
}()
$(document).ready(function(){
    $('body').on("keypress", "#frmChecklistAdd .checklist-field", function(e) {
        if(e.which=='13'){
            Checklist.checkListAction(this, 'add');
        }
        return this;
    });
    $('body').on("change", "#country_id", function(e) {
        window.location = $('#list_url').val()+'/'+$(this).val();
    });
    
    
});