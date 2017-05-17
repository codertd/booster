<?php

    class Fundraiser_model extends CI_Model {

        public function add($param1 = 0, $param2 = 0) {
            return array('value' => $param1 + $param2);
        }

        public function getFundraisers() {

            $query = $this->db->query('select * from fundraisers');

            return $query->result();
        }

        public function getFundraisersByAvg() {

            $query = $this->db->query('
                select 
                    fundraisers.fundraiser_id,
                    fundraisers.fundraiser_name,
                    avg(reviews.review_rating) as average_rating 
                from 
                    fundraisers left join reviews on (fundraisers.fundraiser_id = reviews.fundraiser_id)
                where 
                    fundraisers.fundraiser_id = reviews.fundraiser_id or
                    reviews.fundraiser_id is NULL
                group by fundraisers.fundraiser_id 
                order by avg(reviews.review_rating) desc            
            ');

            return $query->result();
        }


        public function getFundraiser($fundraiser_id = 1) {

            $query = $this->db->query('select * from fundraisers where fundraiser_id = ?',array($fundraiser_id));

            return $query->result();
        }

        public function getFundraiserReviews($fundraiser_id = 1) {

            $query = $this->db->query('
                select 
                    * 
                from 
                    fundraisers,
                    reviews 
                where 
                    fundraisers.fundraiser_id = reviews.fundraiser_id and 
                    fundraisers.fundraiser_id = ? 
                order by review_date',
                array($fundraiser_id));

            return $query->result();
        }


        public function getFundraiserByName($fundraiser_name = NULL) {

            $query = $this->db->query('
                select 
                    * 
                from 
                    fundraisers 
                where 
                    fundraiser_name = ?',
                array($fundraiser_name));

            return $query->result();
        }


        public function createFundraiser($new_fundraiser) {

            $this->db->insert('fundraisers', $new_fundraiser);

            return 1;
        }


        public function createFundraiserReview($new_fundraiser_review) {
            /*
            +---------------+--------------+------+-----+---------+----------------+
            | Field         | Type         | Null | Key | Default | Extra          |
            +---------------+--------------+------+-----+---------+----------------+
            | review_id     | int(11)      | NO   | PRI | NULL    | auto_increment |
            | fundraiser_id | int(11)      | NO   |     | NULL    |                |
            | review_rating | int(11)      | NO   |     | NULL    |                |
            | review_text   | text         | YES  |     | NULL    |                |
            | review_name   | varchar(255) | YES  |     | NULL    |                |
            | review_email  | varchar(255) | YES  |     | NULL    |                |
            | review_date   | datetime     | NO   |     | NULL    |                |
            | review_ip     | varchar(25)  | YES  |     | NULL    |                |
            +---------------+--------------+------+-----+---------+----------------+
            */

            $this->db->insert('reviews', $new_fundraiser_review);

            return 1;
        }


        public function hasReviewedFundraiser($fundraiser_id = 1,$ip_address = '1.1.1.1') {

            $query = $this->db->query('
                select 
                    * 
                from 
                    fundraisers,reviews 
                where 
                fundraisers.fundraiser_id = ? and
                fundraisers.fundraiser_id = reviews.fundraiser_id and
                reviews.review_ip = ?
                ',array($fundraiser_id,$ip_address));

            return $query->result();
        }

    }

?>

