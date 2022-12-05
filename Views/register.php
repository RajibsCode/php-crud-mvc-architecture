
    <div class="user-registration mt-5 mb-5" style="width:600px;margin: 0 auto">
        <h4>Register Now</h4>
        <a href="#">Already Have Account!</a>
        <form class="mt-3" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="firstname" class="form-label">First name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" required="">
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required="">
        </div>   

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required="">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Create Password</label>
          <input type="password" class="form-control" id="password" name="password" required="">
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contact" name="contact" required="">
        </div>

        <div class="mb-3">
            <label class="form-label">Your Gender</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3" required=""></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">State</label>
            <select class="form-select" aria-label="Default select example" required="" name="state">
                <option selected>select</option>
                <option value="gj">Gujrat</option>
                <option value="dl">Delhi</option>
                <option value="rj">Rajasthan</option>
                <option value="mh">Maharashtra</option>
                <option value="sk">Sikkim</option>
                <option value="pb">Punjab</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Your Image</label>
            <input name="profile" class="form-control" type="file" required="">
        </div>

        <div class="mb-3">
            <label class="form-label">Hobbies</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="travel" value="travel" name="hobbies[]">
                <label class="form-check-label" for="travel">Travel</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="music" value="music" name="hobbies[]>
                <label class="form-check-label" for="music">Music</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="coding" value="coding" name="hobbies[]>
                <label class="form-check-label" for="coding">Coding</label>
            </div>
        </div>

        <button name="register" type="submit" class="btn btn-success">Create Account</button>
      </form>
    </div>