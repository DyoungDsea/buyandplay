$(document).ready(function(){
    //delete categoty
    //note this change the status of the category not deleting ever.
    $(document).on("click", "#blogDelete", function(){
        var id =$(this).attr("blog");
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
                        url: 'ajax_blog.php',
                        type: 'POST',
                        data: {blogDelete:1,id:id, img:img}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign("manage-blog");
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });
})