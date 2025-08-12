

<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title text-white"><?php echo $title;?></h4>
      </div>
      <div class="card-body">
      <div class="basic-form" id="createProSec">
 <!-- ============================================ Project section start ================================== -->

      <form id="update" method="post" data-id="<?php echo $updateProject?>" accept-charset="utf-8" enctype="multipart/form-data">
<div class="row">
            <div class="col-md-12">   
            <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-md-6"style="box-shadow:1px 1px 11px #80808029;padding:5rem 2rem 3rem 2rem;">
            <div class="row">
            <div class="col-md-12">
            <div class="mb-3">
            <label for="" class="text-color-g">&nbsp;&nbsp;Add Project <span class="text-danger">&nbsp;*</span></label>
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="project_name" value="<?php echo $project->project_name?$project->project_name:'';?>" id="project_name" placeholder="Enter Project Name .." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <input type="hidden" class="form-control border-left-end" name="id" value="<?php echo $project->id?$project->id:'';?>" id="id">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-12">
            <div class="mb-3">
            <label for="" class="text-color-g">&nbsp;&nbsp;Enter Location<span class="text-danger">&nbsp;*</span></label>
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-address-card text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="location" id="location" value="<?php echo $project->location?$project->location:'';?>" placeholder="Enter Location ..." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <!-- <div class="col-md-6">
            <label for="" class="text-color-g">&nbsp;&nbsp;Start Date <span class="text-danger">&nbsp;*</span></label>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="date" class="form-control border-left-end" name="start_date" id="start_date" value="<?php echo $project->start_date?$project->start_date:'';?>" placeholder="Enter Start Date.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div> -->
<!-- 
            <div class="col-md-6">
            <label for="" class="text-color-g">&nbsp;&nbsp;End Date <span class="text-danger">&nbsp;*</span></label>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="date" class="form-control border-left-end" name="end_date" id="end_date" value="<?php echo $project->end_date?$project->end_date:'';?>" placeholder="Enter End Date.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div> -->

            <div class="col-md-12 mt-2">
            <div class="col-md-12">
            <label for="" class="text-color-g">&nbsp;&nbsp;Enter Description</label>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="3" id="message" name="message" spellcheck="false" required=""oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $project->description?$project->description:'';?></textarea>
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
             </div>

            <div class="col-md-12">
            <label class="picture" for="picture__input" tabIndex="0" >
            <span class="picture__image" id="value">
            <img src="<?php echo base_url($project->project_img ? $project->project_img : ''); ?>" alt="" />
            </span>
            </label>
            <input type="file" name="proImg" id="picture__input"value="<?php echo $project->project_img ? $project->project_img : '';?>">
            </div>

            <div class="row mt-4">
            <div class="col-md-5"></div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
            </div>
            <div class="col-md-3"></div>
            </div>


            </div>
            </div>
            <div class="col-md-3"></div>
            </div>
            </div>
   </div>
    </form>
 <!-- ============================================ Project section start ================================== -->
      </div>
      </div>
      </div>
      </div>      
      </div> 
      </div> 



      <style>
.imageView {transition: transform 0.3s ease-in-out; }
.imageView:hover {transform: scale(5.5);}
           .sRvDeactive {
           padding: 4px 8px 4px 8px;
           background-color: #EE4B5C4F;
           color: #EE4B5C;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvActive {
           padding: 4px 15px 4px 15px;
           background-color: #0AC89024;
           color: #009569;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvSuspnd {
           padding: 4px 8px 4px 8px;
           background-color: #FF9F003D;
           color: #9D6200;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }


         #picture__input {
  display: none;
}

.picture {
  width: 100%;
  height:4rem;
  aspect-ratio: 16/9;
  background: rgba(173, 240, 236, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #aaa;
  border: 2px dashed currentcolor;
  cursor: pointer;
  font-family: sans-serif;
  transition: color 300ms ease-in-out, background 300ms ease-in-out;
  outline: none;
  overflow: hidden;
}

.picture:hover {
  color: #777;
  background: rgba(173, 240, 236, 0.6);;
}

.picture:active {
  border-color: turquoise;
  color: turquoise;
  background: #eee;
}

.picture:focus {
  color: #777;
  background: #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.picture__img {
  max-width: 100%;
}


         </style>

      <!-- <script src="<?//php echo base_url('assets/js/admin/employee.js') ?>"></script> -->
      

        <script>
        $(document).ready(function () {
        $("#update").on("submit", function (e) {
        let base_url = $(this).attr('data-id');
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: base_url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType:'json',
            success: function (htmlAmi) 
            {
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000); }
             }
            }); });});


            
            const inputFile = document.querySelector("#picture__input");
            const pictureImage = document.querySelector(".picture__image");
            const pictureImageTxt = "Choose an image";
            function updatePictureImage(imageUrl) {
            if (imageUrl) {
            const img = document.createElement("img");
            img.src = imageUrl;
            img.classList.add("picture__img");
            pictureImage.innerHTML = ""; 
            pictureImage.appendChild(img); 
            } else {
            pictureImage.innerHTML = pictureImageTxt;
            }
            }
            const preloadedImage = "<?php echo base_url($project->project_img ? $project->project_img : ''); ?>";
            updatePictureImage(preloadedImage); 
            inputFile.addEventListener("change", function (e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0]; 
            if (file) {
            const reader = new FileReader();
            reader.addEventListener("load", function (e) {
            const readerTarget = e.target;
            updatePictureImage(readerTarget.result); 
            });
            reader.readAsDataURL(file); 
            } else {
            updatePictureImage(""); 
            }
            });




    </script>
