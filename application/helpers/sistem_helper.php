<?php 
    function Kadep_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 1 ){
            redirect('LoginC/logout');
        }
    }

    function Sekdep_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 2 && $ci->session->userdata('kode_unit') != 1){
            redirect('LoginC/logout');
        }
    }

    function Man_sarpras_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 3 ){
            redirect('LoginC/logout');
        }
    }

    function Man_keuangan_acess(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 3 && $ci->session->userdata('kode_unit') != 3){
            redirect('LoginC/logout');
        }
    }

    function Staf_sarpras_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 5 ){
            redirect('LoginC/logout');
        }
    }

    function Staf_keuangan_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 6 ){
            redirect('LoginC');
        }
    }

    function Mahasiswa_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 5  && $ci->session->userdata('kode_unit') != 8){
            redirect('LoginC/logout');
        }
    }

    function Pegawai_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 8 ){
            redirect('LoginC');
        }
    }

    function Unit_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 9 ){
            redirect('LoginC');
        }
    }

     function Admin_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 10 ){
            redirect('LoginC');
        }
    }