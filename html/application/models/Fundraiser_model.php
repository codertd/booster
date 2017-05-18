<?php

    class Fundraiser_model extends CI_Model {

        /**
        * test method
        * This should validate that param1/param2 are ints.
        *
        * @param	$param1, $param2
        * @return	an associative array with value set to the sum of both params.
        */
        public function add($param1 = 0, $param2 = 0) {
            return array('value' => $param1 + $param2);
        }


        /**
        * getFundraisers
        * Returns a query result of all fundraisers, sorted by name.
        *
        * @param	none
        * @return	an array that contains all fundraisers
        */
        public function getFundraisers() {

            $query = $this->db->query('select * from fundraisers order by fundraiser_name');

            return $query->result();
        }

        /**
        * getFundraisersByAvg
        * Returns a query result of all fundraisers, ordered by an AVG of review ratings.
        *
        * @param	none
        * @return	an array that contains the sorted fundraisers by review_rating.
        */
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

        /**
        * getFundraiser
        * Returns a query result with a single Fundraiser that matches a fundraiser_id.
        *
        * @param	$fundraiser_id
        * @return	an array that contains the fundraiser.
        */
        public function getFundraiser($fundraiser_id = 1) {

            $query = $this->db->query('select * from fundraisers where fundraiser_id = ?',array($fundraiser_id));

            return $query->result();
        }

        /**
        * getFundraiserReviews
        * Returns a query result with all reviews associated by the fundraiser_id
        *
        * @param	$fundraiser_id
        * @return	an array that contains the fundraiser reviews.
        */
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


        /**
        * getFundraiserByName
        * Returns a query result with all fundraisers with the fundraiser_name
        *
        * @param	$fundraiser_id
        * @return	an array that contains the fundraiser reviews.
        */
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


        /**
        * createFundraiser
        * Returns true if a new fundraiser is created.
        *
        * @param	$new_fundraiser associative array.
        * @return	true.
        */
        public function createFundraiser($new_fundraiser) {

            $this->db->insert('fundraisers', $new_fundraiser);

            return 1;
        }


        /**
        * createFundraiserReview
        * Returns true if a new fundraiser is created.
        *
        * @param	$new_fundraiser_review associative array.
        * @return	true.
        */
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


        /**
        * hasReviewedFundraiser
        * Returns a query result with any fundraiser reviews from a given IP, as one can only post a review once.
        *
        * @param	$fundraiser_id, $ip_address
        * @return	an array that contains the fundraiser reviews.
        */
        public function hasReviewedFundraiser($fundraiser_id = 1, $ip_address = '1.1.1.1') {

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

