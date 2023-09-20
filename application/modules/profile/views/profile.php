<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<style>
.cropper-hidden{
    display: block!important;
}
#crop_button{
    display:none;
}
</style>
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8 row">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('manage_profile'); ?>
                </header>
                <div class="panel-body sec-panel-body-bg" >
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="<?php echo base_url().'profile/addNew';?>" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                    if (!empty($profile->username)) {
                                        echo $profile->username;
                                    }
                                    ?>' placeholder="">
                                </div>
                                <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <div class="input-group">
                        <input type="password" class="form-control password" name="password"  id="password"  placeholder="********" autocomplete="new-password">
                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                    </div></div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                    if (!empty($profile->email)) {
                                        echo $profile->email;
                                    }
                                    ?>' placeholder="" <?php
                                           if (!empty($profile->username)) {
                                               echo $profile->username;
                                           }
                                           ?>' placeholder="" autocomplete="new-username">
                                </div>
                                <!-- user sign -->
                                <div class="form-group col-md-5">
                                <div>
                                    <label for="UploadSignature_image "><?php echo lang('signature'); ?></label>
                                </div>
                                <?php
                                    $sign = $user_sign->user_sign;
                                    define('SIGNATURE','./uploads/user_signatures/');
                                    if(!empty($sign)){
                                    foreach ($user_sign as $key => $value) {?>   
                                           
                                <div id="signature_preview_edit" class="form-group">
                                    <div class="remove_img">
                                        <input type="file" name="signature_file" id="signature_file" hidden> 
                                    </div>
                                    <div id="signature_preview_1">
                                        <img src="<?php echo SIGNATURE.$value;?>"  id="sign_image" alt="user sign"  class="sign_image">
                                    </div>
                                </div>
                                <?php }?>
                                <button type="button" class="btn btn-primary" id="UploadSignature_image"><?php echo lang('change_signature'); ?></button>
                                <!-- Add a button to trigger the cropping process -->
                                <button type="button" id="crop_button">Crop Image</button>
                                
                                <!-- Add a hidden input to store the cropped image data -->
                                <input type="hidden" name="cropped_image_data" id="cropped_image_data">
                                <?php }
                                    if(empty($sign))
                                    {?>
                                <button type="button" class="btn btn-primary" id="UploadSignature_image"><?php echo lang('upload_signature'); ?></button>
                                <input type="file" name="signature_file" id="signature_file" hidden>
                                <!-- Add a button to trigger the cropping process -->
                                <button type="button" id="crop_button">Crop Image</button>
                                
                                <!-- Add a hidden input to store the cropped image data -->
                                <input type="hidden" name="cropped_image_data" id="cropped_image_data">
                                <div id="signature_preview" class="form-group">
                                    <div class="remove_img">
                                        <button type="button" id="sign_remove_btn"><i class="fa fa-remove" style="font-size:24px;color:red"></i></button>
                                    </div>
                                    <div id="signature_preview_1">
                                        <img src="" class="sign_image" id="sign_image" alt="user sign" srcset="">
                                    </div>
                                </div>
                                <?php } ?>
                                </div>
                                <input type="hidden" name="id" value='<?php
                                if (!empty($profile->id)) {
                                    echo $profile->id;
                                }
                                ?>'>
                                <!-- Add an image element to display the cropped image -->
                                <!-- <img id="cropped_image" src="" alt="Cropped Image"> -->
                                
                                
                                
                                <div class="form-group">
                                <!-- <button type="button" class="btn btn-primary" id="crop_button">crop</button> -->
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --> 
    <!-- Include Cropper.js from a CDN -->
<!-- Include Cropper.js and Bootstrap CSS/JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script>
    var upload_btn = document.getElementById('UploadSignature_image');
    var crop_button = document.getElementById('crop_button');
    var signature_preview = document.getElementById('signature_preview');
    var signature_preview_edit = document.getElementById('signature_preview_edit');
    var image_file =document.getElementById('signature_file');
    var sign_image =document.getElementById('sign_image');
    var sign_remove =document.getElementById('sign_remove_btn');
    const reader = new FileReader(); 
upload_btn.onclick= function(){
    image_file.click();
    // crop_button.style.display = 'block';
    

}
const sign_file_1 = image_file.addEventListener('change', function(event) {
    const selectedFile = event.target.files[0];
    if (selectedFile) {
        reader.onload = function() {
            crop_button.style.display = 'block';
            sign_image.src = reader.result; 
            signature_preview.style.display = 'flex';
            signature_preview.style.flexDirection = 'column';
            upload_btn.style.display = 'none';
            

        };
        reader.readAsDataURL(selectedFile);
 
    } else {
        sign_image.src = ''; 
    }
});

crop_button.onclick = function () {
    // Hide the crop_button when it's clicked
    crop_button.style.display = 'none';
}

sign_remove.onclick = function(){

    sign_image.src = '';
    signature_preview.style.display = 'none';  
    upload_btn.style.display = 'block';
    sign_remove.style.display = 'block';
    signature_file.value = null;
    reader.abort(); 
    reader = new FileReader();
}

var save_sign = document.getElementById('save_sign');
save_sign.onclick = function(){
    console.log(sign_file_1);
}

</script>
<script>

    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
      $(function(){
  
  $('.eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('.password').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('.password').attr('type','password');
        }
    });
});
 </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    var image = document.getElementById('cropped_image');
    var image1 = document.getElementById('sign_image');
    var cropper;

    function initCropper() {
        cropper = new Cropper(image1, {
            aspectRatio: 5, // Set your desired aspect ratio
            viewMode: 4,
        });
    }

    // When a file is selected, load it into the Cropper
    document.getElementById('signature_file').addEventListener('change', function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                image1.src = e.target.result;
                initCropper();
            };
            reader.readAsDataURL(file);
        }
    });
    // Handle the "Crop" button click
    document.getElementById('crop_button').addEventListener('click', function () {
        if (cropper) {

            var croppedData = cropper.getCroppedCanvas().toDataURL('image/jpeg');

            // image.src = croppedData;
            image1.src = croppedData;

            document.getElementById('cropped_image_data').value = croppedData;
            var cropperContainer = document.querySelector('.cropper-bg');
            cropperContainer.style.display = 'none';
        }
    });
});
</script>