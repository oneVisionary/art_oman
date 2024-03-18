<?php include("header.php")?>
<div class="view_orders">
<input type="hidden" id="new_artist_userid" value="<?php echo $userid;?>"/>
    <div class="admin_expertadd">
        <h2>View Orders</h2>
       
    </div>
    <div class="admin_expertView vieworders">
        <table id="artwork_table" class="table">
            
        </table>
    </div>
</div>
<script>
  var userid = document.getElementById("new_artist_userid").value;
  console.log(userid)
    $(document).ready(()=>{
        
        $.ajax({
            type:"GET",
            url:"../server/expertInfo.php",
            data: { userid: userid,cmd:"vieworders" },
          dataType:'json',
            success:function(response){
                console.log(response)
               displayOrderList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
      
        let displayOrderList = (expertlist)=>{
            let table = `
            <thead>
                <tr>
                    <th>S.No</th>
                    <th></th>
                    <th>Title</th>
                    <th>Amount</th>
                   
                    <th>Orderd At</th>
                    

                </tr>
            </thead>
            <tbody>
            `
            expertlist.forEach((expert,index)=>{
                table +="<tr class='tblrow'>"
                table +="<td>"+(index+1)+"</td>"
                table += "<td><img src=../asset/images/expertArtwork/" + expert.img + " height='50px' width='50px'></td>";
                table +="<td>"+expert.title+"</td>"
                table +="<td>"+expert.price+"﷼  </td>"
              
                table +="<td>"+expert.created_at+"</td>"

                table +="</tr>"
            });
            table += "</tbody>"
            $("#artwork_table").html(table)
        }
      

    })
</script>
<?php include("footer.php")?>