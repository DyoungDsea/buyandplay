$(document).ready(function(){
    // $('#myTable').DataTable();
    //check user wallet
    $(document).on("keyup", "#check", function(){
        var id = $(this).attr("user");
        var input = $("#check").val();
        if(input.length == 4){
            $.ajax({
                url: 'ajax-check.php',
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



//delete inbox sms
$(document).on("click","#smsRemove", function(){
    var id = $(this).attr("trans");
    // alert(id);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {smsRemove:1, id:id}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("message");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });

});


//delete sent sms
$(document).on("click","#delete1", function(){
    var id = $(this).attr("sentSms");
    // alert(id);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {sentSms:1, id:id}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("sent-messages");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });

})

//cancelled withdral fund
$(document).on("click","#canRequest", function(){
    var id = $(this).attr("sentSms");
    var amount = $(this).attr("amount");
    // alert(id);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'You want to cancel?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {canRequest:1, id:id,amount:amount}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("withdrawal-history");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });

})



$("#myselect").change(function() {
    // var selectedVal = $("#myselect option:selected").text();
    var selectedVal = $("#myselect option:selected").val();
    // alert("Hi, your favorite programming language is " + selectedVal);
    if(selectedVal != ''){
        // alert("Hi, your favorite programming language is " + selectedVal);
        $.ajax({
            url: 'ajax-play.php',
            type: 'POST',
            // dataType:"json",
            data: {Checked:1,id:selectedVal},
            success: function(data){
                $("#game").html(data);
                $( "#datepicker" ).datepicker({dateFormat: 'dd-mm-yy'});
            }
        })
    }else{
        $.ajax({
            
            success: function(data){
                $("#game").html('');
            }
        })
    }
});




$("#myselects").change(function() {
    // var selectedVal = $("#myselect option:selected").text();
    var selectedVal = $("#myselects option:selected").val();    
    // alert("Hi, your favorite programming language is " + selectedVal);
    if(selectedVal != ''){
        // alert("Hi, your favorite programming language is " + selectedVal);
        $.ajax({
            url: 'ajax-pool.php',
            type: 'POST',
            // dataType:"json",
            data: {Checked:1,id:selectedVal},
            success: function(data){
                $("#game").html(data);
                $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
            }
        })
    }else{
        $.ajax({
            
            success: function(data){
                $("#game").html('');
            }
        })
    }
});



})

