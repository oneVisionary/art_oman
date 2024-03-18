<?php 
include("common/header.php");
$id= $_GET['id'];

?>
<main>
<div class="profile_container">
    <div class="product_info">

        <div class="product_row">
            <div class="product_details" id="product_details"></div>
            <div class="product_feedback">
                <div class="addNewFeedback">
                <button id="popup">Add Feedback</button>

                </div>
                <div class="feedbacks">

                </div>
            </div>
        </div>
        <div class="popup_model" id="popup_model">
            <h2>Leave Your feedback here</h2>
            <form action="#" class="feedback_form">
                
            
            <input type="text" placeholder="username">
            <textarea name="feedback here" id="" cols="30" rows="10"></textarea>
                <div class="star_icon" id="star_icon">
            
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<script>
let starIconContainer = document.querySelector("#star_icon")
for(let i=0;i<5;i++){
    console.log(i)
    let starCount =i+1;
    let starContent = "<i class='ri-star-line $i' onclick='starClick(${i})'></i>"
    starIconContainer.innerHTML(starContent)
}

$(document).ready(() => {

var id ="<?php  echo $id; ?>";
let pro_detailId = document.querySelector("#product_details");
let popupbtn = document.querySelector("#popup");
let popup_model = document.querySelector("#popup_model");
popupbtn.addEventListener('click',()=>{
    popup_model.style.display ="block"
})

$.ajax({
            type:"GET",
            url:"server/feedback.php",
            data: { artid: id}, 
            dataType: "json", 
            success:function(response){
                console.log(response)
                
                pro_detailId.innerHTML =`
                <img src="asset/images/expertArtwork/${response[0].img}"/>
                <h2>${response[0].title}</h2>
                <h2>${response[0].price}</h2>
                <h2>${response[0].description}</h2>
                <h2>${response[0].created_at}</h2>
                `
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
        
       
});

</script>
<?php include("common/footer.php")?>