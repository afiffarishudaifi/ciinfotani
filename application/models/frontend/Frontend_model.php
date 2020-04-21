<?php
    class Frontend_model extends CI_Model{
        public function get_5data(){
            $this->db->select('*');
            $this->db->from('panen');
            $this->db->join('petani','petani.KTP=panen.KTP','inner');
            $this->db->join('komoditas','komoditas.ID_KOMODITAS=panen.KOMODITAS','inner');
            $this->db->join('desa','desa.ID_DESA=petani.ID_DESA','inner');
            $this->db->where('month(panen.TGL_PANEN)=month(CURRENT_DATE())');
            $this->db->order_by('RAND()');
            $this->db->limit(5);
            $query=$this->db->get();

            return $query;
        }
    }