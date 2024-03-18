<?php include("header.php")?>
<h4>Add Expert Arts</h4>
<div class="register_form_container expert">
    <form method="post" id="artForm" class="expertform artadd" enctype="multipart/form-data">
        <div class="form-control">
            <label for="">Title</label>
            <input type="hidden" placeholder="userid" id="userid" name="userid" value="EA">
            <input type="text" placeholder="title" id="title" name="title">
        </div>
        <div class="form-control">
            <label for="email">Description</label>
            <textarea placeholder="Description" id="description" name="description"></textarea>
        </div>
        <div class="form-control">
            <label for="">Price</label>
            <input type="number" placeholder="Price" id="price" name="price">
        </div>
        <div class="form-control">
            <label for="">Art</label>
            <input type="file" id="imageInput" accept="image/jpeg" name="artwork">
        </div>
        <div class="form-control">
            <input type="submit" class="signUpBtn" value="Add Art">
        </div>
    </form>
</div>

<script>
 $(document).ready(() => {
    var artData = JSON.parse(localStorage.getItem('artInfo'));
    var artistid = 0
    if (!artData.userid) {
       artistid =artData[0].artist_id
    } else {
        artistid=artData.userid;
    }
   
        document.getElementById("userid").value = artistid;
        console.log(artData);
    $('#artForm').submit((event) => {
        event.preventDefault();

        var formData = new FormData($('#artForm')[0]); 

      
        $.ajax({
            url: '../server/add_artwork.php', 
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response)
                $("#artForm")[0].reset();
                console.log(response); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
                
            }
        });
    });
});

</script>
<?php include("footer.php")?>
