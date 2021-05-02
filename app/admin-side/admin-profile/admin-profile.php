<div class="left-side-content">
    <div>
        <img src="assets/images/profile.png" id="profile_pic">
        <img src="assets/images/upload.png" id="upload">
    </div>
    <p>Description</p>
    <textarea rows="" cols=""></textarea>
</div>

<div class="right-side-content">
    <div>
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" value="" id="Nickname">
        <i class="material-icons" data-type="done">done</i>
    </div>
    
    <div>
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" value="" id="Fullname">
        <i class="material-icons" data-type="error">error</i>
    </div>

    <div>
        <label for="Email">Email</label>
        <input type="text" name="Email" value="" id="Email">
        <i class="material-icons" data-type="done">done</i>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" value="" id="Password">
        <i class="material-icons" data-type="done">done</i>
    </div>

    <div>
        <label for="repassword">Repeat</label>
        <input type="password" name="repassword" value="" id="Repeat">
        <i class="material-icons" data-type="done">done</i>
    </div>

    <div>
        
        <label for="role">Role</label>
        <label for="birthdate" >Date of birth</label>

        <select name="role" id="Role">
            <option value="" disabled selected>Select Role</option>
            <option value="1">Painter</option>
            <option value="2">Blogger</option>
        </select>
        <input type="date" name="birthdate" id="birthdate">

    </div>

    <div>
        <button type="button" name="save" id="save">Save</button>
        <button type="button" name="discard" id="discard">Discard</button>
    </div>
</div>