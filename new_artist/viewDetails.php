<?php include("header.php")?>
<main>
    <input type="hidden" id="new_artist_userid" value="<?php echo $userid;?>"/>
    <div class="card-details">
        <div class="card-container">
            <div class="imgview">
                <img  alt="" id="img" height="250px" width="250px">
            </div>
            <div class="artdetails">
                <div id="title"  class="title"></div>
                <div id="description" class="description"></div>
                <div id="price" class="price"></div>
                <button onclick="buy()">Buy Now</button>
            </div>
        </div>
    </div>
</main>

<script>
      var userid = document.getElementById("new_artist_userid").value;
        
        console.log("Current userid: " + userid);
        var artid = 0
      let buy = ()=>{
           

            $.ajax({
                type:"GET",
                url:"../server/order_service.php",
                data: { artist_userid: userid,artid:artid },
                
                success:function(response){
                    alert("Order Place successfully")
                    window.location.href ='dashboard.php'
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
    $(document).ready(() => {
        var artData = JSON.parse(localStorage.getItem('artData'));
        var title = artData.title;
        var img = artData.img;
        var description = artData.description;
        var price = artData.price;
        artid = artData.art_id
        console.log(title);
        $('#img').attr('src', '../asset/images/expertArtwork/'+img);
      
        $('#title').text(title);
        $('#description').text(description);
        $('#price').text(price+"﷼");

      
    });
</script>
  
<?php include("footer.php")?>
