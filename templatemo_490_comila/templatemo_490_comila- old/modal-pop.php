<?php




//link button
<a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-lg btn-success smoothScroll wow fadeInUp" data-wow-delay="1.0s">
Login
</a>


//button description
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog">
      <div class="modal-content modal-popup">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2 class="modal-title" style="color: #0004ff">Login</h2>
        </div>
        <form action="controller_epump.php" method="post">
          <center>
          <input name="usid" type="text" class="form-control" id="usid" placeholder="User ID" required="required">
          <select name="type" class="form-control">
            <option style="color: black" value='user'>User</option>
            <option style="color: black" value='employee'>Employee</option>
            <option style="color: black" value='admin'>Admin</option>
            <option style="color: black" value='pumpmanager'>Pump Manager</option>
          </select>
          <input name="pass" type="Password" class="form-control" id="pass" placeholder="Password" required="required">
          <input name="signin" type="submit" class="form-control" id="signin" value="Sign in">
        </center>
        </form>

      </div>
    </div>
  </div>
</div>


//css
.modal-dialog .modal-content {
  background-color: black;
  background-size: cover;
  background-position: center center;
  border-radius: 20px;
  border-color: red;
  text-align: center;
  padding: 80px 60px 80px 60px;
  position: relative;
  border: 3px solid #f20000;
 }

.btn:focus {
  outline: none;
}

.modal-header {
  border-bottom: 0px;
}

.modal-dialog .close {
  color: #f1c11a;
  font-size: 40px;
  font-weight: 300;
  text-shadow: none;
  opacity: 1;
  position: absolute;
  top: 40px;
  right: 40px;
  border: 2px solid #ffffff;
  border-radius: 100px;
  width: 36px;
  height: 36px;
  line-height: 35px;
  text-align: center;
}

.modal-dialog .close:focus {
  outline: none;
}

.modal-dialog form {
  padding: 20px;
}
.modal-dialog form input {
  height: 55px;
}
.modal-dialog form .form-control {
  background: transparent;
  border: 1px solid #f0f0f0;
  border-radius: 0px;
  box-shadow: none;
  font-size: 15px;
  color: #fff;
  margin-bottom: 20px;
  height: 30px;
  width: 400px;
  transition: all 0.4s ease-in-out;
}

.modal-dialog form input[type="submit"] {
  background: #ffffff;
  color: #242424;
  text-transform: uppercase;
  margin-top: 30px;
}
.modal-dialog form input[type="submit"]:hover {
  background: #f1c11a;
  border-color: transparent;
  color: #ffffff;
}
