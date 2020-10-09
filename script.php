

  <!-- main jquery library js file -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- //popper -->
<script src="assets/js/popper.js"></script>
  <!-- bootstrap js file -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="_timepicker.min.js"></script>
  <script src="jquery-ui.js"></script>
  <!-- slick slider js file -->
  <script src="assets/js/slick.min.js"></script>
  <!-- lightcase js file -->
  <script src="assets/js/lightcase.js"></script>
  <!-- wow js file -->
  <script src="assets/js/wow.min.js"></script>
  <!-- tweenmax js file -->
  <script src='assets/js/TweenMax.min.js'></script>
  <!-- main js file -->
  <script src="assets/js/main.js"></script>
  <script src="shared/toastr.min.js"></script>
  <script src="shared/sweetalert.js"></script>
  <script src="buy.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->


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

<script>

$(document).ready(function(){
  $("#pick").datepicker({ dateFormat: 'dd-mm-yy' });
  $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
})

</script>

  
<script >
    var $input = $('#check'),
    $register = $('#register');    
    $register.attr('disabled', true);
    // console.log($input);
    
    
    $input.click(function() { 
        var trigger = false;
            if (!$(this).val()) {
                trigger = true;
            }
        trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');
    });
    </script>