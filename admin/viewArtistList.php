<?php include("header.php")?>
<div class="admin_crud">
    <div class="admin_expertadd">
        <h2>View Client</h2>
       
    </div>
    <div class="admin_expertView">
        <table id="artwork_table" class="table">
            
        </table>
    </div>
</div>
<script>
 
    $(document).ready(()=>{
        
        $.ajax({
            type:"GET",
            url:"../server/newartistListdisplay.php",
            dataType:"json",
            success:function(response){
                displayExpertList(response)
            },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            
        })
      
        let displayExpertList = (expertlist)=>{
            let table = `
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Username</th>
                    <th>Email Address</th>
                   
                    <th>created At</th>
<<<<<<< HEAD
                 
=======
                  
>>>>>>> 72abca46799a37bf3d7e86ca1259e22a8e963a7c

                </tr>
            </thead>
            <tbody>
            `
            expertlist.forEach((expert,index)=>{
                table +="<tr class='tblrow'>"
                table +="<td>"+(index+1)+"</td>"
                table +="<td>"+expert.username+"</td>"
                table +="<td>"+expert.email+"</td>"
              
                table +="<td>"+expert.created_at+"</td>"
              
                table +="</tr>"
            });
            table += "</tbody>"
            $("#artwork_table").html(table)
        }
      

    })
</script>
<?php include("footer.php")?>