<?php include("header.php")?>
<main>
    <input type="hidden" id="new_artist_userid" value="<?php echo $userid;?>"/>
<div class="profile_container">
        
        </div>
</main>

<script>
    let viewDetails= (id)=>{
            console.log("line 59:"+id)
            $.ajax({
                type:"GET",
                url:"../server/artInfo.php",
                data: { userid: id ,cmd:"edit"}, 
                dataType: "json", 
                success:function(response){
                    console.log(response)
                    window.location.href ='viewDetails.php'
                    localStorage.setItem("artData",JSON.stringify(response))
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
$(document).ready(() => {
   

    
        var userid = document.getElementById("new_artist_userid").value
            console.log(userid)
        $.ajax({
            type:"GET",
            url:"../server/expertInfo.php",
            data: { userid: userid,cmd:"viewart" }, 
            dataType: "json", 
            success:function(response){
                console.log(response)
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
                            <img src="../asset/images/expertArtwork/${expert.img}" alt="" height="150px" width="180px">
                            <div class="userinfo" id="Name">${expert.title}</div>
                            <div class="userinfo" id="Name">${expert.description}</div>
                            <div class="userinfo" id="Name">${expert.price}﷼</div>
                           
                        </div>`;
                        $(".profile_container").append(profileCard);
            });
         
        }
       console.log(userid)
    
    
});

</script>
  
    <?php include("footer.php")?>