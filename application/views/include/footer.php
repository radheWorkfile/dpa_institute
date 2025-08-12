<?php $custom_setting = $this->db->select('*')->get('setting')->row(); ?>

<div class="footer">
  <div class="copyright">
    <p>© 2024 All Right Reserved. Design & Development |
      <b><a href="<?php echo base_url('administrator/dashboard');?>"><?php echo $custom_setting->reservedText ? $custom_setting->reservedText :'NGO'; ?></a></b>
    </p>
  </div>
</div>
</div>

<style>
  .mt-1 {
    margin-top: 1rem;
  }

  .mt-2 {
    margin-top: 2rem;
  }

  .mt-3 {
    margin-top: 3rem;
  }

  .mt-4 {
    margin-top: 4rem;
  }

  .mt-5 {
    margin-top: 5rem;
  }

  .mt-8 {
    margin-top: 8rem;
  }

  .text-primary-light {
    color: #0053ff4d;
  }

  .card-size {
    height: 32rem;
  }

  .text-404 {
    font-size: 8rem;
  }

  /* Progress Animation */
  .uploaded-file__info--active::after {
    animation: progressMove 800ms ease-in-out;
    animation-delay: 300ms;
  }

  @keyframes progressMove {
    from {
      width: 0%;
      background-color: transparent;
    }

    to {
      width: 100%;
      background-color: var(--clr-blue);
    }
  }

  .uploaded-file__name {
    width: 100%;
    max-width: 6.25rem;
    /* 100px */
    display: inline-block;
    font-size: 1rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .uploaded-file__counter {
    font-size: 1rem;
    color: var(--clr-light-gray);
  }

  .text-color-g {
    color: #39cfd7;
  }

  .m-t-1 {
    margin-top: -1rem;
  }

  /* kyc verification style section start form here... */

  .custom-height-3 {
    height: 3rem;
  }

  ::placeholder {
    font-size: 0.8rem;
  }

  .submitBtn {
    padding: 0.5rem 2.8rem;
    background-color: #006f75;
    color: white;
  }

  * {
    margin: 0;
    padding: 0;
  }

  html {
    height: 100%;
  }

  .custom-border-1 {
    border: 1px solid #ddd9d9 !important;
  }

  #msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
  }

  #msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% -3px 3%;
    position: relative;
  }

  #msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
  }

  #msform fieldset:not(:first-of-type) {
    display: none;
  }

  #msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E;
  }

  #msform input,
  #msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px;
  }

  #msform input:focus,
  #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid #006f75;
    outline-width: 0;
  }

  #msform .action-button {
    width: 100px;
    background: #006f75;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0.2rem;
    cursor: pointer;
    padding: 8px 5px;
    margin: 10px 5px;
  }

  #msform .action-button:hover,
  #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #006f75;
  }

  #msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0.4rem;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
  }

  #msform .action-button-previous:hover,
  #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
  }

  select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px;
  }

  select.list-dt:focus {
    border-bottom: 2px solid #006f75;
  }

  .card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative;
  }

  .fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
  }

  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
  }

  #progressbar .active {
    color: #000000;
  }

  #progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative;
  }

  #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023";
  }

  #progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
  }

  #progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d";
  }

  #progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
  }

  #progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
  }

  #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
  }

  #progressbar li.active:before,
  #progressbar li.active:after {
    background: #006f75;
  }

  .radio-group {
    position: relative;
    margin-bottom: 25px;
  }

  .radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px;
  }

  .radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
  }

  .radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
  }

  .fit-image {
    width: 100%;
    object-fit: cover;
  }


  /* kyc verification style section completed  */
</style>

