$(document).ready(function() {
    $('.delete').click(function(){
        id  = $(this).data('id');
        if(id){
            if(confirm('Are you sure you want to delete the department ?')){
                window.location = base_url+'departments/delete/'+id;
            }
        }
    });
});