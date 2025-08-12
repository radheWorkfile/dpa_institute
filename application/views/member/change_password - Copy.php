
        <!doctype html>     <!--    style="line-height:2;"     -->      
        <html lang="en,hi">        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content>
        <meta name="author" content="DynamicLayers">
        <title>Contact Us || NGO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <?php $this->load->view('front/include/css'); ?>
        <style>
        .mainDiv {
        display: flex;
        min-height: 100%;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
        font-family: 'Open Sans', sans-serif;
        }

        .cardStyle {
        width: 500px;
        border-color: white;
        background: #fff;
        padding: 36px 0;
        border-radius: 4px;
        margin: 30px 0;
        box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
        }          #signupLogo {
        max-height: 100px;
        margin: auto;
        display: flex;
        flex-direction: column;
        }        
        .formTitle{
        font-weight: 600;
        margin-top: 20px;
        color: #2F2D3B;
        text-align: center;    
        }       
        .inputLabel {
        font-size: 12px;
        color: #555;
        margin-bottom: 6px;
        margin-top: 24px; 
        }
        .inputDiv {
        width: 70%;
        display: flex;
        flex-direction: column;
        margin: auto;
        }
        input {
        height: 40px;
        font-size: 16px;
        border-radius: 4px;
        border: none;
        border: solid 1px #ccc;
        padding: 0 11px;
        }
        input:disabled {
        cursor: not-allowed;
        border: solid 1px #eee;
        }
        .buttonWrapper {
        margin-top: 40px;
        }
        .submitButton {
            width: 70%;
            height: 40px;
            margin: auto;
            display: block;
            color: #fff;
            background-color: #065492;
            border-color: #065492;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .submitButton:disabled,
        button[disabled] {
        border: 1px solid #cccccc;
        background-color: #cccccc;
        color: #666666;
        }
        .bg-dark{ background-color: #065492;}
        .text-denger{color:red;}
        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
        .mt-2{margin-top:2rem;}
        .my-6{margin:6rem 0rem;}
        .title-heading-border{border-bottom:1px solid #e1e1e1;padding-bottom:1.5rem;}
        .mt-5{margin-top:5.5rem;}

        </style>
        </head>

        <body onLoad="generate()">
        <!-- <?//php $this->load->view('front/include/logged_header'); ?> -->
        <div class="header-height"></div>
        <!-- <div class="container-fluid p-0">
        <img src="<?//php echo base_url(); ?>front/contact/hero.jpeg" class="w-100 ComminHero" alt="">
        </div> -->
        <section class="my-6">      
             <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <img src="<?php echo base_url();?>assets/images/change_password.png" alt="" class="w-100">
                    </div>
                    <div class="col-md-6">
                    <div class="mainDiv">
        <div class="cardStyle">
        <form id="get_mem_id" method="post">              
        <h2 class="formTitle title-heading-border">Change Password </h2>
        <div class="inputDiv">
        <label class="inputLabel" for="password">Enter Old Password <span class="text-denger">*</span></label>
        <input type="password" class="mt-2" id="old_password" name="old_password" required>
        <input type="hidden" name="mem_id" id="mem_id" value="<?php echo $getIDCardDetails->id;?>">
        <input type="hidden" name="mem_password" id="mem_password" value="<?php echo $getIDCardDetails->show_password;?>">
        </div>
        <div class="inputDiv">
        <label class="inputLabel" for="password">New Password <span class="text-denger">*</span></label>
        <input type="password" class="mt-2" id="new_password" name="new_password" required>
        </div>            
        <div class="inputDiv">
        <label class="inputLabel" for="confirmPassword">Confirm Password <span class="text-denger">*</span></label>
        <input type="password"  class="mt-2" id="confirm_password" name="confirm_password">
        </div>          
        <div class="buttonWrapper">
        <button type="submit" id="submit" name="submit"  class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
        </button>
        <h4 id="message"style="text-align:center;margin-top:1rem;">&nbsp;</h4>
        </div>            
        </form>
        </div>      
        </div>      
                    </div>
                </div>
             </div>
        </section>
  
        <?php $this->load->view('front/include/footer'); ?>
        <?php $this->load->view('front/include/js'); ?>   

        </body>        
        </html>