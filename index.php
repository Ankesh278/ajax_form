<?php

include("db.php");



?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
        <title>index</title>
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="alert alert-info mb-5 text-center"> Crud Operation</h1>
        </div>
        <div class="row ms-3">


<!-- first row -->
<form id="myform" method="post" class="col-sm-5 ms-2 ">
    <h3 class="alert alert-success text-center "> Add/Update  Here</h1>
    <div>
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" placeholder="Enter Name Here"  name="name" required id="name">
    </div>
    <div>
        <label class="form-label">Email:</label>
        <input type="email"  placeholder="Enter Email Here" class="form-control" name="email" required id="email">
    </div>
    <div>
        <label class="form-label">Phone:</label>
        <input type="number"  placeholder="Enter Phone Number Here"class="form-control" oninput = "javascript:  
    if (this.value.length > this.maxLength)
        this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="phone"required id="phone">
    </div>
    <div>
        <label class="form-label">Password:</label>
        <input type="password" class="form-control" placeholder="Enter Password Here" name="password" required id="password">
    </div>
    <div>
       
        <input type="hidden" class="form-control" name="hidden" required id="hidden">
    </div>
    <div class="d-grid">
       <button type="submit" id="btnadd" class="btn btn-primary mt-3" data-dismiss="modal">Submit</button>
    </div>


</form>

<!-- second cloumn  -->
<div class="col-sm-6">
    <h3 class="alert alert-warning text-center "> Information</h3>

    <table class="table text-center" id="tabledata">
        <thead>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Email</th>
<th scope="col">Phone</th>
<th scope="col">Password</th>
<th scope="col">Action</th>

        </thead>
        <tbody id="tbody">

    

        </tbody>


    </table>


</div>



        </div>

<script>
    $(document).ready(function(){

$('#btnadd').click(function(e){

    var id=$('#id').val();

    var name=$('#name').val();
    var email=$('#email').val();
    var phone=$('#phone').val();
    var password=$('#password').val();
    var id=$('#hidden').val();
    

    var data={id:id,name:name,email:email,phone: phone,password:password,id:id};
    $.ajax({
        url: 'insert.php',
        method:'post',
        data: data,
        success:function(data){
            
            $("myform")[0].reset();
            confirm("Data inserted");
            show_data();
           
        }
        

    });
   
   
    show_data();
   
    
})
function show_data(){
    let output='';

    $.ajax({

        url:'retrieve.php',
        method:'get',
        
                success:function(data){
            $("#tbody").html(data);
                  
        }
    })
}

       
$(document).on('click','#Delete',function(){
    var id=$(this).val();
    
    $.ajax({
        url:'delete.php',
        method:'post',
        data:{id:id},
        success:function(data ,status){
            show_data();
        }

    })
})


$(document).on('click','#Edit',function(){
var id=$(this).val();
$('#hidden').val(id);

$.ajax({

    url:'edit.php',
    method:'post',
    data:{id:id},
    success: function(data,status){
       
        var user=JSON.parse(data);
        $('#name').val(user.name);
        $('#email').val(user.email);
        $('#phone').val(user.phone);
        $('#password').val(user.password);


        show_data();

    }

})



    
})
show_data();
e.preventDefault();


});




    
</script>


    </body>
</html>