<?php

                            //find out the star of each category
                            $cot = $conn->query("SELECT * FROM `dstar_rating` INNER JOIN `dpools` ON dstar_rating.dcategory_id= dpools.dcategory_ids WHERE dpools.dcategory_ids='$cat' AND dstar_rating.duser_id='$id' ");
                            if($cot->num_rows > 0){
                            //test the star
                            while($cr = $cot->fetch_assoc()):
                          
                              if($cr["dgame"]=="bronze"){ 
                                //check odd condition
                                $bronzex = $conn->query("SELECT * FROM `dpool_bronze` ");
                                while($qz = $bronzex->fetch_assoc()):

                                    $won = clean($qz['dgame_won']);
                                    // echo $cr['dtotal'].' '.$won;
                                    if($cr['dtotal']== $won ){
                                    if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }elseif($qz['dstatus']=='silver'){
                                        if($cr['dtotal'] == $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }elseif($qz['dstatus']=='gold'){
                                        if($cr['dtotal'] >= $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }else{
                                        echo $star = 'Free Mode';
                                      }
                                    }elseif($cr['dtotal'] >= $won){
                                        // echo 'yes';
                                        if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='silver'){
                                          if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='gold'){
                                          if($cr['dtotal'] >= $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }
                             
                                    }elseif($cr['dtotal'] <= $won){
                                        // echo 'yes';
                                        if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='silver'){
                                          if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='gold'){
                                          if($cr['dtotal'] >= $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }else{
                                            echo $star = 'Free Mode';
                                          }
                             
                                    }
                                    endwhile;

                              }elseif($cr["dgame"]=="silver"){ 

                                //check odd condition
                                $bronze = $conn->query("SELECT * FROM `dpool_silver`");
                                while($qz = $bronze->fetch_assoc()):

                                    $won = clean($qz['dgame_won']);
                                    // echo $cr['dtotal'].' '.$won;
                                    if($cr['dtotal']== $won ){
                                    if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }elseif($qz['dstatus']=='silver'){
                                        if($cr['dtotal'] == $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }elseif($qz['dstatus']=='gold'){
                                        if($cr['dtotal'] >= $won){
                                          echo $star = '<i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>
                                          <i class="fa fa-star text-warning"></i>';
                                        }
                                      }else{
                                        echo $star = 'Free Mode';
                                      }
                                    }elseif($cr['dtotal'] >= $won){
                                        // echo 'yes';
                                        if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='silver'){
                                          if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='gold'){
                                          if($cr['dtotal'] >= $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }
                             
                                    }elseif($cr['dtotal'] <= $won){
                                        // echo 'yes';
                                        if($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='silver'){
                                          if($cr['dtotal'] == $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }elseif($qz['dstatus']=='gold'){
                                          if($cr['dtotal'] >= $won){
                                            echo $star = '<i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                          }
                                        }else{
                                            echo $star = 'Free Mode';
                                          }
                             
                                    }
                                    endwhile;

                              
                            }
                            endwhile;
                        }
                              
                            
                            