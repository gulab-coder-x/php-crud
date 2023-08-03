<?php
    if(!empty($data["name"]))
    {
        $name=ucwords($data["name"]);
    }
    if(preg_match('/^[0-9]*$/',$data["seniorId"]))
    {
        $seniorId=$data["seniorId"];
    }
    if(!empty($data["role"]))
    {
        $role=ucwords($data["role"]);
    }

    if(!empty($data["gender"]))
    {
        $gender=$data["gender"];
    }
    if(!empty($data["contact"]))
    {
        $contact=$data["contact"];
    }

    if(!empty($data["email"]))
    {
        $email=$data["email"];
    }

?>  