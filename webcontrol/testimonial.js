$(document).ready(function(){
    //delete categoty
    //note this change the status of the category not deleting ever.
    $(document).on("click", "#testDelete", function(){
        var id =$(this).attr("test");
        var img =$(this).attr("img");
        // alert(img);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Are you sure?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proceed!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax_testimonial.php',
                        type: 'POST',
                        data: {testDelete:1,id:id,img:img}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign("manage-testimonial");
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });
})