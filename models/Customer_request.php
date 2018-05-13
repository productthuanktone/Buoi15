<?php 
class Customer_Request extends DatabaseHelper{
		public $tableName = "customer_request";
		public $id;
		public $creator_id;
		public $customer_id;
		public $from_airport;
		public $to_airport;
		public $ticket_class_code;
		public $departure;
		public $return;
		public $note;
		public $created_at;


}
 ?>