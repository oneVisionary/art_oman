<?php include("common/header.php")?>
    <main>
        <div class="register_form">
            <div class="register-heading">
                <h2>Login</h2>
                <p>Need to create an account? <a href="SignUp.php">create</a> </p>
            </div>
            <div class="register_form_container" method="post">
                <form method="post" id="SigInForm" >
                  
                    <div class="form-control">
                        <label >EMAIL</label>
                            <input type="email" placeholder="Email address" name="email">
                    </div>
                    <div class="form-control">
                        <label> PASSWORD</label>
                            <input type="password" placeholder="*******" name="password">
                    </div>
                    <div class="form-control">
                        <input type="submit" class="signUpBtn" value="Sign In">
                    </div>
                </form>
            </div>
       
       </div>
    </main>
    <script>
        $(document).ready(()=>{
           
            $("#SigInForm").submit((e)=>{
                e.preventDefault();
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();
                console.log(email)
                console.log(password)
                if(email == "admin@gmail.com" && password=="admin"){
                    window.location.href = "admin/viewExpert.php";
                }
                else{
                    var formdata = $(e.target).serialize();
                console.log(formdata)
                $.ajax({
                    type:"POST",
                    url:"server/login_services.php",
                    data:formdata,
                    success:function(response){
                        console.log(response)
                       if(response!=""){
                        if(response == "NA"){
                            window.location.href= "new_artist/dashboard.php"
                        }
                        else{
                            window.location.href= "expert/dashboard.php"
                        }
                        
                       }
                       else{
                        alert("Invalid email or password")
                       }
                        
                    },
                    error:function(xhr,status,error){
                        alert("Error"+error)
                    }

                })  
                }
         
            })
           
        })
    </script>
    <?php include("common/footer.php")?>