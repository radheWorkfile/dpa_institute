<?php
  defined('BASEPATH') or exit('No direct script access allowed');
class Front_cms extends CI_Controller
{
        public function __construct()
        {
        parent::__construct();
        ($this->session->userdata('user_id') == '') ? redirect(base_url(), 'refresh') : ''; 
        $this->load->model(array('website/front_model' => 'cmsModel'));
        error_reporting(0);
        }

        public function ticketing()
        {
            $MemberDet['m_type'] = 'guest';
            $data['MemberDet'] = $MemberDet;
            $this->load->view('base_member',$data);
        }
        
        public function index($action = null,$getPara=NULL)
        {
            if($action === 'createItem')
            {
            $uploaded_image = $this->upload_image('banner', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'banner'  => $uploaded_image['text'],         
            'heading' => $this->input->post('slider_heading'), 
            'content' => $this->input->post('slider_text'),  
            'created_at' => date('Y-m-d')   
            );
            if($this->db->insert('cms_slider', $image_item)) 
            {
            $msg=array(' Thank you! Your Banner has been created successfully.');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } 
            echo json_encode($return);
            }elseif($action === 'bannerStatus'){
            $where=array('tblName'=>'cms_slider','actnUrl'=>'miStatusChange===website/front_cms/index/bannerStatus===');$this->manageStatus($where);
            }elseif($action === 'itemListing'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->cmsModel->showBannerList_data($post_data);
            foreach ($record as $row) {
            $viewUid = base_url('website/front_cms/index/viewItem/' . urlencode(base64_encode(json_encode(array('action' => 'viewDetails', 'existMember' => $row->id)))));
            $editUid = base_url('website/front_cms/index/editItem/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPermision===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
            $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/front_cms/index/bannerStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/front_cms/index/bannerStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
            $actionBtn = '<div style="text-align:center;">
            <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>
            ' . $isDel . '
             </div>';
            $image= '<span><img src="' . base_url($row->banner) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
            $shortText = (mb_strlen($row->content) > 20) ? mb_substr($row->content, 0, 20) . '...' : $row->content;
            $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
            '<div class="text-center">'.$row->heading.'</div>',
            '<div class="text-center">'.$image.'</div>',
            '<div class="text-center">'.$shortText.'</div>',
            '<div class="text-center">'.$status.'</div>',
            $actionBtn
            );
            $i++;
            }
            $return['recordsTotal'] = $this->cmsModel->banner_total_count($whereCn);
            $return['recordsFiltered'] = $this->cmsModel->banner_total_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
            }elseif ($action === 'editItem') {
            $whereCon = json_decode(base64_decode(urldecode($getPara)));
            if ($whereCon->action == 'editDetails') {
                $isSliderData = $this->common->getRowData('cms_slider', 'id', $whereCon->existMember);
            $return = array(
            'title' => 'Edit Slider',
            'breadcrums' => 'Create Slider',
            'isSliderData' => $isSliderData,
            'layout' => 'front_cms/editSlider.php',
            );
            $this->load->view('base', $return);
            }}else{
            $return = array(
            'title' => 'Manage Slider',
            'breadcrums' => 'Create Slider',
            'layout' => 'front_cms/slider.php',
            'createAction' => base_url('website/Front_cms/manage_slider'),
            'bannerItem' => base_url('website/front_cms/index/createItem'),
            'targetBanner' => base_url('website/front_cms/index/itemListing'),
            );
            $this->load->view('base', $return);
            }
        
        }

           public function updateSlider()
           {
            $uploaded_image = $this->upload_image('banner', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'banner'  => $uploaded_image['text'],         
            'heading' => $this->input->post('slider_heading'), 
            'content' => $this->input->post('slider_text'),  
            'created_at' => date('Y-m-d')   
            );
            if($this->db->where('id', $this->input->post('id'))->update('cms_slider', $image_item)) {
            $msg=array('Thank you! You have successfully updated the details.');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } 
            echo json_encode($return);
                  
           }

