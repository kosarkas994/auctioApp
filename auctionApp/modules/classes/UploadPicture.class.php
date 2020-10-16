<?php
class UploadPicture
{
    private static $upload = false;
  public function PictureUpload()
  {
        $formats=array ("PNG","JPG","GIF");
    
        $name=strtoupper($_FILES["uploadPicture"]["name"]);
        $type=$_FILES["uploadPicture"]["type"];
        $size=$_FILES["uploadPicture"]["size"];
        $nizformats=explode(".",$name);
        $format=end($nizformats);
        
    if (in_array($format,$formats) && $size/1024/1024 <=15) 
    {
        
        $filepath=sprintf("images/%s",$name);
        if (!file_exists($filepath)) 
        {
            move_uploaded_file($_FILES["uploadPicture"]["tmp_name"],$filepath);
            self::$upload = true;
            
            return $filepath;
        }
        else
        {
            echo "Slika postoji pod navedenim nazivom!";
        }
    }
    else 
    {
        echo "  <div class='alert alert-danger'>
               <ul > 
               <li>Dozvoljeni formati za upload slike su:
               <ul>
                   
               <li>PNG</li>
               <li>JPG</li>
               <li>GIF</li>
              </ul>
            </li>
               <li>Slika ne sme biti veca od 15mb!</li>
               <li>Slika je obavezni parametar</li>
        </ul>
        </div>";
        
            
    }
    
    
    }
    
    
    
 public function isPictureUpload()
 {
     
     
     return self::$upload;
     
 }
}




?>