<?php include("header.php")?>
<div class="admin_crud">
    <div class="admin_expertadd">
        <h2>View Experts</h2>
        <a class="addExpert" href="addExpert.php">Add</a>
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
                    window.location.href ='editExpert.php'
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
        let viewArt= (id)=>{
            console.log("line 31:"+id)
            $.ajax({
                type:"GET",
                url:"../server/expertInfo.php",
                data: { userid: id,cmd:"viewart" },
                dataType: "json", 
                success:function(response){
                    //console.log(response)
                    localStorage.setItem("artInfo",JSON.stringify(response))
                    window.location.href ='viewArt.php'
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
            let table = `
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>password</th>
                    <th>created At</th>
                    <th colspan="3" >Action</th>

                </tr>
            </thead>
            <tbody>
            `
            expertlist.forEach((expert,index)=>{
                table +="<tr class='tblrow'>"
                table +="<td>"+(index+1)+"</td>"
                table +="<td>"+expert.username+"</td>"
                table +="<td>"+expert.email+"</td>"
                table +="<td>"+expert.password+"</td>"
                table +="<td>"+expert.created_at+"</td>"
                table +="<td class='editbtn'><a onclick='editExpert("+expert.id+")'>Edit</a></td>"
                table +="<td class='deletebtn'><a onclick='deleteExpert("+expert.id+")'>Delete</a></td>"
                table +="<td class='viewbtn'><a onclick='viewArt("+expert.id+")'>View Art</a></td>"
                table +="</tr>"
            });
            table += "</tbody>"
            $("#artwork_table").html(table)
        }
      

    })
</script>
<?php include("footer.php")?>