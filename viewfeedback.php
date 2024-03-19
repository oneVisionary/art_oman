<?php 
include("common/header.php");

$id= $_GET['id'];

?>
<style>
.comment_Section{
    position: relative;
   
    margin-top:20px;
    
}
  .comment_Section  .ffedback{
        display:none;
    margin: 2% auto ;
    top:0;
    right:25px;
    height: 480px;
    width: 400px;
   z-index: 1000;
    position: absolute;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
}
.feedbackForm{
    display:flex;
    flex-direction:column;
}
.text-input{
    padding:10px;
    margin:15px;
}
h2{
    padding:10px;
}
.feedbtn{
    margin:10px;
    padding:10px;
    border-radius:15px;
    background-color:black;
    color:white;
    font-size:1.5em;
    cursor: pointer;
}
select{
    padding:15px;
    margin:10px;
}
.feedbtn:hover{
    background-color:green;
    border:none;
}
.close{
    position: absolute;
    right: 15px;
    font-size:16px;
    cursor: pointer;
}
.close:hover{
    color:green;
    font-size:20px;
}

.commentList{
    height:500px;
    width:900px;
    overflow:auto;
  
    margin:2% auto;
    
   
}
.feedo{
    position:absolute;
    margin:22px;
    right:350px;
    top:0;
    padding: 10px;
    background-color:green;
    color:white;
    font-size:1.2em;
    cursor: pointer;
}

.feed{
    margin:15px;
    padding:20px;
    position: relative;
    box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
}
.feed .right_view{
    position: absolute;
    right:15;
    bottom:0;
}
</style>
<main>
<div class="comment_Section">
        <button onclick="addFeed()" class="feedo">Add Feedback</button>
    <div class="commentList">
   
    </div>
    <div class="ffedback" id="ffedback">
    <span class="close" id="close">x</span>
    <h2>Feedback Form</h2>
    <div class="feedback_form">
        
       <form method="post" id="feedbackForm" class="feedbackForm">
       <input type="text" name="username"  placeholder="username" class="text-input">
       <input type="hidden" name="artid"  id="artid" placeholder="artid" value=<?php echo $id; ?>>
        <select name="rating" id="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <textarea name="description" id="description"  cols="30" rows="10" class="text-input"></textarea>
        <button class="feedbtn">
            Add
        </button>
       </form>
    </div>
</div>
</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

let addFeed = () =>{
    document.getElementById("ffedback").style.display="block"
}
let closeBtn =  document.getElementById("close")
closeBtn.addEventListener("click",()=>{
    document.getElementById("ffedback").style.display="none"
})
$(document).ready(() => {

var id ="<?php  echo $id; ?>";
console.log(id)

$.ajax({
                type:"GET",
                url:"server/feedbackList.php",
                data: { artid: id},
                dataType: "json", 
                success:function(response){
                    console.log(response)
                    response.forEach((expert,index)=>{
                    var profileCard = `
                        <div class="feed">
                        <div class="userinfo" id="Name">${expert.feedback}</div>
                        <div class="userinfo" id="Name">Rating: ${expert.star}</div>
                         <div class="right_view">
                         <div class="feedname" id="Name">${expert.name}</div>
                            
                            
                            <div class="userinfo" id="Name">${expert.created_at}</div>
                         </div>
                        </div>`;
                    $(".commentList").append(profileCard);
                })
                    
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })















$("#feedbackForm").submit((e)=>{
                e.preventDefault();
                
                var username = $("input[name='username']").val();
        var rating = $("#rating").val();
        var description = $("#description").val();
        var artid = $("#artid").val();
        console.log("Username: " + username);
        console.log("Rating: " + rating);
        console.log("Description: " + description);
        $.ajax({
                    type:"POST",
                    url:"server/feedback_services.php",
                    data:{name:username, star:rating, feedback:description, artid:artid},
                    success:function(response){
                        console.log(response)
                        document.getElementById("ffedback").style.display="none"
                        window.location.href= "viewArtworkIndetail.php"
                    },
                    error:function(xhr,status,error){
                        alert("Error"+error)
                    }

                }) 
            })
});

</script>
<?php include("common/footer.php")?>