<?php include("header.php")?>
<h4>Add Expert Artist</h4>
<div class="register_form_container expert">
                <form  method="post" id="SignupForm" class="expertform">
                    <div class="form-control">
                        <label for="">NAME</label>
                        <input type="hidden" placeholder="mode" id="mode" name="mode" value="EA">
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
                        <input type="submit" class="signUpBtn" value="Add Expert">
                    </div>
                </form>
            </div>

            <script>
        $(document).ready(()=>{
            $("#SignupForm").submit((event)=>{
                event.preventDefault();
               console.log(event)
               var formData = $(event.target).serialize();
                $.ajax({
                    type:"POST",
                    url:"../server/register_services.php",
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
<?php include("footer.php")?>