        public function gallery($type = null)
        {  
            if($type === 'galleryList'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->cmsModel->galleryListModel($post_data);
            foreach ($record as $row) {
            $editUid = base_url('website/front_cms/manageGalleryList/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            $isDel = '<div style="text-align:center;"> <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForGall===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a></div>';
            $actionBtn = '<div style="text-align:right;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."    ". $isDel . '</div>';
            $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/front_cms/gallery/manageGallery==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/front_cms/gallery/manageGallery==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
            $image= '<span><img src="' . base_url($row->image) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
            $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
            '<div class="text-center">'.$row->created_at.'</div>',
            '<div class="text-center">'.$image.'</div>',
            '<div class="text-center">'.$status.'</div>',
              $isDel
            );$i++;}
            $return['recordsTotal'] = $this->cmsModel->galleryList_total_count($whereCn);
            $return['recordsFiltered'] = $this->cmsModel->galleryList_total_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
            }elseif($type === 'manageGallery')
            {
            $where=array('tblName'=>'cms_gallery','actnUrl'=>'miStatusChange===website/front_cms/gallery/manageGallery===');$this->manageStatus($where);
            }elseif($type === 'galleryItem'){
            $uploaded_image = $this->upload_image('gallery', 'previewImage');
            if($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'image'  => $uploaded_image['text'],         
            'heading' => $this->input->post('user_name'), 
            'created_at' => date('Y-m-d'), 
            );
            if ($this->db->insert('cms_gallery', $image_item)){
            $msg=array(' Thank you! You have successfully created it.');
			$return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms/create_gallery'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg,'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
                $msg=array($uploaded_image['text']);
                $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } echo json_encode($return);
            }else{
            $return = array(
            'title' => 'Manage Gallery', 
            'breadcrums' => 'Create Gallery', 
            'layout' => 'front_cms/gallery.php', 
            'galleryItem' => base_url('website/Front_cms/gallery/galleryItem'),
            'targetgalleryList' => base_url('website/Front_cms/gallery/galleryList'));
             $this->load->view('base', $return);
           }
        }

