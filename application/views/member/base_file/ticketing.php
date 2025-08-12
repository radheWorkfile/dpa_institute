<div class="row">
<div class="col-md-12"style="border:1px solid red;background-color:#ed6600;">
<!-- -----------------------------------------------------  -->
<div class="row"><div class="col-md-2"></div>
    <div class="col-md-8">
    <h2 class="text-center text-white mt-3">Ticketing Recommendations and Tips</h2>
    </div><div class="col-md-2 mt-2">
      <p class="text-center" id="askQuestion" style="color:white;border:1px solid white;padding:0.5rem 1rem;cursor: pointer!important;">Asked Question</p>
    </div>
 </div>
</div>
<!-- -----------------------------------------------------  -->
<div class="row" id="tableLIst">
    <div class="col-md-1"></div>
    <div class="col-md-10">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col text-center">SI.No</th>
      <th scope="col">Subject</th>
      <th scope="col">Asked Question</th>
      <th scope="col" class="px-4">Status</th>
      <th scope="col">&nbsp;&nbsp;Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($ticketListing as $i => $tic): ?>
    <tr>
        <td><?php echo $i + 1; ?></td> 
        <td><?php echo (mb_strlen($tic['subject']) > 20) ? mb_substr($tic['subject'], 0, 20) . '...' : $tic['subject']; ?></td>
        <td><?php echo (mb_strlen($tic['asked_question']) > 20) ? mb_substr($tic['asked_question'], 0, 20) . '...' : $tic['asked_question']; ?></td>
        <td> <a href="<?php echo base_url() . 'website/ticketing/ticClose/' . $tic['id']; ?>">&nbsp;&nbsp;&nbsp;<?php echo ($tic['status'] == 1) ?'<span class="text-success">Close</span>':'<span class="text-danger">Close</span>';?></a> </td>
        <td> <a href="<?php echo base_url() . 'website/ticketing/ticView/' . $tic['id']; ?>">&nbsp;&nbsp;&nbsp;View</a> </td>
    </tr>
<?php endforeach; ?>

  </tbody>
</table>
    </div>
    <div class="col-md-1"></div>
</div>
<!-- -----------------------------------------------------  -->
                <div class="row" id="questionTable">
                <div class="col-md-3"></div>
                <div class="col-md-6"style="box-shadow:1px 1px 11px grey;margin-top:2rem;padding:0rem 5rem;">
                <h2 class="text-center pt-5 text-color-1">&nbsp;&nbsp;Ticket Suggestion Box</h2>   
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores nesciunt soluta doloribus a vitae iste dolorem!</p>
                <form action="<?php echo base_url();?>website/ticketing/create_ticket" method="POST" enctype="multipart/form-data" class="">
                <div class="pt-3">
                <div class="d-md-flex gap-3 justify-content-between">
                <div class="w-100">
                <input type="hidden" name="ticMemId" id="ticMemId" value="<?php echo $MemberDet['id'];?>">
                <input type="text" name="subject" id="subject" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" required placeholder="Enter Name Here"
                class="bbbottom-1 py-1 px-3 w-100">
                </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                <div class="w-100 mt-4">
                <textarea name="askedQuestion" id="askedQuestion" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')" required id="" placeholder="Enter Message Here "class="messagetxttt py-1 px-3 w-100" cols="10" rows="3"></textarea>
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
                <div class="col-md-3"></div>
                </div>
</div>





