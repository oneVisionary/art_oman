<?php include("common/header.php")?>
    <main>
        <div class="register_form">
            <div class="register-heading">
                <h2>Create a New Account</h2>
                <p>Already Registered? <a href="SignIn.php">Login</a> </p>
            </div>
            <div class="register_form_container">
                <form  method="post" id="SignupForm">
                    <div class="form-control">
                        <label for="">NAME</label>
                            <input type="text" placeholder="Username" id="username" name="username">
                    </div>
                    <div class="form-control">
                        <label for="">EMAIL</label>
                            <input type="email" placeholder="Email address" id="email" name="email">
                    </div>
                    <div class="form-control">
                        <label for="">PASSWORD</label>
                            <input type="password" placeholder="*******" id="password" name="password">
                    </div>
                    <div class="form-control">
                        <input type="submit" class="signUpBtn" value="Sign Up">
                    </div>
                </form>
            </div>
       
       </div>
    </main>
    <script>
        $(document).ready(()=>{
            $("#SignupForm").submit((event)=>{
                event.preventDefault();
               console.log(event)
               var formData = $(event.target).serialize();
                $.ajax({
                    type:"POST",
                    url:"server/register_services.php",
                    data:formData,
                    success:function(response){
                        alert(response);
                        $("#SignupForm")[0].reset();

                    },
                    error:function(xhr,status,error){
                        alert("Error"+error)
                    }
                })
            })
        
        });
    </script>
    <?php include("common/footer.php")?>