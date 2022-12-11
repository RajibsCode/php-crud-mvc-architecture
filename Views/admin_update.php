<div class="user-registration mt-5 mb-5" style="width:600px;margin: 0 auto">
        <h4>Update User</h4>
        <form class="mt-3" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="firstname" class="form-label">First name</label>
          <input value="<?php echo $user_data->fname; ?>" type="text" class="form-control" id="firstname" name="firstname">
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input value="<?php echo $user_data->lname; ?>" type="text" class="form-control" id="lastname" name="lastname">
        </div>   
        <?php
        if ($_SESSION['user_data']->role_id == 1) {
        ?>
        <div class="mb-3">
            <label class="form-label">User Role</label>
            <select class="form-select" aria-label="Default select example"  name="role_id">
                <option >select</option>
                <option
                <?php
                 // 6 update - dynamic selected attribute
                 if($user_data->role_id == 0) {echo 'selected';} ?>
                 value="0">User</option>
                <option
                <?php if($user_data->role_id == 1) {echo 'selected';} ?> value="1">Admin</option>
            </select>
        </div>
        <?php
        }
        ?>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input  value="<?php echo $user_data->email; ?>" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Create Password</label>
          <input value="<?php echo $user_data->password; ?>" type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input value="<?php echo $user_data->contact; ?>" type="tel" class="form-control" id="contact" name="contact">
        </div>

        <div class="mb-3">
            <label class="form-label">Your Gender</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" 
                <?php // 6 update - dynamic checked attribute?>
                <?php if ($user_data->gender == 'male') {echo 'checked';} ?>
                >
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                <?php if ($user_data->gender == 'female') {echo 'checked';} ?>
                >
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3"><?php echo $user_data->adress; ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">State</label>
            <select class="form-select" aria-label="Default select example"  name="state">
                <option >select</option>
                <option
                <?php
                 // 6 update - dynamic selected attribute
                 if($user_data->state == 'gj') {echo 'selected';} ?>
                 value="gj">Gujrat</option>
                <option
                <?php if($user_data->state == 'dl') {echo 'selected';} ?> value="dl">Delhi</option>
                <option
                <?php if($user_data->state == 'rj') {echo 'selected';} ?> value="rj">Rajasthan</option>
                <option
                <?php if($user_data->state == 'mh') {echo 'selected';} ?> value="mh">Maharashtra</option>
                <option
                <?php if($user_data->state == 'sk') {echo 'selected';} ?> value="sk">Sikkim</option>
                <option
                <?php if($user_data->state == 'pb') {echo 'selected';} ?> value="pb">Punjab</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Your Image</label>
            <?php // 8 update - show current image  ?>
            <img src="<?php echo'uploads/'.$user_data->profile; ?>" alt="" width="80px">
            <input name="profile" class="form-control" type="file">
        </div>

        <div class="mb-3">
            <label class="form-label">Hobbies</label>
            <br>
            <?php
            // 7 update - dynamic selected attribute
            $hobbies_arr = explode(',',$user_data->hobbies);// get hobbies without comma
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="travel" value="travel" name="hobbies[]"

                <?php if(in_array('travel',$hobbies_arr)){echo'checked';} ?>>

                <label class="form-check-label" for="travel">Travel</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="music" value="music" name="hobbies[]" 

                <?php if(in_array('music',$hobbies_arr)){echo'checked';} ?>>

                <label class="form-check-label" for="music">Music</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="coding" value="coding" name="hobbies[]"
                
                <?php if(in_array('coding',$hobbies_arr)){echo'checked';} ?>>

                <label class="form-check-label" for="coding">Coding</label>
            </div>
        </div>

        <button name="update" id="update" type="submit" class="btn btn-success">Update Your Data</button>
      </form>
    </div>