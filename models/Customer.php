<?php 
class Customer extends DatabaseHelper{
		public $tableName = "customer";
		public $id;
		public $user_id;
		public $person_id;
		public $deleted;
		public $company_id;
		public function delete($id){
		$sql = "DELETE FROM " . $this->tableName . " WHERE id='" . $id. "' ";
		$result = $this->exec($sql);
		 
		return $result;
	}

	public function save(){
		$sql = "INSERT INTO " . $this->tableName. " (user_id,person_id,deleted, company_id) VALUES('" . $this->user_id . "','" . $this->person_id . "','" . $this->deleted . "','" . $this->company_id ."')";

		$result = $this->exec($sql);
		return $result;
	}
	public function update($id){
		$sql = "UPDATE INTO " . $this->tableName. " (user_id,person_id,deleted, company_id) VALUES('" . $this->user_id . "','" . $this->person_id . "','" . $this->deleted . "','" . $this->company_id ."') where id=". $this->id."";

		$result = $this->exec($sql);
		return $result;
	}


}
 ?>