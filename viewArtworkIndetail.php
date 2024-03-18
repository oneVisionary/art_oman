<?php include("common/header.php")?>
<main>
<div class="profile_container">
        
        </div>
</main>

<script>

$(document).ready(() => {
    var artData = JSON.parse(localStorage.getItem('artInfo'));

    if (artData.length >0) {
        var userid = artData[0].artist_id
            
        $.ajax({
            type:"GET",
            url:"server/expertInfo.php",
            data: { userid: userid,cmd:"viewarts" }, 
            dataType: "json", 
            success:function(response){
                displayArtList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
        let displayArtList = (expertlist)=>{
         

        
            expertlist.forEach((expert,index)=>{
                var profileCard = `
                        <div class="artist_Card">
                            <img src="asset/images/expertArtwork/${expert.img}" alt="" height="150px" width="180px">
                            <div class="userinfo" id="Name">${expert.title}</div>
                            <div class="userinfo" id="Name">${expert.description}</div>
                            <div class="userinfo" id="Name">${expert.price}﷼</div>
                            <div class="userinfo" id="expertid"><a href="viewfeedback.php?id=${expert.art_id}">Feedback</a></div>
                        </div>`;
                        $(".profile_container").append(profileCard);
            });
         
        }
       console.log(userid)
    
    } else {
       
        console.log("No Art");
    }
});

</script>
<?php include("common/footer.php")?>