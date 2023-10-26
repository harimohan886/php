<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('_is_user_login'))
{
    function _is_user_login($thi)
    {
        $userid = _get_current_user_id($thi);
        $usertype = _get_current_user_type_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($userid) && $userid!="" && isset($usertype))
        {
            if($is_access == true){
                 return $userid;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }

    }   
}

if ( ! function_exists('_is_dealer_login'))
{
    function _is_dealer_login($thi)
    {
        $dealer_id = _get_current_dealer_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($dealer_id) && $dealer_id!="")
        {
            if($is_access == true){
                 return $dealer_id;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }
    }   
}



if ( ! function_exists('_is_school_login'))
{
    function _is_school_login($thi)
    {
        $school_id = _get_current_school_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($school_id) && $school_id!="")
        {
            if($is_access == true){
                 return $school_id;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }
    }   
}



if ( ! function_exists('_is_customer_login'))
{
     function _is_customer_login($thi)
    {
        $userid = _get_current_rto_customer_id($thi);
        
        $usertype = _get_current_rto_customer_type_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($userid) && $userid!="" && isset($usertype))
        {
            if($is_access == true){
                 return true;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }

    }   
}



if ( ! function_exists('_is_store_login'))
{
     function _is_store_login($thi)
    {
        $userid = _get_current_store_id($thi);
        
        $usertype = _get_current_store_type_id($thi);
       //echo  $is_access = _get_user_type_access($thi,$usertype);
        $is_access = true;
        if(isset($userid) && $userid!="" && isset($usertype))
        {
            if($is_access == true){
                 return true;
            }else{
                $thi->load->view("admin/common/not_access");
                return false;    
            }
            
        }else
        {
           
            return false;
        }

    }   
}


if ( ! function_exists('_is_frontend_user_login'))
{
     function _is_frontend_user_login($thi)
    {
        $userid = _get_current_user_id($thi);
        $usertype = _get_current_user_type_id($thi);
         
        if(isset($userid) && $userid!="" && isset($usertype))
        {
                 return true;
        }else
        {
           
            return false;
        }

    }   
}
if(! function_exists('_get_post_back')){
    function _get_post_back($thi,$post){
        return ($thi->input->post($post)!="")? $thi->input->post($post) : ""; ;
    }
}
if(! function_exists('_get_current_user_id')){
    function _get_current_user_id($thi){
        return $thi->session->userdata("admin_id");
    }
}

if(! function_exists('_get_current_school_id')){
    function _get_current_school_id($thi){
        return $thi->session->userdata("school_id");
    }
}


if(! function_exists('_get_current_rto_customer_id')){
    function _get_current_rto_customer_id($thi){
        return $thi->session->userdata("rto_customer_id");
    }
}



if(! function_exists('_get_current_store_id')){
    function _get_current_store_id($thi){
        return $thi->session->userdata("store_user_id");
    }
}


if(! function_exists('_get_current_user_name')){
    function _get_current_user_name($thi){
        return $thi->session->userdata("user_name");
    }
}




if(! function_exists('_get_current_rto_customer_type_id')){
    function _get_current_rto_customer_type_id($thi){
        return $thi->session->userdata("rto_customer_type_id");
    }
}


if(! function_exists('_get_current_user_type_id')){
    function _get_current_user_type_id($thi){
        return $thi->session->userdata("user_type_id");
    }
}

if(! function_exists('_get_current_dealer_type_id')){
    function _get_current_dealer_type_id($thi){
        return $thi->session->userdata("dealer_role");
    }
}


if(! function_exists('_get_current_store_type_id')){
    function _get_current_store_type_id($thi){
        return $thi->session->userdata("store_type_id");
    }
}

if(! function_exists('_get_current_dealer_id')){
    function _get_current_dealer_id($thi){
        return $thi->session->userdata("dealer_id");
    }
}


/*
if(! function_exists('_get_user_type_access')){
    function _get_user_type_access($thi,$user_type_id){
            $cur_class = $thi->router->fetch_class();
            $cur_method = $thi->router->fetch_method();
            $result = $thi->db->query("select * from user_type_access where user_type_id = '".$user_type_id."' and class = '".$cur_class."' and (method = '".$cur_method."' or method='*')");
            
            $row = $result->row();
            
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
            return false;
    }
} */
if(! function_exists('_get_user_redirect')){
    function _get_user_redirect($thi){
        if(_get_current_user_type_id($thi)==0)
        {
            return "admin/dashboard";
        }
        else if(_get_current_user_type_id($thi)==3)
        {
            return "admin/dashboard";
        }else if(_get_current_user_type_id($thi)==1)
        {
            return "admin/dashboard";
        }
    }
}

if(! function_exists('_get_dealer_redirect')){
    function _get_dealer_redirect($thi){
        if(_get_current_dealer_type_id($thi)== 1 || _get_current_dealer_type_id($thi)== 2 || _get_current_dealer_type_id($thi)== 3 || _get_current_dealer_type_id($thi)== 4 || _get_current_dealer_type_id($thi)== 5 || _get_current_dealer_type_id($thi)== 6)
        {
            return "dealer/dashboard";
        }
    }
}

if(! function_exists('_get_school_redirect')){
    function _get_school_redirect($thi){

            return "dashboard";
        
    }
}


if(! function_exists('_get_store_redirect')){
    function _get_store_redirect($thi){
                            if(_get_current_store_type_id($thi)==0)
                            {
                                return "restaurant/dashboard";
                            }
                            else if(_get_current_store_type_id($thi)==3)
                            {
                                return "restaurant/dashboard";
                            }else if(_get_current_store_type_id($thi)==1)
                            {
                                return "restaurant/dashboard";
                            }
    }
}


if(! function_exists('_get_customer_redirect')){
    function _get_customer_redirect($thi){
                            if(_get_current_rto_customer_type_id($thi)==0)
                            {
                                return "customers/dashboard";
                            }
                            else if(_get_current_rto_customer_type_id($thi)==3)
                            {
                                return "customers/dashboard";
                            }else if(_get_current_rto_customer_type_id($thi)==1)
                            {
                                return "customers/dashboard";
                            }
    }
}






if(! function_exists('_is_active_menu')){
    function _is_active_menu($thi,$class,$method){
        $c_class = $thi->router->fetch_class();
        $c_method = $thi->router->fetch_method();
        if(in_array($c_class,$class)){
            return "active";
        }
        if(in_array($c_method,$method)){
            return "active";
        }
    }
}
