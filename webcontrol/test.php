
<?php  
                        $user = $conn->query("SELECT * FROM `admin_accounts` WHERE userid='$idc'")->fetch_assoc();
                        if($user['dposition'] !="administrator"){
                            $level = $user['dprivileges'];
                                $exploded = explode(',', $level);
                        
                                if(!in_array('Users', $exploded)){
                                    header("Location: index");
                                }
                            }