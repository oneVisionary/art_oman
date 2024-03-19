<?php include("header.php") ?>
<h4>Edit Artist</h4>
<div class="register_form_container expert">
                <form  method="post" id="editForm" class="expertform">
                    <div class="form-control">
                        <label >NAME</label>
                        <input type="hidden" placeholder="mode" id="mode" name="mode" value="EA">
                        <input type="hidden" placeholder="id" id="id" name="id" >
                            <input type="text" placeholder="Username" id="username" name="username" >
                    </div>
                    <div class="form-control">
                        <label >EMAIL</label>
                            <input type="email" placeholder="Email address" id="email" name="email" >
                    </div>
                    <div class="form-control">
                        <label >PASSWORD</label>
                            <input type="text" placeholder="*******" id="password" name="password" >
                    </div>
                    <div class="form-control">
                        <input type="submit" class="signUpBtn" value="Update Expert">
                    </div>
                </form>
            </div>
<script>
  var expertData =JSON.parse(localStorage.getItem('expertData'));
  var res = JSON.parse(expertData)
        document.getElementById('username').value = res.username;
        document.getElementById('email').value = res.email;
        document.getElementById('password').value = res.password;
        document.getElementById('id').value = res.id;


        $(document).ready(()=>{
            $("#editForm").submit((event)=>{
                event.preventDefault();
               console.log(event)
               var formData = $(event.target).serialize();
                $.ajax({
                    type:"POST",
                    url:"../server/register_services1.php",
                    data:formData,
                    success:function(response){
                        alert(response);
                        $("#editForm")[0].reset();
                        window.location.href = "viewArtistList.php"
                    },
                    error:function(xhr,status,error){
                        alert("Error"+error)
                    }
                })
            })
        
        });

</script>

<?php include("footer.php") ?>
