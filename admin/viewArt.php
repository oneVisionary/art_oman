<?php include("header.php")?>
<div class="admin_crud">
    <div class="admin_expertadd">
        <h2>View Art</h2>
        <a class="addExpert" href="addArt.php">Add</a>
    </div>
    <div class="admin_expertView">
        <table id="artwork_table" class="table">
            
        </table>
    </div>
</div>
<script>
        let editArt= (id)=>{
            console.log("line 59:"+id)
            $.ajax({
                type:"GET",
                url:"../server/artInfo.php",
                data: { userid: id ,cmd:"edit"}, 
                dataType: "json", 
                success:function(response){
                    console.log(response)
                    window.location.href ='editArt.php'
                    localStorage.setItem("artData",JSON.stringify(response))
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
        let deleteArt= (id)=>{
            console.log("line 31:"+id)
            $.ajax({
                type:"GET",
                url:"../server/artInfo.php",
                data: { userid: id,cmd:"delete" },
                dataType: "json", 
                success:function(response){
                   
                    window.location.href ='viewArt.php'
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
$(document).ready(() => {
    var artData = JSON.parse(localStorage.getItem('artInfo'));

    if (artData.length >0) {
        var userid = artData[0].artist_id
            
        $.ajax({
            type:"GET",
            url:"../server/expertInfo.php",
            data: { userid: userid,cmd:"viewart" }, 
            dataType: "json", 
            success:function(response){
                displayArtList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
        let displayArtList = (expertlist)=>{
            let table = `
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Img</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price (Rial)</th>
                    <th>created At</th>
                    <th colspan="3" >Action</th>

                </tr>
            </thead>
            <tbody>
            `
            expertlist.forEach((expert,index)=>{
                table +="<tr class='tblrow'>"
                table +="<td>"+(index+1)+"</td>"
                table +="<td>"+expert.title+"</td>"
                table += "<td><img src=../asset/images/expertArtwork/" + expert.img + " height='50px' width='50px'></td>";

                table +="<td>"+expert.description+"</td>"
                table +="<td>"+expert.price+"</td>"
                table +="<td>"+expert.created_at+"</td>"
                table +="<td class='editbtn'><a onclick='editArt("+expert.art_id +")'>Edit</a></td>"
                table +="<td class='deletebtn'><a onclick='deleteArt("+expert.art_id +")'>Delete</a></td>"
              
                table +="</tr>"
            });
            table += "</tbody>"
            $("#artwork_table").html(table)
        }
       console.log(userid)
    
    } else {
       
        console.log("No Art");
    }
});

</script>
<?php include("footer.php")?>