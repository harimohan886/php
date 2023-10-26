<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Tour_dealer extends CI_Controller {
    private $selectedlanguage;
   
    public function __construct() {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->load->helper('login_helper');
            $this->load->library('javascript');
            $this->load->library('form_validation');
            $this->load->model("tour_dealer_model");
            $this->load->model('World_wide_model');
            $this->load->library('email');
            $this->load->library('session');
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->helper(array('form', 'url'));
            //MY_Output's disable_cache() method
            $this->output->disable_cache();
        
            if ($_SERVER['HTTP_HOST'] == "localhost") {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
            }
            else {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
            }

            $database_name = switch_db_dinamico();
            if($database_name == "db_ar") {
                $this->lang->load('locale', 'arabic');
                $language = "ar";
            } 
            else {
                $this->lang->load('locale', 'english');
                $language = "en";
            }
            $this->selectedlanguage = $language;
    }

    public function index() {
            if (_is_user_login($this)) {
                redirect('tour_dealer/tour_dealer_approve_list');
            } 
            else {
                redirect('login');
            }
    }

    public function tour_dealer_approve_list() {
            if (_is_user_login($this)) {
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Tour Dealer Approve";
                $data['page'] = "Tour Dealer Approve";
                $data['action'] = "List";
           
                $admin_id = $this->session->userdata('admin_id');
                $role = $this->session->userdata('role');

                if($role == 1 && $admin_id >= 1) {
                    $data["approve_records"] = $this->tour_dealer_model->get_approve_tour_dealer_list();
                    $this->load->view('admin/tour_dealer/approve_list', $data);
                } 
                else {
                    redirect('login');
                }
            } 
            else {
                redirect('login');
            }
    }

    public function tour_dealer_reject_list() {
            if (_is_user_login($this)) {
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Tour Dealer Reject";
                $data['page'] = "Tour Dealer Reject";
                $data['action'] = "List";
               
                $admin_id = $this->session->userdata('admin_id');
                $role =  $this->session->userdata('role');
                if($role == 1 && $admin_id >= 1) {
                    $data["reject_records"] = $this->tour_dealer_model->get_reject_tour_dealer_list();
                    $this->load->view('admin/tour_dealer/reject_list', $data);
                } 
                else {
                    redirect('login');
                }
            } 
            else {
                redirect('login');
            }
    }

    public function tour_dealer_pending_list() {
            if (_is_user_login($this)) {
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Tour Dealer Pending";
                $data['page'] = "Tour Dealer Pending";
                $data['action'] = "List";
               
                $admin_id = $this->session->userdata('admin_id');
                $role =  $this->session->userdata('role');
                if($role == 1 && $admin_id >= 1) {
                    $data["pending_records"] = $this->tour_dealer_model->get_pending_tour_dealer_list();
                    $this->load->view('admin/tour_dealer/pending_list', $data);
                } 
                else {
                    redirect('login');
                }
            } 
            else {
                redirect('login');
            }
    }

    public function tour_dealer_approve($id) {
            if (_is_user_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data['admin'] = "Admin";
                $data['page'] = "Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['action'] = "Edit";

                $admin_id = $this->session->userdata('admin_id');
                $role = $this->session->userdata('role');

                if($role == 1 && $admin_id >= 1) {
                    $ddata=array();
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $ddata['status'] = '1';
                    $ddata['is_deactivate_account'] = '1';
                    $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Approved successfully.
                            </div>');
                    redirect("tour_dealer/tour_dealer_approve_list");
                    exit;
                } 
                else {
                    redirect('login');
                } 
            }
    }

    public function tour_dealer_pending($id) {
            if (_is_user_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data['admin'] = "Admin";
                $data['page'] = "Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['action'] = "Edit";

                $admin_id = $this->session->userdata('admin_id');
                $role = $this->session->userdata('role');

                if($role == 1 && $admin_id >= 1) {
                    $ddata=array();
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $ddata['status'] = '0';
                    $ddata['is_deactivate_account'] = '1';
                
                    $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Pending successfully.
                            </div>');
                    redirect("tour_dealer/tour_dealer_pending_list");
                    exit;
                } 
                else {
                    redirect('login');
                } 
            }
    }

    public function tour_dealer_reject($id) {
            if (_is_user_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Admin Tour Dealer";
                $data['admin'] = "Admin";
                $data['page'] = "Tour Dealer";
                $data["title"] = PROJECT_NAME;
                $data['action'] = "Edit";

                $admin_id = $this->session->userdata('admin_id');
                $role =  $this->session->userdata('role');

                if($role == 1 && $admin_id >= 1) {
                    $ddata=array();
                    $this->load->model("common_model");
                    $ddata['updated_at'] = date('Y-m-d H:i:s');
                    $ddata['is_deactivate_account'] = '0';
                
                    $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                    $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Reject successfully.
                            </div>');
                    redirect("tour_dealer/tour_dealer_reject_list");
                    exit;
                } 
                else {
                    redirect('login');
                } 
            }
    }

    public function tour_package_list(){
            if(_is_dealer_login($this))  {
                $data['action'] = "Tour List";
                $data['page'] = "Tour List";
                $data['title'] = "Tour";
                $dealerid=$this->session->userdata('dealer_id');
                $data['tourdata']=$this->tour_dealer_model->get_tourlist_by_dealer_id($dealerid);
                $this->load->view("dealer/tourpackages/list",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function tour_package_add(){
            if(_is_dealer_login($this)) {   
                $dealerid=$this->session->userdata('dealer_id');
                $data['action'] = "Tour Add";
                $data['page'] = "Tour Add";
                $data['title'] = "Tour";
                $data['language']=$this->get_language();
                $data['tour_include']=$this->tour_dealer_model->get_includelist_by_dealer_id($dealerid);
                $data["country"]=$this->World_wide_model->fetch_country();

                if(isset($_REQUEST['save_button']) && $_REQUEST['save_button']=="Save"){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');
                    $this->form_validation->set_rules('regular_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('sale_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('child_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('avability', 'Avability', 'trim|required');
                    $this->form_validation->set_rules('description', 'description', 'trim|required');
                    $this->form_validation->set_rules('endtdate', 'endtdate', 'trim|required');
                    $this->form_validation->set_rules('startdate', 'startdate', 'trim|required');
                    $this->form_validation->set_rules('duration', 'duration', 'trim|required');
                    $this->form_validation->set_rules('language_id', 'Language', 'trim|required');

                    $this->form_validation->set_rules('address', 'Location', 'trim|required');
                    $this->form_validation->set_rules('country', 'Country', 'trim|required');
                    $this->form_validation->set_rules('state', 'State', 'trim|required');
                    $this->form_validation->set_rules('city', 'City', 'trim|required');
                
                    if ($this->form_validation->run() == FALSE)  {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $inserarray=array();
                        $inserarray['name']=isset($_POST["name"]) ? $_POST["name"]:""; 
                        $inserarray['slug']=url_title(strtolower($inserarray['name']));
                        $inserarray['language_id']=isset($_POST["language_id"]) ? $_POST["language_id"]:""; 
                        $inserarray['start_date']=isset($_POST["startdate"]) ? $_POST["startdate"]:""; 
                        $inserarray['end_date']=isset($_POST["endtdate"]) ? $_POST["endtdate"]:""; 
                        $inserarray['regular_price']=isset($_POST["regular_price"]) ? $_POST["regular_price"]:""; 
                        $inserarray['sale_price']=isset($_POST["sale_price"]) ? $_POST["sale_price"]:"";
                        $inserarray['child_price']=isset($_POST["child_price"]) ? $_POST["child_price"]:"";
                        $inserarray['description']=isset($_POST["description"]) ? $_POST["description"]:"";
                        $inserarray['duration']=isset($_POST["duration"]) ? $_POST["duration"]:"";
                        $inserarray['avability']=isset($_POST["avability"]) ? $_POST["avability"]:"";
                    
                        $inserarray['address']=isset($_POST["address"]) ? $_POST["address"]:"";
                        $inserarray['country_id']=isset($_POST["country"]) ? $_POST["country"]:"";
                        $inserarray['state_id']=isset($_POST["state"]) ? $_POST["state"]:"";
                        $inserarray['city_id']=isset($_POST["city"]) ? $_POST["city"]:"";

                        if ($_FILES["banner"]["size"] > 0) {
                            $config['upload_path'] = './uploads/banner/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["banner"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('tour_banner_images_path');
                            $file_name = $this->file_upload($_FILES["banner"], $uploadpath);
                            $inserarray['tour_banner_image'] = $file_name;   
                        }
                    
                        $include=isset($_POST["included"]) ? $_POST["included"]:"";
                        if(!empty($include)){
                            $inserarray['included']=implode(',',$include);
                        }
                    
                        $inserarray['created_at']=date('Y-m-d H:i:s');
                        $inserarray['vendor_id']=$dealerid;
                        $this->load->model("common_model");
                        $insertid=$this->common_model->data_insert('tbl_tour',$inserarray);
                    
                        if(!empty($insertid)){
                            $path=$this->config->item('tour_overview_images_profile');
                            $placename = $_POST['placename'];
                            $desc = $_POST['placedesc'];
                            $count=count($placename);
                        
                            if($count > 0){
                                for($i=0; $i<$count; $i++){
                                    $place=$placename[$i];
                                    $placedesc=$desc[$i];
                                    $image=array();
                                    $image['name']=$_FILES['placeimage']['name'][$i];
                                    $image['type']=$_FILES['placeimage']['type'][$i];
                                    $image['tmp_name']=$_FILES['placeimage']['tmp_name'][$i];
                                    $image['error']=$_FILES['placeimage']['error'][$i];
                                    $image['size']=$_FILES['placeimage']['size'][$i];
                                    $imagename=$this->file_upload($image,$path);
                                    $overview=array(
                                                    'tour_id'=>$insertid,
                                                    'placename'=>$place,
                                                    'placedesc'=>$placedesc,
                                                    'image'=>$imagename,
                                                    'created_at'=>date('Y-m-d H:i:s'),
                                                );
                                    $this->common_model->data_insert('tbl_tour_overview',$overview);
                                }
                            }
                        }

                        for ($i=0; $i<count($_FILES["gallery"]["name"]); $i++) { 
                            if ($_FILES["gallery"]["size"][$i] > 0) {
                                $idatad['name'] = $_FILES["gallery"]["name"][$i];
                                $idatad['type'] = $_FILES["gallery"]["type"][$i];
                                $idatad['tmp_name'] = $_FILES["gallery"]["tmp_name"][$i];
                                $idatad['error'] = $_FILES["gallery"]["error"][$i];
                                $idatad['size'] = $_FILES["gallery"]["size"][$i];
                                $config['upload_path'] = './uploads/tours/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["gallery"]["name"][$i]);
                                $newfilename = time() . '.' . end($temp);
                                $uploadpath = $this->config->item('tour_gallery_images_profile');
                                $file_name = $this->file_upload($idatad, $uploadpath);
                                $idata['tour_id'] = $insertid;
                                $idata['image'] = $file_name; 
                                $idata['created_at'] = date('Y-m-d h:i:s');  
                                $this->common_model->data_insert("tour_gallery", $idata); 
                            }   
                        }                    
                        $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong>  Tour add successful</div>');
                        redirect('tour_dealer/tour_package_list');
                    }
                }
                $this->load->view("dealer/tourpackages/add",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function tour_include_list(){
            if(_is_dealer_login($this)) {   
                $dealerid=$this->session->userdata('dealer_id');
                $data['action'] = "Tour Add";
                $data['page'] = "Tour Add";
                $data['title'] = "Tour";
                $data['tour_include']=$this->tour_dealer_model->get_includelist_by_dealer_id($dealerid);
                $this->load->view("dealer/tourpackages/includelist",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function tour_include_add() {
            if(_is_dealer_login($this))  {   
                $dealerid=$this->session->userdata('dealer_id');
                $data['action'] = "Tour Include Add";
                $data['page'] = "Tour Include Add";
                $data['title'] = "Tour Include Add";
                $data['language']=$this->get_language();
            
                if(isset($_REQUEST['save_button']) && $_REQUEST['save_button']=="Save") {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');
                
                    if ($this->form_validation->run() == FALSE) {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $status=isset($_POST["status"]) ? $_POST["status"]:"";
                        if($status=="on"){
                            $status="1";
                        } 
                        else {
                            $status="0";
                        }
                    
                        $insert=array(
                                    "language_id"=> $_POST["language_id"],
                                    "dealer_id"=> $dealerid,
                                    "name"=> $_POST["name"],
                                    "status"=> $status,
                                    "created_at"=> date("Y-m-d H:i:s"),
                                    "updated_at"=> NULL,
                                );
                        $this->load->model("common_model");
                        $insertid=$this->common_model->data_insert('tbl_tour_include',$insert);

                        if($insertid){
                            redirect("Tour_dealer/tour_include_list");
                        }
                    }
                }
                $this->load->view("dealer/tourpackages/includeadd",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function get_language(){
            $query="SELECT * FROM `tbl_language` ORDER BY language ASC";
            $data=$this->db->query($query)->result();
            return $data;
    }

    public function tour_include_edit($id){
            if(_is_dealer_login($this)) {  
                $data['action'] = "Tour Include Edit";
                $data['page'] = "Tour Include Edit";
                $data['title'] = "Tour Include Edit";
                $data['language']=$this->get_language();
                $data['includedata']=$this->tour_dealer_model->get_includelistby_id($id);
            
                if(isset($_REQUEST['save_button']) && $_REQUEST['save_button']=="Update"){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');
                
                    if ($this->form_validation->run() == FALSE) {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $status=isset($_POST["status"]) ? $_POST["status"]:"";
                        if($status=="on"){
                            $status="1";
                        } 
                        else {
                            $status="0";
                        }
                        $insert=array(
                                        "language_id"=> $_POST["language_id"],
                                        "name"=> $_POST["name"],
                                        "status"=> $status,
                                        "updated_at"=> date("Y-m-d H:i:s"),
                                );
                        $this->load->model("common_model");
                        $insertid=$this->common_model->data_update('tbl_tour_include',$insert,array("id"=>$id));
                        if($insertid){
                            redirect("Tour_dealer/tour_include_list");
                        }
                    }
                }
                $this->load->view("dealer/tourpackages/includeedit",$data);
            }
            else {
                redirect('dealers-login');
            }
    }

    private function file_upload($arr, $path) {
            set_time_limit(0);
            if ($arr['error'] == 0) {
                $temp = explode(".", $arr["name"]);
                $random_number = uniqid().time();
                $file_name = $random_number.'.' . end($temp);
                $file_path = $path . $file_name;
                if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                    return $file_name;
                }
                else {
                    return $ret = "";
                }
            } 
            else{
                return $ret="";
            }        
    }

    public function tour_package_edit($id){
            if(_is_dealer_login($this)) {   
                $dealerid=$this->session->userdata('dealer_id');
                $data['action'] = "Tour Edit";
                $data['page'] = "Tour edit";
                $data['title'] = "Tour";
                $data['language']=$this->get_language();
                $data['tour_include']=$this->tour_dealer_model->get_includelist_by_dealer_id($dealerid);
                $data['tour_package_single']=$this->tour_dealer_model->get_single_tour_by_tour_id($id);
                $data['tour_overview']=$this->tour_dealer_model->tour_overview_by_tourid($id);
                $data['tour_gallery']=$this->tour_dealer_model->tour_gallery_by_tourid($id);
                $data["country"]=$this->World_wide_model->fetch_country();
                $data["state"]=$this->World_wide_model->fetch_state($data['tour_package_single']->country_id);
                $data["city"]=$this->World_wide_model->fetch_city($data['tour_package_single']->state_id);

                if(isset($_REQUEST['save_button']) && $_REQUEST['save_button']=="Save"){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');
                    $this->form_validation->set_rules('regular_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('sale_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('child_price', 'Price', 'trim|required');
                    $this->form_validation->set_rules('avability', 'Avability', 'trim|required');
                    $this->form_validation->set_rules('description', 'description', 'trim|required');
                    $this->form_validation->set_rules('endtdate', 'endtdate', 'trim|required');
                    $this->form_validation->set_rules('startdate', 'startdate', 'trim|required');
                    $this->form_validation->set_rules('duration', 'duration', 'trim|required');
                    $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
                    $this->form_validation->set_rules('address', 'Location', 'trim|required');
                    $this->form_validation->set_rules('country', 'Country', 'trim|required');
                    $this->form_validation->set_rules('state', 'State', 'trim|required');
                    $this->form_validation->set_rules('city', 'City', 'trim|required');
                    
                    if ($this->form_validation->run() == FALSE)  {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $inserarray=array();
                        $inserarray['name']=isset($_POST["name"]) ? $_POST["name"]:""; 
                        $inserarray['slug']=url_title(strtolower($inserarray['name']));
                        $inserarray['language_id']=isset($_POST["language_id"]) ? $_POST["language_id"]:""; 
                        $inserarray['start_date']=isset($_POST["startdate"]) ? $_POST["startdate"]:""; 
                        $inserarray['end_date']=isset($_POST["endtdate"]) ? $_POST["endtdate"]:""; 
                        $inserarray['regular_price']=isset($_POST["regular_price"]) ? $_POST["regular_price"]:""; 
                        
                        $inserarray['sale_price']=isset($_POST["sale_price"]) ? $_POST["sale_price"]:"";
                        $inserarray['child_price']=isset($_POST["child_price"]) ? $_POST["child_price"]:"";
                        $inserarray['duration']=isset($_POST["duration"]) ? $_POST["duration"]:"";
                        $inserarray['avability']=isset($_POST["avability"]) ? $_POST["avability"]:"";
                        $inserarray['description']=isset($_POST["description"]) ? $_POST["description"]:"";

                        $inserarray['address']=isset($_POST["address"]) ? $_POST["address"]:"";
                        $inserarray['country_id']=isset($_POST["country"]) ? $_POST["country"]:"";
                        $inserarray['state_id']=isset($_POST["state"]) ? $_POST["state"]:"";
                        $inserarray['city_id']=isset($_POST["city"]) ? $_POST["city"]:"";

                        if ($_FILES["banner"]["size"] > 0) {
                            $config['upload_path'] = './uploads/banner/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                            $this->upload->initialize($config);
                            $this->load->library('upload', $config);
                            $temp = explode(".", $_FILES["banner"]["name"]);
                            $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                            $uploadpath = $this->config->item('tour_banner_images_path');
                            $file_name = $this->file_upload($_FILES["banner"], $uploadpath);
                            $inserarray['tour_banner_image'] = $file_name;   
                        }
                        $include=isset($_POST["included"]) ? $_POST["included"]:"";
                    
                        if(!empty($include)){
                            $inserarray['included']=implode(',',$include);
                        }
                    
                        $inserarray['updated_at']=date('Y-m-d H:i:s');
                        $inserarray['vendor_id']=$dealerid;
                        $this->load->model("common_model");
                        $insertid=$this->common_model->data_update('tbl_tour',$inserarray,array('id'=>$id));

                        if(!empty($insertid)) {
                            $path=$this->config->item('tour_overview_images_profile');
                            $placename = $_POST['placename'];
                            $desc = $_POST['placedesc'];
                            $overviewid = $_POST['overviewid'];
                            $count=count($placename);
                                                
                            if($count > 0 && !empty($_POST['placename'][0])){
                                for($i=0; $i<$count; $i++) {
                                    $place=$placename[$i];
                                    $placedesc=$desc[$i];
                                    $placeid=$overviewid[$i];
                                
                                    if(empty($placeid)) {
                                        if(!empty($_FILES['placeimage']['name'][$i])) {
                                            $image=array();
                                            $image['name']=$_FILES['placeimage']['name'][$i];
                                            $image['type']=$_FILES['placeimage']['type'][$i];
                                            $image['tmp_name']=$_FILES['placeimage']['tmp_name'][$i];
                                            $image['error']=$_FILES['placeimage']['error'][$i];
                                            $image['size']=$_FILES['placeimage']['size'][$i];
                                            if(!empty($image['name']) && $image['size']>0){
                                                $imagename=$this->file_upload($image,$path);
                                                if(empty($imagename)){
                                                    $imagename="";
                                                }
                                            } 
                                            else {
                                                $imagename="";
                                            }
                                        } 
                                        else {
                                            $imagename="";
                                        }
                                        $overview=array(
                                                        'tour_id'=>$id,
                                                        'placename'=>$place,
                                                        'placedesc'=>$placedesc,
                                                        'image'=>$imagename,
                                                        'created_at'=>date('Y-m-d H:i:s'),
                                                    );
                                        $this->common_model->data_insert('tbl_tour_overview',$overview);
                                    } 
                                    else {
                                        $overview=array();
                                        if(!empty($_FILES['placeimage']['name'][$i])) {
                                            //$image=array();
                                            $image=array();
                                            $image['name']=$_FILES['placeimage']['name'][$i];
                                            $image['type']=$_FILES['placeimage']['type'][$i];
                                            $image['tmp_name']=$_FILES['placeimage']['tmp_name'][$i];
                                            $image['error']=$_FILES['placeimage']['error'][$i];
                                            $image['size']=$_FILES['placeimage']['size'][$i];
                                        
                                            if(!empty($image['name']) && $image['size'] > 0) {
                                                $overimage=$this->file_upload($image,$path);
                                                if(!empty($overimage)) {
                                                    $overview["image"]=$overimage;
                                                }
                                            } 
                                            else {
                                                $overimage="";
                                            }
                                        }
                                        $overview["tour_id"]=$id;
                                        $overview["placename"]=$place;
                                        $overview["placedesc"]=$placedesc;
                                        $overview["created_at"]=date('Y-m-d H:i:s');
                                        $this->common_model->data_update('tbl_tour_overview',$overview,array("id"=>$placeid));
                                    }
                                
                                }
                            }
                        }

                        for ($i=0; $i<count($_FILES["gallery"]["name"]); $i++) { 
                            if ($_FILES["gallery"]["size"][$i] > 0) {
                                $idatad['name'] = $_FILES["gallery"]["name"][$i];
                                $idatad['type'] = $_FILES["gallery"]["type"][$i];
                                $idatad['tmp_name'] = $_FILES["gallery"]["tmp_name"][$i];
                                $idatad['error'] = $_FILES["gallery"]["error"][$i];
                                $idatad['size'] = $_FILES["gallery"]["size"][$i];
                                $config['upload_path'] = './uploads/tours/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["gallery"]["name"][$i]);
                                $newfilename = time() . '.' . end($temp);
                                $uploadpath = $this->config->item('tour_gallery_images_profile');
                                $file_name = $this->file_upload($idatad, $uploadpath);
                                $idata['tour_id'] = $id;
                                $idata['image'] = $file_name; 
                                $idata['created_at'] = date('Y-m-d h:i:s');  
                                $this->common_model->data_insert("tour_gallery", $idata); 
                            }   
                        }
                    
                        $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong>  Tour update successful</div>');
                        redirect('tour_dealer/tour_package_list');
                    }
                }
                $this->load->view("dealer/tourpackages/edit",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }
    
    public function deleteimage(){
            if(!empty($_REQUEST['id'])){
                $id=$_REQUEST['id'];
                $name=$_REQUEST['name'];
                $path=$this->config->item('tour_gallery_images_profile');
                if(file_exists($path.$name)){
                    unlink($path.$name);
                    $query = "DELETE FROM `tour_gallery` WHERE `id`='".$id."'";
                    $this->db->query($query);
                    echo "1";
                    exit;
                } 
                else {
                    echo "1";
                }
            }
    }
    
    public function deleteimagesformtableandfolder($tourid,$uploadpath,$tablename){
            $query="SELECT * FROM `".$tablename."` WHERE `id`='".$tourid."'";
            $res=$this->db->query($query)->result();
            if(!empty($res) && count($res) > 0){
                foreach($res as $row){
                    $name=$row->image;
                    $path=$uploadpath;
                    if(file_exists($path.$name)){
                        unlink($path.$name);
                        $query = "DELETE FROM `".$tablename."` WHERE `id`='".$row->id."'";
                        $this->db->query($query);
                    } 
                }
            }
    }

    public function tour_package_delete($id){
            if(_is_dealer_login($this)) {   
                $dealerid=$this->session->userdata('dealer_id');
                $query="DELETE FROM tbl_tour WHERE id='".$id."' AND vendor_id='".$dealerid."'";
                $this->db->query($query);
                $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong>  Tour Delete successful</div>');
                redirect('tour_dealer/tour_package_list');
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function tour_booked_list(){
            if(_is_dealer_login($this))  {
                $data['action'] = "Tour Booked List";
                $data['page'] = "Tour Booked List";
                $data['title'] = "Tour";
                $dealerid = $this->session->userdata('dealer_id');
                //echo "<br/>dealerid---".$dealerid; exit;
                $data['tourdata']=$this->tour_dealer_model->get_tourlistbooked_by_dealer_id($dealerid);
                //echo "<br/>tourdata<pre>---"; print_r($data['tourdata']); exit;
                $this->load->view("dealer/tourpackages/bookinglist",$data);
            } 
            else {
                redirect('dealers-login');
            }
    }

    public function tour_dealer_booked_list() {
        if (_is_user_login($this)) {
            $admin_id = $this->session->userdata('admin_id');
            $role =  $this->session->userdata('role');
            
            if($role == 1 && $admin_id >= 1) {
                if ($this->uri->segment(3) === FALSE) {
                    $vendor_id = 0;
                    redirect('admin/dashboard');
                } 
                else {
                    $vendor_id = $this->uri->segment(3);
                    if(isset($vendor_id) && ($vendor_id > 0)) {
                        $data['action'] = "";
                        $data['page'] = "Vendor Tour Booked List";
                        $data['title'] = "Tour";
                        $data['tourdata']=$this->tour_dealer_model->get_tourlistbooked_by_dealer_id($vendor_id);
                        $this->load->view("admin/tour_dealer/bookinglist",$data);
                    }
                    else {
                        redirect('admin/dashboard');
                    }
                }   
            }
            else {
                redirect('admin/login');
            }
        }    
        else {
            redirect('admin/login');
        }      
    }

    public function tour_booking_delete() {
            if(_is_dealer_login($this))  {
                $dealerid = $this->session->userdata('dealer_id');
                if ($this->uri->segment(3) === FALSE) {
                    $booking_id = 0;
                    $vendor_id = 0;
                    $tour_id = 0;

                    $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error ! </strong> Invalid URL.</div>');
                    redirect('tour_dealer/tour_booked_list');
                }
                else {
                    $booking_id = $this->uri->segment(3);
                    $vendor_id = $this->uri->segment(4);
                    $tour_id = $this->uri->segment(5);

                    if($dealerid == $vendor_id) {
                        $query="DELETE FROM tbl_tour_booking WHERE booking_id='".$booking_id."'";
                        $this->db->query($query);
                        
                        $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong> Tour Booking Delete successful</div>');
                        redirect('tour_dealer/tour_booked_list');
                    }
                    else {
                        $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error ! </strong> Invalid URL.</div>');
                        redirect('tour_dealer/tour_booked_list');
                    }
                }
            }
            else {
                redirect('dealers-login');
            }    
    }
}    