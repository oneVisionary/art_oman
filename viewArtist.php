<?php include("common/header.php")?>
    <main>
        <div class="profile_container">
        
       </div>
    </main>
    <script>
          let viewArt= (id)=>{
            console.log("line 31:"+id)
            $.ajax({
                type:"GET",
                url:"server/expertInfo.php",
                data: { userid: id,cmd:"viewart" },
                dataType: "json", 
                success:function(response){
                    //console.log(response)
                    localStorage.setItem("artInfo",JSON.stringify(response))
                    window.location.href ='viewArtwork.php'
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
        $(document).ready(()=>{
           
            $.ajax({
            type:"GET",
            url:"server/expertlist_services.php",
            dataType:"json",
            success:function(response){
                response.forEach((expert,index)=>{
                    var profileCard = `
                        <div class="profile_Card">
                            <img src="asset/images/profile.png" alt="" height="100px" width="100px">
                            <div class="userinfo" id="Name">${expert.username}</div>
                            <div class="userinfo" id="mode">Expert Artist</div>
                            <div class="userinfo">
                            <a onclick='viewArt(${expert.id})' class="viewart">View Art</a>
                            </div>
                        </div>`;
                    $(".profile_container").append(profileCard);
                })
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
           
        })
    </script>
    <?php include("common/footer.php")?>