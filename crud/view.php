<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <?php
   include "crud-function.php"; 
   $con=new Dbconnection();

    $sql="SELECT *FROM users";
    $query=mysqli_query($con->getconnection(),$sql) or die(mysqli_error($con));
  ?>
</head>
<body>
<div class="container mt-3">
  <h2>User Information</h2> 
  <div id="message"></div>
   
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Serial No</th>
        <th>Name</th>
        <th>Role</th>
        <th>Gender</th>
        <th>Contact</th>
        <th>Email</th>
        <th><a href="userform.php" ><button class="btn btn-info">Insert</button></a></th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i=1;
        while($output=mysqli_fetch_array($query))
        {
        ?>
        <tr id="userId_<?php echo $output["id"]?>">
            <td><?php echo $i++;?></td>
            <td><?php echo $output["name"];?></td>
            <td><?php echo $output["role"];?></td>
            <td><?php echo $output["gender"];?></td>
            <td><?php echo $output["contact"];?></td>
            <td><?php echo $output["email"];?></td>
            <td>   <a href="userform.php?id=<?php echo $output["id"]?>"><button class="btn btn-light">Update</button></a>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" data-whatever="<?php echo $output["id"]?>"  class="btn btn-danger">Delete</button>
               <?php
                if($output["role"]=='Manager')
                {?>
                   <button data-bs-toggle="modal" onclick='getId("<?php echo $output["id"]?>")' data-bs-target="#exampleModal2" data-manager="<?php echo $output["name"]?>" class="btn  btn-secondary">Employee List</button>
                 <?php
                }
                 ?>
          </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
  </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do you want dalete data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="getId" name="getId">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" onclick="deleterow()" >Delete</button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-muted" id="exampleModalLabel1"></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
          <h5>Employee List</h5>
          <ol id="employeeList">
            
          </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
      </div>
    </div>
  </div>
</div>


</div>
<script>
  function getId(id)
  {
    $.ajax({
      type:'get',
      url:'crud-function.php',
      data:{managerId:id},
      success: function(output)
      {
        const myArray = JSON.parse(output);
        let text = "";
            for (const x in myArray) {
              text += "<li>"+myArray[x]+"</li>";
            }
          $("#employeeList").html(text);
      }
    });
  }

  $(function () {
  $('#exampleModal2').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var code = button.data('manager'); 
    $("#exampleModalLabel1").html("Employee List Under "+code);
  });
});

  $(function () {
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var code = button.data('whatever'); 
    var modal = $(this);
    modal.find('#getId').val(code);
  });
});

  function deleterow()
  {
    var id=$('#getId').val();
    var rowId="#userId_"+id;
    $.ajax({
      type:'get',
      url:'crud-function.php',
      data:{deleteId:id},
      success: function(output)
      {
        $("#message").html(`
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>`+output+`</strong>
        </div>
         `);
        $(rowId).remove();
      }
    });
  }
</script>
</body>
</html>
