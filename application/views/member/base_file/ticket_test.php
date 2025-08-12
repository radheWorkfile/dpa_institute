
    <div class="row mt-5">

            <div class="col-md-1"style="width:100%;"></div>

            <div class="col-md-10"style="padding:1rem 0rem 5rem 0rem;height:40rem;">
            <div class="row">

            <div class="col-md-6">
            <div class=""style="padding:5rem 4rem 1rem 4rem;box-shadow:1px 1px 11px grey;">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success text-center py-4" id="success-message">
            <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger text-center py-4" id="error-message">
            <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php endif; ?>
            <h3 class="text-center text-danger">Chat with Admin</h3><hr>
            <form action="<?php echo base_url();?>website/ticketing/ticketAnswer" method="POST" enctype="multipart/form-data" class="">
            <div class="pt-3">
            <div class="d-md-flex gap-3 justify-content-between">
            <div class="w-100">
            <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticketDetails->id;?>">
            <input type="hidden" name="mem_name" id="mem_name" value="<?php echo $mem_data->name;?>">
            <input type="hidden" name="mem_mob_no" id="mem_mob_no" value="<?php echo $mem_data->mobile_number;?>">
            <input type="hidden" name="mem_email_id" id="mem_email_id" value="<?php echo $mem_data->email_id;?>">
            <input type="text" name="subject" id="subject" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" required placeholder="Enter Name Here"
            class="bbbottom-1 py-1 px-3 w-100">
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="w-100 mt-4">
            <textarea name="suggAns" id="suggAns" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')" required id="" placeholder="Enter Message Here "class="messagetxttt py-1 px-3 w-100" cols="10" rows="3"></textarea>
            </div>
            </div>
            <div class="row mb-5"style="margin-top:0.6rem;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="w-100">
            <button class="bgk-primary py-1 px-3 messagetxttt mt-3 text-white w-100 text-center" type="submit">Submit</button>
            </div>
            </div>
            <div class="col-md-4"></div>
            </div>
            </div>
            </div>
            </form>
            </div>
            </div>

            <div class="col-md-6">
            <div class="" id="scrool-bar-manage"style="padding:5rem 1rem;box-shadow:1px 1px 11px grey;">
            <div class="" style="width:80%;margin:auto;">
            <h2 class="pb-1">Chat Start</h2><hr>
            <?php if(!empty($ticketAnswer)):?>
                <?php foreach($ticketAnswer as $tic):?>
                    <?php if($tic['mem_id'] == $memID):?>
                    <p class="text-success" style="text-align:right;padding-left:5rem;"><?php echo $tic['discription'];?></p>
                    <?php elseif($tic['mem_id'] == 1001):?>
                    <p class="text-danger"style="padding-right:5rem;"><?php echo $tic['discription'];?></p>
                    <?php endif;?>
                <?php endforeach;?>
            <?php else:?>
            <p class="text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing</p>
            <p class="text-success float-right">Lorem ipsum, dolor sit amet consectetur adipisicing</p>
            <?php endif;?>
            </div>
            </div>
            </div>

            </div>
            </div>
            <div class="col-md-1"></div>
    </div>
    <style>
    #scrool-bar-manage {
    height: 27.8rem !important;
    width: 100%;
    overflow-x: hidden;
    overflow-y: scroll;
  }
</style>
    <script>
    setTimeout(function() {
    var messageIds = ['success-message', 'error-message', 'another-message-id']; 
    messageIds.forEach(function(id) {var message = document.getElementById(id);
    if (message) {message.style.display = "none";  }});}, 3000); 
    </script>