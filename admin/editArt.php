<?php include("header.php") ?>
<h4>Edit Artist Art</h4>
<div class="register_form_container expert">
                <form  method="post" id="editForm" class="expertform">
                    <div class="form-control">
                        <label >Title</label>
                       
                        <input type="hidden" placeholder="id" id="id" name="id" >
                            <input type="text" placeholder="title" id="title" name="title" >
                    </div>
                    <div class="form-control">
                        <label >Description</label>
                            <input type="text" placeholder="description" id="description" name="description" >
                    </div>
                    <div class="form-control">
                        <label >Price</label>
                            <input type="number" placeholder="price" id="price" name="price" >
                    </div>
                    <div class="form-control">
                        <input type="submit" class="signUpBtn" value="Update Art">
                    </div>
                </form>
            </div>
<script>
  var artData =JSON.parse(localStorage.getItem('artData'));
 console.log(artData)

 document.getElementById('title').value = artData.title;
        document.getElementById('description').value = artData.description;
        document.getElementById('price').value = artData.price;
        document.getElementById('id').value = artData.art_id;
        $(document).ready(()=>{
            $("#editForm").submit((event)=>{
                event.preventDefault();
               console.log(event)
               var formData = $(event.target).serialize();
                $.ajax({
                    type:"POST",
                    url:"../server/editartwork.php",
                    data:formData,
                    success:function(response){
                        alert(response);
                        $("#editForm")[0].reset();
                        window.location.href = "viewArt.php"
                    },
                    error:function(xhr,status,error){
                        alert("Error"+error)
                    }
                })
            })
        
        });

</script>

<?php include("footer.php") ?>
