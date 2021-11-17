<?php

function check_already_login_petugas(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('petugasID');
    if($user_session){
        // echo "Masuk";
        redirect('admin/Dashboard');
    }
}

function check_not_petugas(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('petugasID');
    if(!$user_session){
        redirect('AuthAdmin/login');
    }
}

function check_admin(){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->pengguna_login()->penggunaIDHakAkses != 1){
        redirect('index');
    }

}



function check_pengguna_page($idPage){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    $data = $ci->fungsi->hakAkses()->hakAksesPageRules;
    $zx = unserialize($data);
    if(!in_array($idPage, $zx)){
         redirect('index');
       
    } else{
       
    }
}



//user



function check_already_login_user(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('alumniID');
    if($user_session){
        redirect('user/Dashboard');
    }
}



function check_not_user(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('alumniID');
    if(!$user_session){
        redirect('AuthUser/login');
    }
}

// function check_biodata_user(){
//     $ci =& get_instance();
//     $ci->load->model('Alumni_m');
//     $user_session = $ci->session->userdata('alumniID');
//     $data = $ci->Alumni_m->checkkBiodata($user_session)->row();

//     if($data){
//         redirect('user/userBiodata');
//     }

//     // echo json_encode($data);
// }





