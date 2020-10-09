<?php


                            $cot = $conn->query("SELECT * FROM `dstar_rating` INNER JOIN `dgame_categories` ON dstar_rating.dcategory_id= dgame_categories.category_id WHERE dgame_categories.category_id='$catx' AND dstar_rating.duser_id='$userx' AND dgame_categories.dstatus='active' ");
                            if($cot->num_rows > 0){
                            //test the star
                            while($cr = $cot->fetch_assoc()):

                                // echo $cr['category_id'];
                                $cat_id = $cr['category_id'];

                                $bronzex = $conn->query("SELECT * FROM `dgeneral_booking` WHERE dcat_id='$cat_id' ");
                                while($qz = $bronzex->fetch_assoc()):
                                    // echo $qz['dcat_id'].' '.$qz['dcategory'].' '.$qz['dgame_won'].' '.$qz['dstar'].' '.$qz['dstatus'].'<br>';

                                    $won = clean($qz['dgame_won']);
                                    
                                    if($qz['dstatus']=='Free'){
                                        if($cr['dtotal'] <= $won){
                                            echo 'Free Mode';
                                        }
                                    }elseif($qz['dstatus']=='bronze'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                        }
                                    }elseif($qz['dstatus']=='silver'){
                                        if($cr['dtotal'] == $won){
                                            echo $star = '
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                        }
                                    }elseif($qz['dstatus']=='gold'){
                                        if($cr['dtotal'] >= $won){
                                            echo $star = '
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>';
                                        }
                                    }

                                endwhile;
                        endwhile;
                        }

                   