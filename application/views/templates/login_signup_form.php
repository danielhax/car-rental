<div class="container">    
    <!-==========================LOGIN BOX=================================== ->
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <?php echo form_open('login', array('class' => 'form-horizontal' , 'id' => 'loginform', 'role' => 'form' )); ?>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-email" type="text" class="form-control" name="email" value="" placeholder="email" required>                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                </div>



                <div class="input-group">
                  <div class="checkbox">
                    <label>
                      <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                  </label>
              </div>
          </div>


          <div style="margin-top:10px" class="form-group">
            <!-- Button -->

            <div class="col-sm-12 controls">
              <button type="submit" id="btn-login" href="#" class="btn btn-success">Login  </button>
          </div>
      </div>


      <div class="form-group">
        <div class="col-md-12 control">
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                Don't have an account?
                <a href="#" class="signup-link">
                    Sign Up Here
                </a>
            </div>
        </div>
    </div>    
    <?php echo form_close(); ?>    



</div>                     
</div>  
</div>

<!-==========================SIGNUP BOX=================================== ->
<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" class="login-link">Sign In</a></div>
        </div>  
        <div class="panel-body" >
            <?php echo form_open( base_url('register'), array('class' => 'form-horizontal' , 'id' => 'signupform', 'role' => 'form' )); ?>

            <div id="signupalert" style="display:none" class="alert alert-danger">
                <p>Error:</p>
                <span></span>
            </div>



            <div class="form-group">
                <label for="email" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                </div>
            </div>

            <div class="form-group">
                <label for="firstname" class="col-md-3 control-label">First Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-md-3 control-label">Last Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>

            <div class="form-group">
                <!-- Button -->                                        
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div> 
</div>

<script type="text/javascript">
    $(function(){
        $("#signupform").submit(function(e){
            e.preventDefault();

            $.ajax({
                url: "<?php echo base_url(); ?>" + "user/register",
                type: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data){
                    alert(data.message);
                },
                error: function(xhr) {
                   alert(xhr.responseText);
                }
            });
            
        });

        $("#loginform").submit(function(e){
            e.preventDefault();

            $.ajax({
                url: "<?php echo base_url(); ?>" + "user/login",
                type: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data){
                    if(data.success != null){
                        alert(data.message);

                        if(data.success == true)
                            window.location.href = "<?php echo base_url(); ?>user";
                    }
                },
                error: function(xhr) {
                    window.location.href = "<?php echo base_url(); ?>";
                }
            });
            
        });

        $(".signup-link").click(function(e){
            e.preventDefault();

            $('#loginbox').hide(); 
            $('#signupbox').show();
        });


        $(".login-link").click(function(e){
            e.preventDefault();

            $('#signupbox').hide();
            $('#loginbox').show();
        });
    });
</script>