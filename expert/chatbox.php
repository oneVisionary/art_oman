<?php include("header.php") ?>
<input type="hidden" id="new_artist_userid" value="<?php echo $userid;?>"/>
<div class="chatbot-container">
    <h2>Chats</h2>
    <div class="chats">
    <div class="artistList" id="artistList">
     <p>Message From</p>
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
            <img class="uploadbtn" onclick="document.getElementById('fileupload').click()" src="../asset/images/upload1.png" height="60px" width="60px">
          <input type="file" id="fileupload" name="fileupload" style="display:none;" onchange="uploadbtn(event)">
        </div>
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
       
       $.ajax({
                type:"GET",
                url:"../server/chatlistServices.php",
                data: { userid: userid ,expertid:eid}, 
                dataType: "json", 
                success:function(response){
                   // console.log("35:"+response)
                    $(".message").html('');
                   response.forEach((expert,index)=>{
                    let messageClass = expert.sendby == userid ? 'to' : 'send';
                    console.log(expert.message)
                    let myMessage = expert.message
                    let allowedExtensions = ['.jpg', '.docx', '.pdf', '.png', '.gif'];
                    let hasAllowedExtension = allowedExtensions.some(extension => myMessage.toLowerCase().includes(extension));
                    console.log(hasAllowedExtension)
                    if(hasAllowedExtension){
                        content = `<div class='${messageClass}'><a href="../server/download.php?file=${encodeURIComponent(myMessage)}" target="_blank">${myMessage}</a></div>`;
                    }
                    else{

                        content = `<div class='${messageClass}'>${myMessage}</div>`;
                    }

          $(".message").append(content);

                   })
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  



    }
    let sendbtn = ()=>{
       var message = document.getElementById("message").value
       console.log("expert info:"+userid+",ep:"+eid)
       $.ajax({
                type:"POST",
                url:"../server/chat_services.php",
                data: { sendby: userid ,sendto: eid ,message:message}, 
                
                success:function(response){
                    alert("message send successfully")
                    document.getElementById("message").value =""
                   // window.location.href ='chatbox.php'
                    //localStorage.setItem("artData",JSON.stringify(response))
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
    }
       $(document).ready(()=>{
        console.log(userid)
        $.ajax({
            type:"GET",
            url:"../server/artistlist_services.php",
            data: { userid: userid }, 
            dataType:"json",
            success:function(response){
                console.log(response)
                displayExpertList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
      
        let displayedUsernames = []; // Initialize an empty array to keep track of displayed usernames

let displayExpertList = (expertlist) => {
    console.log(expertlist)
    console.log(displayedUsernames);

    expertlist.forEach((expert, index) => {
        // Check if the username has already been displayed
        if (!displayedUsernames.includes(expert.username)) {
            var chatCard = `
                <div class="chatbox_expertid" id="Name" onclick='viewDetails(${expert.id},"${expert.username}")' >${expert.username}</div>
            `;
            $(".artistList").append(chatCard);
            displayedUsernames.push(expert.username); // Add the username to the list of displayed usernames
        }
    });
}



      
      

    })
</script>
<?php include("footer.php") ?>
