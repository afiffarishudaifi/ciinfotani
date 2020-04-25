<?php
    class Cari_model extends CI_Model{
        public function komoditas(){
                $this->db->order_by('NAMA_KOMODITAS', 'ASC');
                return $this->db->from('komoditas')
                ->get()
                ->result();
        }
        public function kecamatan(){
            $this->db->order_by('NAMA_KECAMATAN', 'ASC');
            return $this->db->from('kecamatan')
            ->get()
            ->result();
        }

        public function get_all($number,$offset){
            $this->db->select('*');
            $this->db->join('petani','petani.KTP=panen.KTP','inner');
            $this->db->join('komoditas','komoditas.ID_KOMODITAS=panen.KOMODITAS','inner');
            $this->db->join('desa','desa.ID_DESA=petani.ID_DESA','inner');
            $this->db->join('kecamatan','kecamatan.ID_KECAMATAN=desa.ID_KECAMATAN','inner');
            
            $query=$this->db->get('panen',$number,$offset);

            return $query->result();
        }
        function jumlah_data(){
            return $this->db->get('panen')->num_rows();
        }

        public function get_cari($keyword){
            $this->db->select('*');
            $this->db->join('petani','petani.KTP=panen.KTP','inner');
            $this->db->join('komoditas','komoditas.ID_KOMODITAS=panen.KOMODITAS','inner');
            $this->db->join('desa','desa.ID_DESA=petani.ID_DESA','inner');
            $this->db->join('kecamatan','kecamatan.ID_KECAMATAN=desa.ID_KECAMATAN','inner');
			$this->db->like('NAMA_KOMODITAS',$keyword);
            $this->db->or_like('NAMA_PETANI',$keyword);
            $this->db->or_like('ALAMAT_PETANI',$keyword);
            $this->db->or_like('NAMA_DESA',$keyword);
            $this->db->or_like('NAMA_KECAMATAN',$keyword);
            $this->db->or_like('TGL_PANEN',$keyword);
            $this->db->or_like('HASIL',$keyword);
            $query=$this->db->get('panen');

            return $query->result();
        }
        
        public function get_filter($komo,$keca,$tglpanen){
            $this->db->select('*');
            $this->db->join('petani','petani.KTP=panen.KTP','inner');
            $this->db->join('komoditas','komoditas.ID_KOMODITAS=panen.KOMODITAS','inner');
            $this->db->join('desa','desa.ID_DESA=petani.ID_DESA','inner');
            $this->db->join('kecamatan','kecamatan.ID_KECAMATAN=desa.ID_KECAMATAN','inner');
            $this->db->where('KOMODITAS',$komo);
            if(isset($keca)){
            foreach($keca as $kec){
            $this->db->or_where('kecamatan.ID_KECAMATAN',$kec);}}
            $this->db->or_where('month(TGL_PANEN)',$tglpanen);
            
            $query=$this->db->get('panen');

            return $query->result();
		}
    }
?>