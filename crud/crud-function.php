<?php
  session_start();
    require_once "conn.php";
    if(isset($_POST['insert']))
    {
        $crud=new Crud;
        $data=$_POST;
        $crud->insert($data);
    }
    if(isset($_POST['update'],$_POST['updateId']))
    {
        $id=$_POST['updateId'];
        $data=$_POST;
        $crud=new Crud;
        $crud->update($data,$id);
    }
    if(isset($_GET['deleteId']))
    {
        $id=$_GET['deleteId'];
        $crud=new Crud;
        $crud->delete($id);
    }
    if(isset($_GET['managerId']))
    {
        $crud=new Crud;
        $id=$_GET['managerId'];
        $crud->employeeList($id);
    }
  
    class Crud
    {
        public $Dbobj;
        function __construct()
        {
            $Dbobj = new DbConnection(); 
            $this->Dbobj=$Dbobj;
        }
        //Function for insert Data
        function insert($data)
        {
            require_once "form-validation.php";
            if(!empty($data["pwd"]))
            {
                $password=md5($data["pwd"]);
            }
            $sql="INSERT INTO users(name,role,gender,contact,email,password) VALUE('$name','$role','$gender','$contact','$email','$password')";
            if($query=mysqli_query($this->Dbobj->getconnection(),$sql))
            {
                $last_id = mysqli_insert_id($this->Dbobj->getconnection());
                $sql2="INSERT INTO roles(manager_id,employee_id)VALUES('$seniorId','$last_id')";
                if($query=mysqli_query($this->Dbobj->getconnection(),$sql2))
                {
                    echo "<h4 class='text-success'>Data is inserted Successfully!</h4>";
                }
                else
                {
                    die(mysqli_error($this->Dbobj->getconnection()));
                }
            }
            else
            {
                die(mysqli_error($this->Dbobj->getconnection()));
            }   
        }
        //function for Update Data
        function update($data,$id)
        {
            require_once "form-validation.php";

            if(!empty($data["validpwd"]))
            {
                $validpwd=md5($data["validpwd"]); 
            }
            if(!empty($data["pwd"]))
            {
                $newpwd=md5($data["pwd"]);
            }
            $pwdsql="SELECT password FROM users WHERE password='$validpwd'";
            $pwdquery=mysqli_query($this->Dbobj->getconnection(),$pwdsql);
            $count=mysqli_num_rows($pwdquery);
            if($count>=1)
            {
                if(!empty($newpwd))
                {
                    $password=$newpwd;
                }
                else
                {
                    $password=$validpwd;
                }
                $sql="UPDATE users SET name='$name',gender='$gender',contact='$contact',email='$email',password='$password'
                 WHERE id='$id'";
                if($query=mysqli_query($this->Dbobj->getconnection(),$sql))
                {
                        echo "<h4 class='text-success'>Data is Updated Successfully!</h4>";
                }
                else
                {
                    die(mysqli_error($this->Dbobj->getconnection()));
                } 
            }
            else
            {
                $_SESSION['errors']=array("pwd_error"=>"Old Password Is Not Matched");   
            }
        }
        //function for employee list under manger
        function employeeList($id)
        {
            $sql="SELECT users.name FROM users LEFT JOIN roles ON roles.employee_id=users.id WHERE manager_id='$id'";
            $query=mysqli_query($this->Dbobj->getconnection(),$sql) or die(mysqli_error($this->Dbobj->getconnection()));
            $output=mysqli_fetch_all($query);
            echo json_encode($output);
        }
         //function for Delete Data
        function delete($id)
        {
            $sql="DELETE FROM users WHERE id='$id'";
            if($query=mysqli_query($this->Dbobj->getconnection(),$sql))
            {
                $sql3="DELETE FROM roles WHERE employee_id='$id'";
                if($query=mysqli_query($this->Dbobj->getconnection(),$sql3))
                {
                    echo "<h4 class='text-danger'>Data is Deleted Successfully!</h4>";
                    header( "refresh:2;url=view.php" );
                }
            }    
        }
        
    }
?>