<?php
require 'clean.php';

$user = clean($_SESSION['userId']);

$result ='';
if(isset($_POST['Checked'])):
    $id = clean($_POST['id']);
    $c = $conn->query("SELECT dresult FROM `dpool_code` WHERE duserid='$user' AND dodd='$id' AND dresult='pending' ");
    if($c->num_rows>0){
        $result .='<p class="text-danger">Sorry! The result of your previous game must have been determined before you can sell any game under this category</p>';
    }else{
        $result .='
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="frm-group">
                                        <label for="nab"> Enter Pool Number here </label>
                                        <input type="text" name="game" placeholder="e.g 10, 20, 30" class="form-controlb">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="frm-group">
                                        <label for="nab"> Enter Pool Week here </label>
                                        <input type="text" name="week" placeholder="e.g 10" class="form-controlb">
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
                                        <input type="text" name="time" value="'. date("H:i") .'"  class="form_datetime" required id="cod" placeholder="Time Of First Game">
                                        </div>
                                    </div>

                                
                                </div>
                                
                                    <div class="frm-group">
                                        <button type="submit" name="load" class="submit-btn">Proceed</button>
                                    </div>
        
        ';
    }






















endif;

echo $result;