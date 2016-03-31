<?php
//    echo '<pre>', print_r($_FILES), '</pre>';
    if(!empty($_FILES['files']['name'][0])){
        $files = $_FILES['files'];
        $uploaded = array();
        $failed=array();
        $allowed = array ('png','jpg','jpeg');
        
        foreach($files['name'] as $position =>$file_name){
            $file_tmp = $files['tmp_name'][$position];
            $file_size = $files['size'][$position];
            $file_error = $files['error'][$position];             
            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));
            
            if(in_array($file_ext, $allowed)){
                if($file_error === 0){
                    if($file_size <= 2097152){
                        $file_name_new = uniqid('',true).'.'.$file_ext;
                        $file_destination = 'uploads/'. $file_name_new;
                        
                            if(move_uploaded_file($file_tmp,$file_destination)){
                                $uploaded[$position] = $file_destination;                    
                            }   
                            else{   
                                $failed[$position]="[{$file_name}] failes to upload.";
                            }
                        }
                        else{   
                            $failed[$position]="[{$file_name}] is too large.";
                        }
                }
                else{
                    $failed[$position]="[{$file_name}] extention '{$file_ext}' is not allowed.";
                }
            }
             else{   
                 $failed[$position]="[{$file_name}] extention '{$file_ext}' is not allowed.";
            }
        }
        if(!empty($uploaded)){
            print_r($uploaded);
        }
        if(!empty($failed)){
            print_r($failed);
        }
        
    }
?>
<!-- Upload Images For gallery            -->
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <input type="file" name="files[]" multiple>
                        <input type="submit" name="upload" value="Upload" />
            
                        
                        
                    </div>
            </div>
