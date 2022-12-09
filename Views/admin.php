
    <?php
    // echo"<pre>";
    // print_r($selectData);
    // exit;


    ?>

    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Gender</th>
            <th scope="col">Adress</th>
            <th scope="col">State</th>
            <th scope="col">Hobby</th>
            <th scope="col">Profile Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // for serial number
        $s=1;
        // loop for show one by one
        foreach ($selectData['Data'] as $user) {

        ?>

          <tr>
            <th scope="row"><?php echo $s; ?></th>
            <td><?php echo $user->fname.' '.$user->lname; ?></td>
            <td>
            <p style="color:tomato;border:2px solid tomato;border-radius:50px;text-align:center;padding:5px 10px">
            <?php
             if($user->roll_id == 0){
                echo "User";
             }
             if($user->roll_id == 1){
                echo "Admin";
             }
             ?>
             </p>
             </td>
            <td><?php  echo $user->email; ?></td>
            <td><?php echo $user->contact; ?></td>
            <td><?php echo $user->gender; ?></td>
            <td><?php echo $user->adress; ?></td>
            <td>
            <?php 
            if ($user->state == 'gj') {
                echo 'Gujrat';
            }
            if ($user->state == 'dl') {
                echo 'Delhi';
            }
            if ($user->state == 'rj') {
                echo 'Rajasthan';
            }
            if ($user->state == 'mh') {
                echo 'Maharashtra';
            }
            if ($user->state == 'sk') {
                echo 'Sikkim';
            }
            if ($user->state == 'pb') {
                echo 'Punjab';
            }

            ?>
            </td>
            <td><?php echo $user->hobbies; ?></td>
            <td><img src="<?php echo 'uploads/' . $user->profile;?>" alt="" width="50px"></td>
            <td>
                <a href="update.php?user=<?php echo $user->id; ?>" class="btn btn-warning edit-button">Edit</a>
                <a href="delete.php?user=<?php echo $user->id; ?>" class="btn btn-danger delete-button" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
            </td>
          </tr>
          <?php
            // increase one by one serial number
            $s++;
            }
          ?>

        </tbody>
      </table>