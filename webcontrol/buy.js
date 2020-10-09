$(document).ready(function(){

    $(document).on("keyup", "#check", function(){
        var id = $(this).attr("user");
        var input = $("#check").val();
        // alert(input);
        if(input.length == 4){
            $.ajax({
                url: 'ajax-admin.php',
                type: 'POST',
                dataType:"json",
                data: {Checked:1,id:id,amount:input},
                success: function(data){
                    $("#result").text(data.result);
                    $('#button').html(data.button);
                }
            })
        }
        
    });

    //delete categoty
    //note this change the status of the category not deleting ever.
    $(document).on("click", "#catDelete", function(){
        var id =$(this).attr("cat");
        // alert(id);
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
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {catDelete:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign("manage-categories");
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    $(document).on("click", "#catDeletep", function(){
        var id =$(this).attr("cat");
        // alert(id);
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
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {catDeletep:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign("manage-pool-categories");
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    $(document).on("click", "#apprtipster", function(){
        var id =$(this).attr("cat");
        var user =$(this).attr("user");
        var cart_id =$(this).attr("cart_id");
        var uri = $("#uri").val();
        // alert(cart_id);
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
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {ApproveTipster:1,id:id,user:user,cart_id:cart_id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Approved!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });





    $(document).on("click", "#suspend", function(){
        var id =$(this).attr("cat");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'You want to suspend?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {Suspend:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Suspended!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    




    //Approve Game
$(document).on("click", "#done", function(){
    var id =$(this).attr("done");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Approve Game?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {Done:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Approved!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});


//Approve Pool

$(document).on("click", "#doneP", function(){
    var id =$(this).attr("doneP");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Approve Game?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {DoneP:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Approved!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});


//Reject Pool
$(document).on("click", "#ignorP", function(){
    var id =$(this).attr("ignorP");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Reject this Game?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {rejectP:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Rejected!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});





//won game
    $(document).on("click", "#won", function(){
        var id =$(this).attr("won");
        var cat =$(this).attr("cat");
        var user =$(this).attr("user");
        var uri = $("#uri").val();
        // alert(user);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Game Won?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {Won:1,id:id,cat:cat,user:user}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Won!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });

//Lost Game
$(document).on("click", "#lost", function(){
    var id =$(this).attr("lost");
    var cat =$(this).attr("cat");
    var user =$(this).attr("user");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Game Lost?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {Lost:1,id:id,cat:cat,user:user}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Lost!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});



$(document).on("click", "#cancelP", function(){
    var id =$(this).attr("lost");
    var cat =$(this).attr("cat");
    var user =$(this).attr("user");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Cancel this Game?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {cancelP:1,id:id,cat:cat,user:user}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});


$(document).on("click", "#lostC", function(){
    var id =$(this).attr("lost");
    var cat =$(this).attr("cat");
    var user =$(this).attr("user");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Cancel this Game?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {LostC:1,id:id,cat:cat,user:user}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});


//won Pool
$(document).on("click", "#wonP", function(){
    var id =$(this).attr("wonP");
    var cat =$(this).attr("cat");
    var user =$(this).attr("user");
    var uri = $("#uri").val();
    // alert(user);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Game Won?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-work.php',
                    type: 'POST',
                    data: {WonP:1,id:id,cat:cat,user:user}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Won!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});

//Lost Pool
$(document).on("click", "#lostP", function(){
var id =$(this).attr("lostP");
var cat =$(this).attr("cat");
var user =$(this).attr("user");
var uri = $("#uri").val();
// alert(id);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Game Lost?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-work.php',
                type: 'POST',
                data: {LostP:1,id:id,cat:cat,user:user}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Lost!'});
                setInterval(function(){
                    window.location.assign(uri);
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });



});




    //Reject Game
    $(document).on("click", "#ignor", function(){
        var id =$(this).attr("ignor");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Reject this Game?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {reject:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Rejected!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


     //Reject Game
     $(document).on("click", "#restore", function(){
        var id =$(this).attr("dele");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Restore this Game?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {restore:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Restored!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


       //Reject Game pool
       $(document).on("click", "#restorep", function(){
        var id =$(this).attr("dele");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Restore this Game?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {restorep:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Restored!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });

    

    //Delete Game
    $(document).on("click", "#dele", function(){
        var id =$(this).attr("dele");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Delete this Game?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {Dele:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });



    //Delete Game pool
    $(document).on("click", "#delep", function(){
        var id =$(this).attr("dele");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Delete this Game?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-work.php',
                        type: 'POST',
                        data: {Delep:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Deleted!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });



    //User page
    $(document).on("click", "#ban", function(){
        var id =$(this).attr("ban");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Ban this user?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {Ban:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Banned!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    $(document).on("click", "#unban", function(){
        var id =$(this).attr("unban");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Unban this user?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {unBan:1,id:id}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Active!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });



    $(document).on("click", "#payment", function(){
        var email =$(this).attr("email");
        var user =$(this).attr("user");
        var withs =$(this).attr("withs");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Approve Payment?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {Payment:1,user:user, email:email, withs:withs}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Approved!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    $(document).on("click", "#paymentA", function(){
        var email =$(this).attr("email");
        var user =$(this).attr("user");
        var withs =$(this).attr("withs");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Confirm Payment?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {PaymentAwait:1,user:user, email:email, withs:withs}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Confirmed!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });




    $(document).on("click", "#noPay", function(){
        var email =$(this).attr("email");
        var user =$(this).attr("user");
        var withs =$(this).attr("withs");
        var uri = $("#uri").val();
        // alert(id);
        // console.log(email, user, withs);
        
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Reject Request?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {noPay:1,user:user, email:email, withs:withs}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Rejected!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


    //admin withdrawl
    

    $(document).on("click", "#payments", function(){
        var user =$(this).attr("user");
        var withs =$(this).attr("withs");
        var uri = $("#uri").val();
        // alert(id);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Approve Payment?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {Payment:1,user:user, withs:withs}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Approved!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });






    $(document).on("click", "#noPays", function(){
        var user =$(this).attr("user");
        var withs =$(this).attr("withs");
        var uri = $("#uri").val();
        // alert(id);
        // console.log(email, user, withs);
        
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Cancel Request?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
              }).then((result) => {
                if (result.value){
                    $.ajax({
                        url: 'ajax-user.php',
                        type: 'POST',
                        data: {noPays:1,user:user, withs:withs}
                    })
                    .done(function(response){
                        Swal.fire({type: 'success', title:'Cancelled!'});
                        setInterval(function(){
                            window.location.assign(uri);
                        },2000)
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }
        
            });
       
    
        
    });


//Funding payment

$(document).on("click", "#paymentFund", function(){
    var email =$(this).attr("email");
    var user =$(this).attr("user");
    var amount =$(this).attr("amount");
    var withs =$(this).attr("withs");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Approve Funding?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {PaymentFund:1,user:user, email:email, withs:withs,amount:amount}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Approved!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});





$(document).on("click", "#noPayFund", function(){
    var email =$(this).attr("email");
    var user =$(this).attr("user");
    var amount =$(this).attr("amount");
    var withs =$(this).attr("withs");
    var uri = $("#uri").val();
    // alert(id);
    // console.log(email, user, withs);
    
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Cancel Funding?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {noPayFund:1,user:user, email:email, withs:withs,amount:amount}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    setInterval(function(){
                        window.location.assign(uri);
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});



//inbox


$(document).on("click", "#trash", function(){
    var id =$(this).attr("trans");
    // var uri = $("#uri").val();
    // alert(id);
    // console.log(email, user, withs);
    
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Move to trash?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {Trash:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Trashed!'});
                    setInterval(function(){
                        // window.location.assign('inbox');
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});



//staff

$(document).on("click", "#banstaff", function(){
    var id =$(this).attr("ban");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Ban this Staff?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {BanStaff:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Banned!'});
                    setInterval(function(){
                        window.location.assign('accounts');
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});


$(document).on("click", "#unbanstaff", function(){
    var id =$(this).attr("unban");
    var uri = $("#uri").val();
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Unban this Staff?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {unBanStaff:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Active!'});
                    setInterval(function(){
                        window.location.assign('accounts');
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});




$(document).on("click", "#web", function(){
    var id =$(this).attr("web");
    // alert(id);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Delete this?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-user.php',
                    type: 'POST',
                    data: {web:1,id:id}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Deleted!'});
                    setInterval(function(){
                        window.location.assign('set-website');
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
   

    
});






$(document).on("keyup", "#searchForme", function(){
    // var id = $(this).attr("user");
    var input = $("#searchForme").val();
    // alert(input);
    val = input.replace(/^\s|\s $/, "");

	if (val !== "") {	
        $.ajax({
            url: 'search.php',
            type: 'POST',
            dataType:"json",
            data: {Checked:1,id:input},
            success: function(data){
                $("#showResult").html(data);
            }
        })
    }else{
        $.ajax({
        success: function(data){
            $("#showResult").html('');
        }
        })
    }
    
});


$(document).on("click", ".inner", function(e){
    $("#searchForme").val(e.target.innerHTML);
    $.ajax({
        success: function(data){
            $("#showResult").html('');
        }
        })
})



})