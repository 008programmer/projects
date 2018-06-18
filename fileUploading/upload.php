<?php


if (isset($_POST['submit']))
{
    
   $allowedExt = ["jpg","png","pdf","gif"];
   $temp = explode(".", $_FILES['file']['name']);
   $fileExt = strtolower(end($temp));
        
    
   if($_FILES['file']['error'] === 0)
   {
       echo $_FILES['file']['size'];
        if($_FILES['file']['size'] <= 1000000)
        {
            if(in_array($fileExt, $allowedExt))
            {
                $destination = "uploads/".".".uniqid('', TRUE).".".$fileExt;
                move_uploaded_file($_FILES['file']['tmp_name'], $destination);
                header('Location:/?uploadsuccess');
            }
            else 
            {
                echo "You cannot uploaod this type of file";    
            }
        }
        else 
        {
            echo "You cannot uplaod large file like this";    
        }
   }
   else 
   {
     echo "Error while uplaoding";    
   }   
}
else
    echo "You have not clicked the button";
