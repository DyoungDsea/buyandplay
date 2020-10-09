<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');ga('create','UA-42761673-1','extracoding.com');ga('send','pageview');</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script src="../shared/toastr.min.js"></script>
<script src="buy.js"></script>
<script src="blog.js"></script>
<script src="testimonial.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="ckeditor/ckeditor.js"></script>


<script>
  // CKEDITOR.replaceAll("editor");
</script>
<script>
  var allElement = document.querySelectorAll( '.editor' );
      for (let i = 0; i < allElement.length; i++) {
        ClassicEditor.create(allElement[i])
        .catch( error => {
            console.error( error );
        } );
        
      }
      
       ClassicEditor.create(document.querySelector('#editor'))


       $(document).ready(function(){
        $("#pick").datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
      })
        
 </script>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-primary" href="../logout">Logout</a>
        </div>
      </div>
    </div>
  </div>



  
<div class="modal fade" id="maxp" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="request-process" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Withdrawal Request</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                        

                        <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="text" name="number" pattern="^[0-9]*$" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                               
                            </div>

                           
                           
                            
                            

                        <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="text" name="amount" id="check" user="2147483647" title="Only number is allow" required pattern="^[0-9]*$" placeholder="Amount Here..." class="form-control form-control-sm">
                                        <div id="result" style="color:red"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="pass" class="form-control" required="required">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                    <div id="button">
                        <button type="submit" name="load"  class="btn btn-primary btn-sm">Proceed</button>
                    </div>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div>




  <?php
    if(isset($_SESSION['msg'])){ ?>
    <script> 
    toastr.options = {
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onClcik":null,
      "fadeIn":300,
      "fadeOut":1000,
      "timeOut":5000,
      "extendedTimeOut":1000
    }
    toastr.error("<?php echo $_SESSION['msg']; ?>"); 
    </script>
    <?php
unset($_SESSION['msg']);
  } ?>

<?php
    if(isset($_SESSION['msgs'])){ ?>
    <script> 
    toastr.options = {
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onClcik":null,
      "fadeIn":300,
      "fadeOut":1000,
      "timeOut":5000,
      "extendedTimeOut":1000
    }
    toastr.success("<?php echo $_SESSION['msgs']; ?>"); 
    </script>
    <?php
unset($_SESSION['msgs']);
  } ?>


  