<script src="<?php echo base_url('assets/vendor/global/global.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/chart-js/chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custom.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/deznav-init.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/apexchart/apexchart.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/peity/jquery.peity.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dashboard/dashboard-1.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/svganimation/vivus.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/svganimation/svg.animation.js'); ?>"></script>
<script src="<?php echo base_url('assets/vendor/toastr/js/toastr.min.js'); ?>"></script>
<script src="<?php echo base_url('front/js/bootstrap-datepicker.min.js'); ?>"> </script>
<script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<!--<script src="<?php //echo base_url('assets/js/plugins-init/datatables.init.js');
?>"></script> -->
<script>
  function get_search(tbactn, frmId, tbstorage) {
    $(frmId).submit(function (e) {
      e.preventDefault();
      $(tbstorage).DataTable().clear().destroy();
      let search = $(frmId).serializeArray();
      let searchObj = {};
      $.each(search, function (i, row) {
        searchObj[row.name] = row.value;
      });
      tbactn.printTable(searchObj);
      $('html,body').animate({
        scrollTop: $(tbstorage).offset().top
      }, 'slow');
    });
  }

  function getpaginate(search_data, id, pageLoc, plchldr) //id,page,placehldr
  {
    $(id).DataTable({
      "processing": true,
      "serverSide": true,
      "order": [],
      "bDestroy": true,
      'columnDefs': [{
        'targets': [1, 2, 3],
        'orderable': true
      }],
      "ajax": {
        "url": pageLoc,
        "type": "POST",
        "dataSrc": "data",
        "data": search_data
      },
      language: {
        searchPlaceholder: plchldr
      },
      // dom: 'Bfrtip',
      dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "lengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
      ],
      "buttons": [] /*"excel", "pdf", "print"*/
    });

  }





  (function ($) {
    "use strict"
    $("#toastr-danger-top-right").on("click", function () {
      toastr.error("Please input mobile number.", "", {
        positionClass: "toast-top-right",
        timeOut: 10e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "30000",
        hideDuration: "100000",
        extendedTimeOut: "100000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
      })
    });

    $(document).ready(function () {
      $('.arvDate').datepicker({
        format: 'dd-mm-yyyy'
      });
      $(".getTargetAction").click(function () {
        let actnID = $(this).attr('id');
        let actNbtn = $(this).attr('data-id');
        let getData = actNbtn.split('===');
        if (actnID == 'cnfChanges') {
          if (getData[0] == 'cnfDeleteDetail') {
            $('#cnfChanges').html('Please Wait <i class="fa fa-sun bx-spin"></i>');
            $.post($('#base_url').val() + getData[1], {
              oprType: getData[0],
              id: getData[2]
            }, function (htmlAmi) {
              $('#cnfChanges').html('Confirm Delete <i class="fa-solid fa-trash-can"></i>');
              if (htmlAmi.action == 'success') {
                setTimeout(function () {
                  $('#deletePanel').modal('hide');
                  window.location.reload(1)
                }, 2000);
              }
              $('.actnData').html(htmlAmi.msg).css('color', htmlAmi.tClor);
            }, 'json');

          }
        }
      });

    });

    $(document).on("click", '.getAction', function () {
      let actNbtn = $(this).attr('data-id');
      let getData = actNbtn.split('===');
      if (getData[0] == 'viewDelete') {
        $('#delAr--' + getData[2]).html('<i class="fa fa-sun bx-spin"></i>');
        $.post($('#base_url').val() + getData[1], {
          oprType: getData[0],
          id: getData[2]
        }, function (htmlAmi) {
          $('.actnData').html(htmlAmi.msg).css('color', htmlAmi.tClor);
          $('#cnfChanges').attr('data-id', htmlAmi.action);
          $('#delAr--' + getData[2]).html('<i class="fa fa-trash"></i>');
        }, 'json');
      }
    });





    $(document).on("click", '.mClose', function () {
      let getID = $(this).attr('id');
      let targetID = getID.split('-');
      $('#mrk-' + targetID[1]).fadeOut('slow');
    });
  })(jQuery);

  $(document).ready(function () {
    $(".arvSidebar").unbind('click').click(function () {
      let actNbtn = $(this).attr('id');
      let tagretLoc = $(this).attr('data-id');
      if (actNbtn == "dashboardPanel") {
        window.location.replace(tagretLoc);
      }
    });
  });

  function toastMultiShow(adCls, msg, icon) {
    let valid = '';
    let myClass = "tSuccess tWarning tDanger";
    let restCls = myClass.replace(adCls, " ");
    let addonMsg = '';
    $.each(msg, function (i, item) {
      if (item != "") {
        valid += '<div class="tChild ' + adCls + '" id="mrk-' + i + '">' + icon + item.replace(/(<([^>]+)>)/ig, "") + '<i class="fa-solid fa-xmark mClose" id="icn-' + i + '"></i></div>';
        setTimeout(function () {
          $('#mrk-' + i).fadeOut('slow');
        }, 3000);
      }
    });
    $('.arvToast').css('visibility', 'visible').html(valid);
  }


  $(function () {
    $(document).on("click", '.getAction', function () {
      let actNbtn = $(this).attr('data-id');
      let getData = actNbtn.split('===');

      if (getData[0] == 'miStatusView') {
        let target = $('#base_url').val() + getData[1];
        $.post(target, { oprType: getData[0], id: getData[2] }, function (htmlAmi) {
          $('.actnData').html(htmlAmi.msg);
          $('#cnfChangesStatus').attr('data-id', htmlAmi.action);
        }, 'json');
      }
      else if (getData[0] == 'miStatusChange') {
        let getCurentId = $(this).attr("id");
        $("#" + getCurentId).prop("disabled", true).css('color', 'green');

        let target = $('#base_url').val() + getData[1];
        $('#cnfChanges,#cnfChangesStatus').html('<i class="fa fa-sun bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');

        $.post(target, { oprType: getData[0], id: getData[2] }, function (htmlAmi) {
          $('#' + getCurentId).html('Confirm <i class="fa-regular fa-circle-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
          $("#arvs--" + getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
          $('.actnData').html(htmlAmi.msg);
          $("#" + getCurentId).prop("disabled", false);
          if (htmlAmi.reloadPage) {
            setTimeout(function () {
              $('#statusChange').modal('hide');
              window.location.href = htmlAmi.reloadPage;
            }, 2500);
          }
          else {
            $('#statusChange').delay(3000).modal('hide');
          }
        }, 'json');
      }
    });
  });





</script>



<style>
  :root {
    --clr-white: rgb(255, 255, 255);
    --clr-black: rgb(0, 0, 0);
    --clr-light: rgb(245, 248, 255);
    --clr-light-gray: rgb(196, 195, 196);
    --clr-blue: rgb(63, 134, 255);
    --clr-light-blue: rgb(171, 202, 255);
  }


  /* Upload Area */
  .upload-area {
    width: 100%;
    max-width: 55rem;
    background-color: var(--clr-white);
    box-shadow: 0 10px 60px rgb(218 229 255 / 25%);
    border: 2px solid var(--clr-light-blue);
    border-radius: 12px;
    padding: 2rem 1.875rem 1rem 1.875rem;
    margin: 0.625rem;
    text-align: center;
  }

  .upload-area--open {
    /* Slid Down Animation */
    animation: slidDown 500ms ease-in-out;
  }

  @keyframes slidDown {
    from {
      height: 28.125rem;
      /* 450px */
    }

    to {
      height: 35rem;
      /* 560px */
    }
  }

  /* Header */
  .upload-area__header {}

  .upload-area__title {
    font-size: 1.8rem;
    font-weight: 500;
    margin-bottom: 0.3125rem;
  }

  .upload-area__paragraph {
    font-size: 0.9375rem;
    color: var(--clr-light-gray);
    margin-top: 0;
  }

  .upload-area__tooltip {
    position: relative;
    color: var(--clr-light-blue);
    cursor: pointer;
    transition: color 300ms ease-in-out;
  }

  .upload-area__tooltip:hover {
    color: var(--clr-blue);
  }

  .upload-area__tooltip-data {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -125%);
    min-width: max-content;
    background-color: var(--clr-white);
    color: var(--clr-blue);
    border: 1px solid var(--clr-light-blue);
    padding: 0.625rem 1.25rem;
    font-weight: 500;
    opacity: 0;
    visibility: hidden;
    transition: none 300ms ease-in-out;
    transition-property: opacity, visibility;
  }

  .upload-area__tooltip:hover .upload-area__tooltip-data {
    opacity: 1;
    visibility: visible;
  }

  /* Drop Zoon */
  .upload-area__drop-zoon {
    position: relative;
    height: 8.25rem;
    /* 180px */
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border: 2px dashed var(--clr-light-blue);
    border-radius: 15px;
    margin-top: 0.1875rem;
    cursor: pointer;
    transition: border-color 300ms ease-in-out;
  }

  .upload-area__drop-zoon:hover {
    border-color: var(--clr-blue);
  }

  .drop-zoon__icon {
    display: flex;
    font-size: 3.75rem;
    color: var(--clr-blue);
    transition: opacity 300ms ease-in-out;
  }

  .drop-zoon__paragraph {
    font-size: 0.9375rem;
    color: var(--clr-light-gray);
    margin: 0;
    margin-top: 0.625rem;
    transition: opacity 300ms ease-in-out;
  }

  .drop-zoon:hover .drop-zoon__icon,
  .drop-zoon:hover .drop-zoon__paragraph {
    opacity: 0.7;
  }

  .drop-zoon__loading-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
    color: var(--clr-light-blue);
    z-index: 10;
  }

  .drop-zoon__preview-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 0.3125rem;
    border-radius: 10px;
    display: none;
    z-index: 1000;
    transition: opacity 300ms ease-in-out;
  }

  .drop-zoon:hover .drop-zoon__preview-image {
    opacity: 0.8;
  }

  .drop-zoon__file-input {
    display: none;
  }

  /* (drop-zoon--over) Modifier Class */
  .drop-zoon--over {
    border-color: var(--clr-blue);
  }

  .drop-zoon--over .drop-zoon__icon,
  .drop-zoon--over .drop-zoon__paragraph {
    opacity: 0.7;
  }

  /* (drop-zoon--over) Modifier Class */
  .drop-zoon--Uploaded {}

  .drop-zoon--Uploaded .drop-zoon__icon,
  .drop-zoon--Uploaded .drop-zoon__paragraph {
    display: none;
  }

  /* File Details Area */
  .upload-area__file-details {
    height: 0;
    visibility: hidden;
    opacity: 0;
    text-align: left;
    transition: none 500ms ease-in-out;
    transition-property: opacity, visibility;
    transition-delay: 500ms;
  }

  /* (duploaded-file--open) Modifier Class */
  .file-details--open {
    height: auto;
    visibility: visible;
    opacity: 1;
  }

  .file-details__title {
    font-size: 1.125rem;
    font-weight: 500;
    color: var(--clr-light-gray);
  }

  /* Uploaded File */
  .uploaded-file {
    display: flex;
    align-items: center;
    padding: 0.625rem 0;
    visibility: hidden;
    opacity: 0;
    transition: none 500ms ease-in-out;
    transition-property: visibility, opacity;
  }

  /* (duploaded-file--open) Modifier Class */
  .uploaded-file--open {
    visibility: visible;
    opacity: 1;
  }

  .uploaded-file__icon-container {
    position: relative;
    margin-right: 0.3125rem;
  }

  .uploaded-file__icon {
    font-size: 3.4375rem;
    color: var(--clr-blue);
  }

  .uploaded-file__icon-text {
    position: absolute;
    top: 1.5625rem;
    left: 50%;
    transform: translateX(-50%);
    font-size: 0.9375rem;
    font-weight: 500;
    color: var(--clr-white);
  }

  .uploaded-file__info {
    position: relative;
    top: -0.3125rem;
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .uploaded-file__info::before,
  .uploaded-file__info::after {
    content: '';
    position: absolute;
    bottom: -0.9375rem;
    width: 0;
    height: 0.5rem;
    background-color: #ebf2ff;
    border-radius: 0.625rem;
  }

  .uploaded-file__info::before {
    width: 100%;
  }

  .uploaded-file__info::after {
    width: 100%;
    background-color: var(--clr-blue);
  }

  .py {
    padding: 0.5rem 1rem;
  }
</style>


<script>
  $(document).ready(function () {
    // Check if the file input has a value on page load
    if ($('#fileInput').val()) {
      $('#fileInput').prop('disabled', false);  // Ensure it's enabled if a file is already selected
    }

    const uploadArea = document.querySelector('#uploadArea')
    const dropZoon = document.querySelector('#dropZoon');
    const loadingText = document.querySelector('#loadingText');
    const fileInput = document.querySelector('#fileInput');
    const previewImage = document.querySelector('#previewImage');
    const fileDetails = document.querySelector('#fileDetails');
    const uploadedFile = document.querySelector('#uploadedFile');
    const uploadedFileInfo = document.querySelector('#uploadedFileInfo');
    const uploadedFileName = document.querySelector('.uploaded-file__name');
    const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');
    const uploadedFileCounter = document.querySelector('.uploaded-file__counter');
    const toolTipData = document.querySelector('.upload-area__tooltip-data');
    const imagesTypes = ["jpeg", "png", "svg", "gif"];

    toolTipData.innerHTML = [...imagesTypes].join(', .');

    dropZoon.addEventListener('dragover', function (event) {
      event.preventDefault();
      dropZoon.classList.add('drop-zoon--over');
    });

    dropZoon.addEventListener('dragleave', function (event) {
      dropZoon.classList.remove('drop-zoon--over');
    });

    dropZoon.addEventListener('drop', function (event) {
      event.preventDefault();
      dropZoon.classList.remove('drop-zoon--over');
      const file = event.dataTransfer.files[0];
      uploadFile(file);
    });

    dropZoon.addEventListener('click', function (event) {
      fileInput.click();
    });

    fileInput.addEventListener('change', function (event) {
      const file = event.target.files[0];
      uploadFile(file);
    });

    function uploadFile(file) {
      const fileReader = new FileReader();
      const fileType = file.type;
      const fileSize = file.size;

      if (fileValidate(fileType, fileSize)) {
        dropZoon.classList.add('drop-zoon--Uploaded');
        loadingText.style.display = "block";
        uploadedFile.classList.remove('uploaded-file--open');
        uploadedFileInfo.classList.remove('uploaded-file__info--active');

        fileReader.addEventListener('load', function () {
          setTimeout(function () {
            uploadArea.classList.add('upload-area--open');
            loadingText.style.display = "none";
            previewImage.style.display = 'block';
            fileDetails.classList.add('file-details--open');
            uploadedFile.classList.add('uploaded-file--open');
            uploadedFileInfo.classList.add('uploaded-file__info--active');
          }, 500);

          previewImage.setAttribute('src', fileReader.result);
          uploadedFileName.innerHTML = file.name;
          progressMove();
        });

        fileReader.readAsDataURL(file);
      } else {
        alert('Invalid file type or size');
      }
    }

    function progressMove() {
      let counter = 0;
      setTimeout(() => {
        let counterIncrease = setInterval(() => {
          if (counter === 100) {
            clearInterval(counterIncrease);
          } else {
            counter = counter + 10;
            uploadedFileCounter.innerHTML = `${counter}%`;
          }
        }, 100);
      }, 600);
    }

    function fileValidate(fileType, fileSize) {
      let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

      if (isImage[0] === 'jpeg') {
        uploadedFileIconText.innerHTML = 'jpg';
      } else {
        uploadedFileIconText.innerHTML = isImage[0];
      }

      if (isImage.length !== 0) {
        if (fileSize <= 2000000) {
          return true;
        } else {
          alert('Please Your File Should be 2 Megabytes or Less');
        }
      } else {
        alert('Please make sure to upload An Image File Type');
      }
      return false;
    }
  });

</script>

</body>

</html>