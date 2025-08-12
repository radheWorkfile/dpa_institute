

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
      <div class="basic-form" id="bannerCreate_sec">
        <form id="updateProgram" method="post" data-id="<?php echo $createProgram;?>" accept-charset="utf-8" enctype="multipart/form-data">
       <!-- program section start  from here -->
        <div class="row">
          
          <div class="col-md-12"> 
          <div class="row mt-2">

          <div class="col-md-3"></div>
          <div class="col-md-6"style="box-shadow:1px 1px 11px #80808029;padding:5rem 2rem 3rem 2rem;">
          <div class="row">
          <div class="col-md-12">
          <div class="mb-3">
          <label for="" class="text-color-g">&nbsp;&nbsp;Add Program <span class="text-danger">&nbsp;*</span></label>
          <div class="input-group">
          <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
          <input type="text" class="form-control border-left-end" name="project_name" id="project_name" value="<?php echo $program->program_name?$program->program_name:'';?>" placeholder="Enter Project Name .." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
          <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $program->id?$program->id:'';?>" placeholder="Enter Project Name .." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
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
          <input type="text" class="form-control border-left-end" name="location" id="location" value="<?php echo $program->location?$program->location:'';?>" placeholder="Enter Location ..." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
          <div class="invalid-feedback">Please Enter Heading.
          </div>
          </div>
          </div>
          </div>

          <!-- <div class="col-md-6">
          <label for="" class="text-color-g">&nbsp;&nbsp;Start Date <span class="text-danger">&nbsp;*</span></label>
          <div class="mb-3">
          <div class="input-group">
          <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
          <input type="date" class="form-control border-left-end" name="start_date" value="<?php echo $program->start_date?$program->start_date:'';?>" id="start_date" placeholder="Enter Start Date.." required="">
          <div class="invalid-feedback">Please Enter Heading.
          </div>
          </div>
          </div>
          </div> -->

          <!-- <div class="col-md-6">
          <label for="" class="text-color-g">&nbsp;&nbsp;End Date <span class="text-danger">&nbsp;*</span></label>
          <div class="mb-3">
          <div class="input-group">
          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          <input type="date" class="form-control border-left-end" name="end_date" id="end_date" value="<?php echo $program->end_date?$program->end_date:'';?>" placeholder="Enter End Date.." required="">
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
          <span class="input-group-text"> <i class="fa fa-link"></i> </span>  
          <textarea class="form-control" maxlength="400" rows="3" id="message" name="message" spellcheck="false" required=""oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $program->description?$program->description:'';?></textarea>
          <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.." required=""> -->
          <div class="invalid-feedback">Please Enter Your text.
          </div>
          </div>
          </div>
          </div>
           </div>

          <div class="col-md-12">
          <label class="picture" for="picture__input" tabIndex="0" >
          <span class="picture__image" id="value">
          <img src="<?php echo base_url($program->program_img ? $program->program_img : ''); ?>" alt="" />
          </span>
          </label>
          <input type="file" name="proImg" id="picture__input">
          </div>


          <div class="row mt-4">
          <div class="col-md-5"></div>
          <div class="col-md-4">
          <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Update</button>
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
      </div>

      </div>
      </div>
      </div>
      </div>
      </div>      
      </div> 

  <!-- =================================== Status Model section End ======================== -->
    <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-body">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
         <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
         <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
         <div id="mdlFtrBtn">
         <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">
         Confirm <i class="si si-check"></i>
         </button>
         <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
         <i class="fa fa-arrow-left"></i> Back 
         </button>   
         </div>	
         </div>
         </div>
         </div>
    </div>
<!-- =================================== Status Model section End ======================== -->


      <style>
        .text-color-g{color:rgb(0, 111, 117) !important;}
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

      <script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>
      

        <script>

        $(document).ready(function () {
        $("#updateProgram").on("submit", function (e) {
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
              if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc ; }, 2000); }
             }
            }); });});


            const inputFile = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Choose an image";

// Function to update the image or text
function updatePictureImage(imageUrl) {
    if (imageUrl) {
        // If imageUrl is provided, create an image element and display it
        const img = document.createElement("img");
        img.src = imageUrl;
        img.classList.add("picture__img");
        pictureImage.innerHTML = "";  // Clear previous content
        pictureImage.appendChild(img);  // Append the image
    } else {
        // If no image URL, show default text
        pictureImage.innerHTML = pictureImageTxt;
    }
}

// Preloaded image from PHP (if exists) or fallback to empty string
const preloadedImage = "<?php echo base_url($program->program_img ? $program->program_img : ''); ?>";

// Check if there is a preloaded image and update the display
if (preloadedImage) {
    updatePictureImage(preloadedImage);  // Show the preloaded image if available
} else {
    updatePictureImage("");  // Show the default text if no preloaded image
}

// Event listener for file input changes (user selecting a file)
inputFile.addEventListener("change", function (e) {
    const inputTarget = e.target;
    const file = inputTarget.files[0];  // Get the selected file

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function (e) {
            const readerTarget = e.target;
            updatePictureImage(readerTarget.result);  // Show the selected image
        });

        reader.readAsDataURL(file);  // Read the file as a data URL (image preview)
    } else {
        updatePictureImage("");  // Show default text if no file is selected
    }
});



    </script>
