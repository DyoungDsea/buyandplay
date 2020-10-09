 
        <div class="table-responsive">
        <table class="table table-borderedx">
        <thead>
          <tr>
            <td style="width:20%"></td>
            <td>Account Details</td>
          </tr>
        </thead>

        <tbody>
        <?php 
        $id = clean($_SESSION["userId"]);
          $a = $conn->query("SELECT * FROM `members_register` WHERE userid='$id'");
          $as = $a->fetch_assoc();

        ?>
          <tr>
            <td>Username</td>
            <td><?php echo $as['username']; ?></td>
          </tr>

          <tr>
            <td>Fullname</td>
            <td><?php echo $as['dname']; ?></td>
          </tr>

          <tr>
            <td>Email</td>
            <td><?php echo $as['demail']; ?></td>
          </tr>

          <tr>
            <td>Phone No</td>
            <td><?php echo $as['dnumber']; ?></td>
          </tr>

          <tr>
            <td>Wallet Balance</td>
            <td><?php if($as['dwallet_balance']!=0){ echo formatNaira($as['dwallet_balance']); }else{ echo '&#8358;0.00'; } ?></td>
          </tr>

          <tr>
            <td>Category</td>
            <td><?php echo $as['dcategory']; ?></td>
          </tr>

          <tr>
            <td>Address</td>
            <td><?php echo $as['address']; ?></td>
          </tr>
        </tbody>
        </table>
        </div>

        
        <div class="text-center mb-4">        
        <a href="update-account" class="cmn-btn btn-lg" style="width:100px">Edit Account</a>
        </div>