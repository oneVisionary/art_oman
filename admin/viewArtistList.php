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
     let editExpert= (id)=>{
            console.log("line 59:"+id)
            $.ajax({
                type:"GET",
                url:"../server/expertInfo.php",
                data: { userid: id ,cmd:"edit"}, 
                dataType: "json", 
                success:function(response){
                    window.location.href ='editArtist.php'
                    localStorage.setItem("expertData",JSON.stringify(response))
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
        let deleteExpert= (id)=>{
            console.log("line 31:"+id)
            $.ajax({
                type:"GET",
                url:"../server/expertInfo.php",
                data: { userid: id,cmd:"delete" },
                dataType: "json", 
                success:function(response){
                    console.log(response)
                    alert(response.message)
                    window.location.href ='viewExpert.php'
                },
            error:function(xhr,status,error){
                alert("Error"+error)
             }
            })  
        }
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
                table +="<td class='editbtn'><a onclick='editExpert("+expert.id+")'>Edit</a></td>"
                table +="<td class='deletebtn'><a onclick='deleteExpert("+expert.id+")'>Delete</a></td>"
                table +="</tr>"
            });
            table += "</tbody>"
            $("#artwork_table").html(table)
        }
      

    })
</script>
<?php include("footer.php")?>