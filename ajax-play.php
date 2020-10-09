<?php
require 'clean.php';

$user = clean($_SESSION['userId']);

$result ='';
if(isset($_POST['Checked'])):
    $id = clean($_POST['id']);
    $c = $conn->query("SELECT dresult FROM `dbooking_code` WHERE userid='$user' AND dodd='$id' AND dresult='pending' ");
    if($c->num_rows>0){
        $result .='<p class="text-danger">Sorry! The result of your previous game must have been determined before you can sell any game under this category</p>';
    }else{
        $result .='
        <div class="row" style="margin-top:-25px">
        <div class="col-md-8">
          
            <div class="frm-group">
            <!-- <label for="code"> Booking Code</label> -->
            <input type="text" name="code" required id="code" placeholder="Enter Booking Code ">
            </div>
        </div>
        <div class="col-md-4">
          <div class="frm-group">
            <!-- <label for="code">Booking Site </label> -->
          <select name="web" id="" required class="form-controlx">
          <option value="">Choose </option>';         
          $s = $conn->query("SELECT * FROM `dweb_name`");
          if($s->num_rows>0):
            while($rt=$s->fetch_assoc()):
              $result .='<option value="'.$rt['dweb_id'].'">'. ucfirst($rt['name']).'</option>';
           endwhile; endif; 
           $result .=' </select>
        </div>
        </div>
        </div>


        <div class="row" style="margin-top:-25px">
          <div class="col-md-8">
          <div class="frm-group">
            <input type="text" name="coupon" required id="code" placeholder="Enter Bet Slip Number...">
            </div>
          </div>

          <div class="col-md-4">
          <div class="frm-group">
          <select name="cweb2" id="" required class="form-controlx">
          <option value="">Choose </option>';

          $s = $conn->query("SELECT * FROM `dweb_name`");
          if($s->num_rows>0):
            while($rt=$s->fetch_assoc()):
                $result .='<option value="'. $rt['dweb_id'].'">'. ucfirst($rt['name']).'</option>';
            endwhile; endif; 
            $result .=' </select>
        </div>
        </div>

          

          <div class="col-md-12">
          <div class="frm-group">
            <input type="text" name="odd-num" required id="code" placeholder="Enter Total Odd">
            </div>
          </div>

        </div>

        <div class="row" style="margin-top:-25px">                                  
       
          <div class="col-md-6">
            <div class="frm-group">
              <label for="cod" style="font-size:14px; font-weight:normal">Date Of First Game</label>
              <input type="text" name="start" value="'. date("d-m-Y") .'"  class="form_datetimex" required id="datepicker" placeholder="Date Of First Game">
            </div>

          </div>

          <div class="col-md-6">
            <div class="frm-group">
              <label for="cod" style="font-size:14px; font-weight:normal">Time Of First Game</label>
              <input type="text" name="end" value="'. date("H:i") .'"  class="form_datetime" required id="cod" placeholder="Time Of First Game">
            </div>
          </div>

          
        </div>

        
        <br>
        


        <div class="frm-group">
        <button type="submit" name="load" class="submit-btn">Proceed</button>
        </div>';
    }

endif;

echo $result;

// $data = array(
//     'result' => $result    
// );	

// echo json_encode($data);