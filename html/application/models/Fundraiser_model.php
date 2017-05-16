<?php

    class Fundraiser_model extends CI_Model {

        public function add($param1 = 0, $param2 = 0) {
            return array('value' => $param1 + $param2);
        }

        public function getFundraisers() {

            $query = $this->db->query('select * from fundraisers');

            return $query->result();
        }

        public function getFundraiser($fundraiser_id = 1) {

            $query = $this->db->query('select * from fundraisers where fundraiser_id = ?',array($fundraiser_id));

            return $query->result();
        }

    }

?>
