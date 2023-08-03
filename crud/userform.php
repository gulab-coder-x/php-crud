<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
 
  <style>
    .seniorId{
      display:none;
    }
    .error {  
      color: red;  
      margin-left: 5px;  
    }  
  </style>
</head>
<body>

<div class="container mt-3">
  <h2>User form</h2>
  <?php
    include "crud-function.php";
    $con=new Dbconnection();
    
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $sql="SELECT *FROM users where id=$id";
    $query=mysqli_query($con->getconnection(),$sql) or die(mysqli_error($con));
    $output=mysqli_fetch_array($query);
    $id=$output['id'];
    $name=$output['name'];
    $role=$output['role'];
    $gender=$output['gender'];
    $contact=$output['contact'];
    $email=$output['email'];
    $password=$output['password'];
  }
  else
  {
    $name="";
    $gender="";
    $role="";
    $contact="";
    $email="";
    $password="";
  }
  ?>
  <form action="" method="post" enctype="multipart\form" id="<?php if(isset($_GET['id'])) { echo "update-form"; }else{ echo "user-form";}?>">
    <div class="mb-3 mt-3">
      <?php
        if(isset($_GET['id']))
        {?>
          <input type="hidden" class="form-control" value="<?php echo $id;?>" name="updateId">
        <?php 
        }
      ?>
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?php echo $name;?>" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="role">Role:</label>
      <select name="role"     <?php if(isset($_GET['id'])){ echo "disabled";}?>>
        <option value="manager" id="manager" <?php if($role=='Manager'){ echo "Selected";}?>>Manager</option>
        <option value="employee" id="employee" <?php if($role=='Employee'){ echo "Selected";}?>>Employee</option>
      </select>
        <div class="seniorId">
          <label for="seniorId">Senior:</label>
          <select name="seniorId" >
          <option value="0" >Select</option>
            <?php
              $sql2="SELECT *FROM users where role='Manager'";
              $query2=mysqli_query($con->getconnection(),$sql2) or die(mysqli_error($con));
              while( $output=mysqli_fetch_array($query2))
              {
                echo '<option value='.$output['id'].'>'.$output['name'].'</option>';
              }
            ?>
          </select>
        </div>
    </div>
    <div class="mb-3 mt-3">
      <label for="gender">Gender:</label>
      <input type="radio" value="male" id="male" name="gender"  <?php if($gender=="male"){echo "checked";}?>> Male
      <input type="radio" value="female" id="female" name="gender" <?php if($gender=="female"){echo "checked";}?>> Female
      <input type="radio" value="other" id="other" name="gender" <?php if($gender=="other"){echo "checked";}?>> Other
      <label id="gender-error" class="error" for="gender"></label>
    </div>
    <div class="mb-3 mt-3">
      <label for="contact">Contact:</label>
      <input type="number" class="form-control" id="contact" value="<?php echo $contact;?>" placeholder="Enter Contact" name="contact">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <?php
        if(isset($_GET['id']))
        {
          ?>
              <label for="pwd">Enter Old Password:</label>
              <input type="password" class="form-control" id="oldpwd"  placeholder="Enter Old password" name="validpwd">
                <?php
                  if(isset($_SESSION['errors']['pwd_error']))
                  {
                   echo "<h6 class='text-danger'>". $_SESSION['errors']['pwd_error']."</h6>";
                   unset($_SESSION['errors']['pwd_error']);
                  }
                ?>
              <br>
              <label for="pwd">Enter New Password:</label>
              <input type="password" class="form-control" id="newpwd"  placeholder="New password" name="newpwd">
              <br>
              <label for="pwd">Confirm Password:</label>
              <input type="password" class="form-control" id="pwd"   placeholder="Confirm password" name="pwd">
              <br>
          <?php
        }
        else
        {
      ?>
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd"  placeholder="Enter password" name="pwd">
      <?php        
        }
      ?>
    </div>
    <button  class="btn btn-primary" name=" <?php  if(isset($_GET['id'])){echo "update";}else{echo "insert";}?>"><?php  if(isset($_GET['id'])){echo "Update";}else{echo "Insert";}?></button>
    <a href="view.php">View</a> 
  </form>
    <script>
    //Function for insert form data 
    jQuery.validator.addMethod("lettersonly", function(value, element) 
    {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
    }, "Letters and spaces only please");

    $('#user-form').submit (function (e) 
    {  
      e.preventDefault(); 
      $("#user-form").validate
      ({
            rules: 
            {
              name:{
                required: true,
                lettersonly:true
              },
              role:{
                required: true
              },
              gender:{
                required: true
              },
              email:{
                required: true
              },
              contact:{
                required: true,
                maxlength:10,
                minlength:10
              },
              pwd:{
                required: true
              }
            },
            messages: 
            {
              name:{
                required: "Please Enter Name!"
              },
              role:{
                required: "Please Choose Your Role!"
              },
              gender:{
                required: "Please Choose Your Gender!"
              },
              email:{
                required: "Please Enter Your Email!"
              },
              contact:{
                required: "Please Enter Your Contact Number!",
                maxlength:"This is not Correct contact",
                minlength:"This is not Correct contact"
              },
              pwd:{
                required:"Please Enter Password!"
              }
            },
            submitHandler: function(form) {  
              form.submit();  
            }   
        });
    });
      // Function for update form Data
    $('#update-form').submit (function (e) 
        {  
          e.preventDefault(); 
          $("#update-form").validate
          ({
                rules: 
                {
                  name:{
                    required: true,
                    lettersonly:true
                  },
                  role:{
                    required: true
                  },
                  gender:{
                    required: true
                  },
                  email:{
                    required: true
                  },
                  contact:{
                    required: true,
                    maxlength:10,
                    minlength:10
                  },
                  validpwd:{
                    required: true
                  },
                  pwd:{
                    equalTo:"#newpwd"
                  }
                },
                messages: 
                {
                  name:{
                    required: "Please Enter Name!"
                  },
                  role:{
                    required: "Please Choose Your Role!"
                  },
                  gender:{
                    required: "Please Choose Your Gender!"
                  },
                  email:{
                    required: "Please Enter Your Email!"
                  },
                  contact:{
                    required: "Please Enter Your Contact Number!",
                    maxlength:"This is not Correct contact",
                    minlength:"This is not Correct contact"
                  },
                  validpwd:{
                    required:"Please Enter Old Password for update user Data!"
                  },
                  pwd:{
                    equalTo:"Password is not Matched!"
                  }
                },
                submitHandler: function(form) {  
                  form.submit();  
                }   
            });
        });

      $("#employee").click(function(){
          $(".seniorId").css("display", "block");
      });
      $("#manager").click(function(){
          $(".seniorId").css("display", "none");
      });
    </script>
</div>
</body>
</html>
