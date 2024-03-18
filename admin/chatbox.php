<?php include("header.php") ?>
<input type="hidden" id="new_artist_userid" value="12"/>
<h4>Chatbox</h4>
<div class="adminchat_container">

   
    <div class="artistList" id="artistList">
     <p>Experts</p>
    </div>
    <div class="chatbox">
        <p>You are chating with <span id="eid"></span></p>
        <div class="message-content">
            <div class="message">
           
            </div>
        
        </div>
        <div class="text_send">
            <input type="text" class="chattext" placeholder="Type Here" id="message">
            <button class="chatsend" onclick=sendbtn()>Send</button>
<<<<<<< HEAD
            <img class="uploadbtn" onclick="document.getElementById('fileupload').click()" src="../asset/images/upload1.png" height="60px" width="60px">
          <input type="file" id="fileupload" name="fileupload" style="display:none;" onchange="uploadbtn(event)">

=======
            <button class="uploadImg" onclick = uploadBtn()><img src="../asset/images/upload.png" alt="" height="40px" width="40px"></button>
>>>>>>> 72abca46799a37bf3d7e86ca1259e22a8e963a7c
        </div>
    </div>
   
</div>
<script>
     var userid = document.getElementById("new_artist_userid").value;
    var eid= 0
    let uploadbtn=(event)=>{
        const selectedFile = event.target.files[0];
        document.getElementById("message").value = selectedFile.name
    console.log("Selected file:", selectedFile.name);
    }
    let viewDetails = (id,username)=>{
        eid =id
       document.getElementById("eid").textContent = username;
       let uploadBtn = ()=>{
            console.log("hi")
       }
       $.ajax({
                type:"GET",
                url:"../server/chatlistServices.php",
                data: { userid: userid ,expertid:eid}, 
                dataType: "json", 
                success:function(response){
                    console.log("35:"+response)
                    $(".message").html('');
                   response.forEach((expert,index)=>{
                    messageContent = expert.message
                    let messageClass = expert.sendby == userid ? 'to' : 'send';
                      
                        let allowedExtensions = ['.jpg', '.docx', '.pdf', '.png', '.gif'];
                        let hasAllowedExtension = allowedExtensions.some(extension => messageContent.toLowerCase().includes(extension));
                        if (hasAllowedExtension) {
               
                content = `<div class='${messageClass}'><a href="../server/download.php?file=${encodeURIComponent(messageContent)}" target="_blank">${messageContent}</a></div>`;
            } else {
              
                content = `<div class='${messageClass}'>${messageContent}</div>`;
            }
          $(".message").append(content);

                   })
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  



    }
    let sendbtn =  async ()=>{
       var message = document.getElementById("message").value
       var file = document.getElementById("fileupload").files[0];
     
       var formData = new FormData();
    formData.append('sendby', userid);
    formData.append('sendto', eid);
    formData.append('message', message);
    if (file) {
        formData.append('file', file);
    }
       $.ajax({
                type:"POST",
                url:"../server/chat_services.php",
                data: formData, 
                processData: false, 
                contentType: false,
                success:function(response){
                    console.log(response)
                    alert("message send successfully")
                    document.getElementById("message").value=""
                   // window.location.href ='chatbox.php'
                    //localStorage.setItem("artData",JSON.stringify(response))
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
    }
       $(document).ready(()=>{
        
        $.ajax({
            type:"GET",
            url:"../server/expertlist_services.php",
            dataType:"json",
            success:function(response){
                displayExpertList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
      
        let displayExpertList = (expertlist)=>{
           
            expertlist.forEach((expert,index)=>{
                var chatCard = `
                <div class="chatbox_expertid" id="Name" onclick='viewDetails(${expert.id},"${expert.username}")' >${expert.username}</div>
                
                      `;
                $(".artistList").append(chatCard);
            });
          
        }


      
      

    })
</script>
<?php include("footer.php") ?>
