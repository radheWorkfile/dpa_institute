<!-- previewImage -->
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <!-- ------------------------------------------- -->
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-white"><?php echo $title; ?></h4>
          </div>
          <div class="card-body">
            <div class="basic-form" id="bannerCreate_sec">
              <!-- ============================================ Banner section start ================================== -->
              <div class="row">
                <div class="col-12 d-md-flex justify-content-center">
                  <div class="col-md-9 my-3 position-relative my-lg-0">
                    <div class="" id="scrool-bar-man">
                      <div class="" id="myChat">
                        <h2 class="text-center text-dark mb-3"><span id="tic-sugg-man">Customer Enquiry Suggestions</span></h2>
                        <?php if (!empty($getData)): ?>
                          <?php foreach ($getData as $mem): ?>
                            <?php if ($mem['mem_id'] == 1001): ?>
                              <span style="" id="admin-message-part"><?php echo $mem['discription']; ?></span>
                            <?php else: ?>
                              <div class="d-flex justify-content-end">
                                <span class="text-success" id="client-message-part"><?php echo $mem['discription']; ?></span>
                              </div>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <p style="color:#6c6969;padding-right:6rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam iure delectus eos quaerat? Porro veniam voluptatum rem nesciunt excepturi deleniti?</p>
                          <p class="text-success" style="text-align:right;padding-left:6rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim facilis, mollitia eaque, fuga voluptatibus laboriosam, natus blanditiis repudiandae neque hic sint laborum.</p>
                        <?php endif; ?>
                      </div>

                    </div>
                    <form id="ticSuggAns" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="message-box-bottom">
                      <input type="text" placeholder="Enter Message" id="answer" name="answer">
                      <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $ticId; ?>">
                      <button class="fa-paper-plane-position">Send <i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ------------------------------------------- -->
    </div>
  </div>
</div>



<style>
  #scrool-bar-man {
    height: 27rem !important;
    width: 100%;
    aspect-ratio: 3/1;
    border: 1px solid #ffffff82;
    overflow-x: hidden;
    overflow-y: scroll;
    scroll-snap-type: y mandatory;
    box-shadow: 1px 1px 5px #80808036;
    padding: 0.8rem 0rem;
    border-radius: 10px 10px 0px 0px;
    background-color: black;
    position: relative;
  }

  .message-box-bottom {
    width: 100%;
    position: relative
  }

  .message-box-bottom>.fa-paper-plane-position {
    position: absolute;
    color: wwhite;
    font-size: 18px;
    right: 1px;
    top: 0px;
    padding: 8px 34px;
    cursor: pointer;
    border: 0px;
    outline: 0px;
  }

  .message-box-bottom>input {
    width: 100%;
    padding: 10px;
    position: relative;
    background-color: transparent;
    color: white;
    border: 1px solid white;
  }

  #admin-message-part {
    color: #6c6969;
    padding-right: 6rem;
    display: inline-block;
    min-width: 250px;
    max-width: 100%;
    background: white;
    padding: 10px 20px 10px 10px;
    font-size: 18px;
    border-radius: 21px 21px 21px 0px;
    margin: 15px 0px;
  }

  #client-message-part {
    text-align: right;
    padding-left: 6rem;
    display: inline-block;
    background: #b4f4ff;
    padding: 10px 20px 10px 22px;
    font-size: 18px;
    min-width: 0px;
    max-width: 100%;
    border-radius: 21px 21px 0px 21px;
    margin: 15px 0px;
  }



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

  @media (min-width:0px) and (max-width:576px) {
    #scrool-bar-man>#myChat {
      padding: 0rem;
      margin: 10px;
    }

    #start-chat-left-part {
      box-shadow: 1px 1px 11px #80808036;
      padding: 1rem;
      border: 1px solid #f5deb38f;
      border-radius: 0px 21px 21px 0px;
    }
  }

  @media (min-width:576px) and (max-width:768px) {
    #scrool-bar-man>#myChat {
      /* padding: 2rem 4rem 4rem 4rem; */
      margin: 10px;
    }

    #start-chat-left-part {
      box-shadow: 1px 1px 11px #80808036;
      padding: 4rem 4rem;
      border: 1px solid #f5deb38f;
      border-radius: 0px 21px 21px 0px;
    }
  }

  @media (min-width:768px) {
    #scrool-bar-man>#myChat {
      padding: 2rem 4rem 4rem 4rem;
    }

    #start-chat-left-part {
      box-shadow: 1px 1px 11px #80808036;
      padding: 4rem 4rem;
      border: 1px solid #f5deb38f;
      border-radius: 0px 21px 21px 0px;
    }
  }
#tic-sugg-man{background-color:#b8d7f9;padding:0.5rem 2rem;border-radius:2rem;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);}
@media(max-width:500px)
{
  #tic-sugg-man{font-size:14px;}
}
</style>


<script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>

<script>
  $(document).ready(function() {
    $("#ticSuggAns").on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: '<?= base_url() ?>website/ticketing/ticSuggAns',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: function(htmlAmi) {
          toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
          if (htmlAmi.addClas == 'tSuccess') {
            $("#myChat").append(htmlAmi.getLatestChat);
          }
        },
      });
    });
  });


  var targeteventList_item = '';
  $(document).ready(function() {
    let searchObj = {};
    var targetAction = $('#targetSection').attr('data-id');
    targeteventList_item = {
      printTable: function(search_data) {
        getpaginate(search_data, '#targetSection', targetAction, 'Only For Tnx id, Month.');
      }
    };
    targeteventList_item.printTable(searchObj);
  });
</script>

<script>
  window.onload = function() {
    const chatBox = document.getElementById("scrool-bar-man");
    console.log(chatBox.scrollHeight)
    chatBox.scrollTop = chatBox.scrollHeight;
  };
</script>