        public function team_member($action = Null, $getPara = Null) 
        {
            if($action === 'teamMemList')
            {
                $post_data = $this->input->post();
                $return['data'] = array();
                $i = $post_data['start'] + 1;           
                $record = $this->cmsModel->teamMemListModel($post_data);
                foreach ($record as $row) {
                $editUid = base_url('website/front_cms/team_member/edit_team/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                //$deleteUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerTeamMemList===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                $actionBtn = '
                <div style="text-align:center;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>'."   ". $isDel . '</div>
                ';
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/front_cms/teamManStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/front_cms/teamManStatus==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $shortText = (mb_strlen($row->content) > 20) ? mb_substr($row->content, 0, 20) . '...' : $row->content;
                $image= '<span><img src="' . base_url($row->image) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
                '<div class="text-center">'.$row->heading.'</div>',
                '<div class="text-center">'.$shortText.'</div>',
                '<div class="text-center">'.$image.'</div>',
                '<div class="text-center">'.$status.'</div>',
                $actionBtn
                );
                $i++;
                }
                $return['recordsTotal'] = $this->cmsModel->teamMemList_total_count($whereCn);
                $return['recordsFiltered'] = $this->cmsModel->teamMemList_total_filter_count($post_data, $whereCn);
                $return['draw'] = $post_data['draw'];
                echo json_encode($return);
            }elseif($action == 'edit_team'){
                $whereCon = json_decode(base64_decode(urldecode($getPara)));
                if ($whereCon->action == 'editDetails') {
                $isteamMemData = $this->common->getRowData('cms_team', 'id', $whereCon->id);
                $return = array(
                'title' => 'Edit Team Member',
                'breadcrums' => 'Create Slider',
                'isteamMemData' => $isteamMemData,
                'layout' => 'front_cms/edit_team_member.php',
                );
                $this->load->view('base', $return);
            }}elseif($action === 'create_team'){
            $uploaded_image = $this->upload_image('member', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'image'  => $uploaded_image['text'],         
            'heading' => $this->input->post('slider_heading'), 
            'content' => $this->input->post('slider_text')     
            );
            $value = $this->db->insert('cms_team', $image_item);
            if($value) {
            $msg=array(' Thank you! You have successfully created it.');
			$return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms/team_member'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } echo json_encode($return);
            }else{
            $return = array(
            'title' => 'Manage Team Member',
            'breadcrums' => 'Team Member',
            'layout' => 'front_cms/team_member.php',
            'createAction' => base_url('website/front_cms/manage_news'),
            'memberItem' => base_url('website/front_cms/team_member/create_team'),
            'targetTeamMem' => base_url('website/front_cms/team_member/teamMemList'),
            );
            $this->load->view('base', $return);
            }
        }

         public function updateTeamMem()
         {
            $uploaded_image = $this->upload_image('member', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'image'  => $uploaded_image['text'],         
            'heading' => $this->input->post('headingText'), 
            'content' => $this->input->post('content'),  
            );
            if($this->db->where('id', $this->input->post('id'))->update('cms_team', $image_item)) {
            $msg=array(' Thank You! you have successfully upload details');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms/team_member'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } 
            echo json_encode($return);
         }
       

        public function events($type = null, $getPara = Null)
        {
            if($type === 'eventList'){
                $post_data = $this->input->post();
                $return['data'] = array();
                $i = $post_data['start'] + 1;           
                $record = $this->cmsModel->eventListModel($post_data);
                foreach ($record as $row) {
                $editUid = base_url('website/front_cms/manage_events/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'id' => $row->id)))));
                $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/front_cms/manageEvent==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/front_cms/manageEvent==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
                $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForEvent===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete"><i class="fa fa-trash"></i></a>';
                $actionBtn = '<div style="text-align:center;"> <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit"><i class="fas fa-pencil-alt"></i></a>' ."   ".$isDel . '</div>';
                $shortText = (mb_strlen($row->e_text) > 20) ? mb_substr($row->e_text, 0, 20) . '...' : $row->e_text;
                $image= '<span><img src="' . base_url($row->e_images) . '" alt="" class="imageView" style="height:2rem; border:1px solid #f2a6a6; border-radius:10%;"></span>';
                $return['data'][] = array('<div class="text-center"><strong>' . $i . '.</strong></div>',
                '<div class="text-center">'.$row->e_heading.'</div>',
                '<div class="text-center">'.$shortText.'</div>',
                '<div class="text-center">'.$image.'</div>',
                '<div class="text-center">'.$status.'</div>',
                $actionBtn
                );
                $i++;
                }
                $return['recordsTotal'] = $this->cmsModel->eventList_total_count($whereCn);
                $return['recordsFiltered'] = $this->cmsModel->eventList_total_filter_count($post_data, $whereCn);
                $return['draw'] = $post_data['draw'];
                echo json_encode($return);
            }elseif($type === 'eventItem'){
            $uploaded_image = $this->upload_image('event', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'e_images'  => $uploaded_image['text'],         
            'e_heading' => $this->input->post('slider_heading'), 
            'e_text' => $this->input->post('slider_text')     
            );
            if($this->db->insert('cms_event', $image_item)) 
             {
               $msg=array('Thank you! You have successfully created it.');
               $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                           'returnLoc'=>base_url('website/front_cms/events'));
             } else {
              $msg=array('Oops it seems error.please refresh you page.');
              $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                            'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
             }
             } else {
               $msg=array($uploaded_image['text']);
               $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                             'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
             } 
            echo json_encode($return);
           }elseif($getPara === ''){

           }else{
           $return = array(
            // website/front_cms/create_event'
           'title' => 'Create Events', 
           'breadcrums' => 'Create Events', 
           'layout' => 'front_cms/event.php', 
           'eventItem' => base_url('website/Front_cms/events/eventItem'),
           'targeteventList' => base_url('website/front_cms/events/eventList'),
           );
           $this->load->view('base', $return);
           }
        }


        public function news($type = null)
        {
            if($type === 'newsList'){
            $post_data = $this->input->post();
            $return['data'] = array();
            $i = $post_data['start'] + 1;           
            $record = $this->cmsModel->news_data($post_data);
            foreach ($record as $row) {
              $editUid = base_url('website/front_cms/manage/' . urlencode(base64_encode(json_encode(array('action' => 'editDetails', 'existMember' => $row->id)))));
            // $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/accPerForNews===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete News"><i class="fa fa-trash"></i></a>';
            //   $isDel = '<a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp getAction" id="delAr--' . $row->id . '" data-id="viewDelete===website/front_cms/===' . $row->id . '" data-bs-toggle="modal" data-bs-target="#deletePanel" title="Delete News"><i class="fa fa-trash"></i></a>';
            $actionBtn = '<div style="text-align:center; display:flex; justify-content:center; gap:10px;">
             <a href="' . $editUid . '" class="btn btn-primary shadow btn-xs sharp" title="Edit News">
                <i class="fas fa-pen"></i>
             </a>' . $isDel . '
             </div>';
              $status=($row->status==1)?'<a class="badge bg-success getAction miLvs" href="javascript:void(0)" data-id="miStatusView===website/front_cms/manageNews==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to De-Active " id="arvs--'.$row->id.'">Active</a>':'<a href="javascript:void()" data-id="miStatusView===website/front_cms/manageNews==='.$row->id.'" data-bs-toggle="modal" data-bs-target="#statusChange" title="Click to Active" class="badge bg-danger getAction" id="arvs--'.$row->id.'">Deactive</a>';
              $shortText = (mb_strlen($row->news) > 20) ? mb_substr($row->news, 0, 30) . '...' : $row->news;
              $return['data'][] = array(
              '<div class="text-center"><strong>' . $i . '.</strong></div>',
              '<div class="text-center">'.$row->updated_at.'</div>',
              '<div class="text-center">'.$row->news_heading.'</div>',
              '<div class="text-center">'.$shortText.'</div>',
              '<div class="text-center">'.$status.'</div>',
              $actionBtn
              );
              $i++;
              }
              $return['recordsTotal'] = $this->cmsModel->total_count($whereCn);
              $return['recordsFiltered'] = $this->cmsModel->total_filter_count($post_data, $whereCn);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
            }elseif($type === 'createNews'){
            $data = $this->input->post();
            $data = $this->input->post();
            $this->form_validation->set_rules('news_heading', 'News Heading', 'required|trim');
            $this->form_validation->set_rules('news', 'News', 'required|trim');
            if ($this->form_validation->run() == TRUE) {
            $news_data = array(
                'news_heading' => $data['news_heading'],
                'news' => $data['news'],
                'status' => 2, 
            );
           if($this->db->where('id','1')->update('cms_news', $news_data))
           {
           $msg=array('Thank you! You have successfully created it.');
           $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>',
                       'returnLoc'=>base_url('website/front_cms/news'));
           } else {
           $msg=array('Oops it seems error.please refresh you page.');
           $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
         }
         } else {
           $msg=array( 'news_heading' => form_error('news_heading'), 'news' => form_error('news'),);
           $return=array('addClas' => 'tWarning', 'msg' => $msg, 
                         'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
         } 
        echo json_encode($return);
        }else{
        $return = array(
        'title' => 'Manage News',
        'breadcrums' => 'Create News',
        'layout' => 'front_cms/news.php',
        'createAction' => base_url('website/front_cms/news/createNews'),
        'targetNews' => base_url('website/front_cms/news/newsList'),
        );
        $this->load->view('base', $return);

        } 
     }
   


     
     function upload_image($path, $name)
     {
             $config['upload_path']   = './uploads/' . $path; 
             $config['allowed_types'] = 'jpg|png|jpeg';      
             $config['max_size']      = 2048;               
             $this->load->library('upload', $config);
             if ($this->upload->do_upload($name)) {
             $upload_data = $this->upload->data();
             $image_path = "uploads/" . $path . '/' . $upload_data['file_name'];
             return array('text' => $image_path, 'icon' => 'success');
            } else {
                return array('text' => $this->upload->display_errors(), 'icon' => 'error');
            }
        }
        
// ======================================== function end to view Section ============================= 

            public function update_news(){
                $data = $this->input->post();
                $news_data = array(
                    'news_heading' => $data['news_heading'],
                    'news' => $data['news'],
                    'status' => 1, 
                );
                if ($this->db->where('id', 1)->update('cms_news', $news_data)) {
                    $msg = array('Thank You! You have successfully updated the details.');
                    $data = array(
                        'addClas' => 'tSuccess',
                        'msg' => $msg,
                        'icon' => '<i class="fa-regular fa-circle-check"></i>',
                        'returnLoc' => base_url('website/front_cms/news') 
                    );
                } else {
                    $msg = array('Oops, it seems there was an error. Please refresh your page.');
                    $data = array(
                        'addClas' => 'tWarning',
                        'msg' => $msg,
                        'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>'
                    );
                }
                echo json_encode($data);
            }

    public function manage($actn = NULL)
    {
        $whereCon = json_decode(base64_decode(urldecode($actn)));
        $data = $this->db->select('*')->from('cms_news')->get()->row();
        if ($whereCon->action == 'editDetails') {
        $isMember = $this->common->getRowData('cms_news', 'id', $whereCon->existMember);
        $return = array(
        'title' => 'Edit News',
        'breadcrums' => 'Edit News',
        'layout' => 'front_cms/edit_news.php',
        'actnOper' => $isMember->id,
        'isMember' => $isMember,
        'createAction' => base_url('front_cms/manage/edit_news' . urlencode(base64_encode(json_encode(array('action' => 'updateDetails', 'existMember' => $whereCon->existMember))))),
        'targetItem' => base_url('front_cms/manage/update_data/' . urlencode(base64_encode(json_encode(array('action' => 'updateDetails', 'existMember' => $whereCon->existMember))))),
        'arvActionTrgt' => base_url('front_cms/edit_news')
        );
        $this->load->view('base', $return);
        } else if ($whereCon->action == 'viewDetails') {
        $mem_id = json_decode(base64_decode(urldecode($actn)));
        $isMember = $this->common->getRowData('cms_news', 'id', $mem_id->existMember);
        $return = array(
        'layout' => 'front_cms/edit_news.php',
        'manageNews' => $data,
        'actnOper' => $isMember->id,
        'isMember' => $isMember
        );
        $this->load->view('base', $return);
        } else if ($whereCon->action == 'updateDetails') {
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
            $this->form_validation->set_rules('frstName', 'Date of Birth', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|xss_clean|valid_email|is_unique[staff.email]');
            $this->form_validation->set_rules('mobileNu', 'Mobile No.', 'trim|required|xss_clean|numeric|max_length[10]');
            $this->form_validation->set_rules('empRole', 'Role', 'trim|required|xss_clean');
            $this->form_validation->set_rules('empPassword', 'Password', 'trim|required|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $getRole = array('1' => 'statewise', '2' => 'districtwise', '3' => 'blockwise', '4' => 'panchayatwise', '5' => 'villagewise');
                $empLoc = $getRole[$post['empRole']];
                $post = $this->input->post();
                $insertArr = array(
                'user_role' => $post['empRole'],
                'first_name' => $post['frstName'],
                'last_name' => $post['lastName'],
                'gender' => $post['gender'],
                'email_id' => $post['email_id'],
                'mobile_number' => $post['mobileNu'],
                'state_id' => $post['inputState'],
                'district_id' => $post['inputDistrict'],
                'block_id' => $post['inputBlock'],
                'panchayat_id' => $post['inputPanchayat'],
                'village_id' => $post['inputVillage'],
                'address' => $post['membrAddr'],
                'show_password' => $post['empPassword'],
                'password' => md5($post['empPassword']),
                'modified_by' => $this->logID,
                'modified_type' => $this->lgCat,
                'modified_date' => date('Y-m-d H:i:s')
                );
                if ($this->common->update_data('cordinator_manage', array('id' => $post['actnOper']), $insertArr)) {
                $msg = array(' Thank You! you have successfully update details');
                $data = array('addClas' => 'tSuccess', 'msg' => $msg, 'icon' => '<i class="fa-regular fa-circle-check"></i>', 'returnLoc' => base_url('website/front_cms/news'));
                } else {
                $msg = array('Oops it seems error.please refresh you page.');
                $data = array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
                }
                } else {
                $msg = array('gender' => form_error('gender'), 'frstName' => form_error('frstName'), 'email_id' => form_error('email_id'), 'mobileNu' => form_error('mobileNu'), 'empRole' => form_error('empRole'), 'empPassword' => form_error('empPassword'));
                $data = array('addClas' => 'tst_danger', 'msg' => $msg, 'icon' => '<i class="pe-7s-sun bx-spin"></i>');
                }
                echo json_encode($data);
           }
         }

       


         public function accPermision()
         {
             $this->accPermissionUnified();
             $id = $this->input->post('id');
             $bannnerId = $this->db->select('*')->from('cms_slider')->where('id', $id)->get()->row();
             if (!empty($bannnerId)) {
                 $imagePath = 'uploads/banner/' . $bannnerId->banner;
                 if (file_exists($imagePath)) {
                     unlink($imagePath);
                 }
             } 
         }

         

         public function accPerForEvent(){$this->accPermissionUnified();}
         public function accPerForNews(){$this->accPermissionUnified();}
         public function accPerForGall(){$this->accPermissionUnified();}
         public function accPerTeamMemList(){$this->accPermissionUnified();}

         public function accPermissionUnified(){
             $post = $this->input->post();
             $return = '';
             $imageMap = ['cms_slider' => ['field' => 'banner'],'cms_event' => ['field' => 'e_images'],'cms_gallery' => [ 'field' => 'image'],'cms_team' => ['field' => 'image']];
             foreach ($imageMap as $table => $data) {
             $bannnerId = $this->db->select('*')->from($table)->where('id', $post['id'])->get()->row();
             if (!empty($bannnerId)) {$imagePath = $data['folder'] . $bannnerId->{$data['field']};
             if (file_exists($imagePath)) {unlink($imagePath);}}}
             $tableMap = [
                 'cms_slider' => 'accPermision',
                 'cms_event' => 'accPerForEvent',
                 'cms_news' => 'accPerForNews',
                 'cms_gallery' => 'accPerForGall',
                 'cms_team' => 'accPerTeamMemList'
             ];
             $tableName = array_search($this->router->fetch_method(), $tableMap); 
             if (!$tableName) {
                 $return = ['msg' => "Invalid operation.", 'action' => '', 'tClor' => '#db3704'];echo json_encode($return);return;
             } if ($post['oprType'] == 'viewDelete') {
                 $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
                 if ($isMember) {
                     $return = [
                     'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Do you wish to delete <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> ?. ',
                     'action' => 'cnfDeleteDetail===website/front_cms/' . $this->router->fetch_method() . '===' . $isMember->id,
                     'tClor' => '#db3704'];
                 } else {
                     $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
                 } } else if ($post['oprType'] == 'cnfDeleteDetail') {
                 $isMember = $this->common->getRowData($tableName, 'id', $post['id']);
                 if ($isMember) {
                     $deltResult = $this->common->del_data_multi_con($tableName, ['id' => $post['id']]);
                     if ($deltResult) {
                         $return = [
                             'msg' => '<i class="fa-regular fa-circle-check"></i> Data deletion completed.<br>
                             <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span> has been removed.',
                             'action' => 'success','tClor' => '#008038'
                         ];} else {
                        $return = [
                             'msg' => '<i class="fa-solid fa-circle-exclamation"></i> Deletion failed for <span style="font-weight:900;">' . $isMember->heading . ' (ID #' . $isMember->id . ') </span>.<br>
                             Please check the details and try again.',
                             'action' => 'errorShw',
                             'tClor' => '#db3704'
                         ];} } else {
                        $return = ['msg' => "Sorry, we couldn't retrieve the data at this time.", 'action' => '', 'tClor' => '#db3704'];
                    }} else {
                    $return = ['msg' => "Invalid operation type.", 'action' => '', 'tClor' => '#db3704'];
                  } sleep(1); echo json_encode($return);
         }
         


   public function manageNews(){$where=array('tblName'=>'cms_news','actnUrl'=>'miStatusChange===website/front_cms/manageNews===');$this->manageStatus($where);}
   public function manageEvent(){$where=array('tblName'=>'cms_event','actnUrl'=>'miStatusChange===website/front_cms/manageEvent===');$this->manageStatus($where);}
   public function teamManStatus(){$where=array('tblName'=>'cms_team','actnUrl'=>'miStatusChange===website/front_cms/teamManStatus===');$this->manageStatus($where);}


   public function manageStatus($where){
   $post=$this->input->post();
   if($post['oprType']=='miStatusView')
   {$getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
    if($getData){
    if($getData->status=='Active'){	
    $msg=array(
    'msg'=>'<i class="si si-power"></i> Are you sure want to deactivate '.$getData->shift_name.' of ID #'.$getData->id,
    'action'=>$where['actnUrl'].$getData->id);
    }else{
    $msg=array(
   'msg'=>'Are you sure want to activate '.$getData->cms_volunteer.' of ID #'.$getData->id,
   'action'=>$where['actnUrl'].$getData->id)
   ;}}else{
   $msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong</span>');
   }echo json_encode($msg);}
   elseif($post['oprType']=='miStatusChange')
   {sleep(2);
   $getData=$this->common->getRowData($where['tblName'],'id',$post['id']);
   if($getData->status==1){
   $change='2';$msg=array('msg'=>'<span class="text-success"><i class="si si-power"></i> You have successfully deactivate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Deactive','btnAdCls'=>'bg-danger ','btnRmvCls'=>'bg-success miLvs');
   }else{
   $change='1';$msg=array('msg'=>'<span class="text-success">You have successfully activate '.$getData->shift_name.' of ID #'.$getData->id.'</span>','btnTxt'=>'Active','btnAdCls'=>'bg-success miLvs','btnRmvCls'=>'bg-danger');}
   $changeArr=array('status'=>$change);
   $result=$this->common->update_data($where['tblName'],array('id'=>$post['id']),$changeArr);
   if($result){$msg=$msg;}else{$msg=array('msg'=>'<span class="text-danger">Oops it seems something went wrong while updating.</span>');}
   echo json_encode($msg);
   }
   }
   

	public function manage_events($actn = NULL)
	{
		$whereCon = json_decode(base64_decode(urldecode($actn)));
		if($whereCon->action=='editDetails')
		{
			$isEventData = $this->common->getRowData('cms_event', 'id', $whereCon->id);
			$return = array(
			'title' => 'Edit Events',
			'breadcrums' => 'Edit Events',
			'layout' => 'front_cms/edit_event.php', 
			'isEventData' => $isEventData,
			);
			$this->load->view('base', $return);
			}
		}

        public function update_event()
        {
            $uploaded_image = $this->upload_image('event', 'previewImage');
            if ($uploaded_image['icon'] === 'success') {
            $image_item = array(
            'e_images'  => $uploaded_image['text'],         
            'e_heading' => $this->input->post('slider_heading'), 
            'e_text' => $this->input->post('slider_text'),   
            'created_at' => date('Y-m-d'),   
            );
            $this->db->where('id', $this->input->post('id'))->update('cms_event', $image_item);
            if($this->db->where('id', $this->input->post('id'))->update('cms_event', $image_item)) {
            $msg=array('Thank you! You have successfully updated the details.');
            $return=array('addClas'=>'tSuccess','msg'=>$msg,'icon'=>'<i class="fa-regular fa-circle-check"></i>','returnLoc'=>base_url('website/front_cms/events'));
            } else {
            $msg=array('Oops it seems error.please refresh you page.');
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            }} else {
            $msg=array($uploaded_image['text']);
            $return=array('addClas' => 'tWarning', 'msg' => $msg, 'icon' => '<i class="fa-solid fa-circle-exclamation me-2"></i>');
            } 
            echo json_encode($return);
        }
    


} 