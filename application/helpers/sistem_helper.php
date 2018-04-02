<?php 
    function Kadep_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 1 ){
            redirect('LoginC');
        }
    }

    function Sekdep_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 2 ){
            redirect('LoginC');
        }
    }

    function Man_sarpras_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 3 ){
            redirect('LoginC');
        }
    }

    function Man_keuangan_acess(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 4 ){
            redirect('LoginC');
        }
    }

    function Staf_sarpras_access(){
        $ci=& get_instance();
        if($ci->session->userdata('kode_jabatan') != 5 ){
            redirect('LoginC');
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
        if($ci->session->userdata('kode_jabatan') != 7 ){
            redirect('LoginC');
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