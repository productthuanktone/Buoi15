<?php 

 

class person extends DatabaseHelper{
		public $tableName = "person";
		public $id;
		public $firstname;
		public $middlename;
		public $lastname;
		public $gender;
		public $birthdate;
		public $email;
		public $phone_number;

		public function getid($id)
        {
            $whrere = "WHERE id='".$id ."'";
            $m = new self();
            $m->findOne($whrere);
            return $m;
        }
	public function delete($id){
		$sql = "DELETE FROM " . $this->tableName . " WHERE id='" . $id. "' ";
		$result = $this->exec($sql);
		 
		return $result;
	}

	public function save(){
		$sql = "INSERT INTO " . $this->tableName. " (id, firstname,middlename,lastname, gender,email,phone_number) VALUES('" . $this->id . "','" . $this->firstname . "','" . $this->middlename . "','" . $this->lastname . "','" . $this->gender ."','" . $this->email ."','" . $this->phone_number . "')";

		$result = $this->exec($sql);
		return $result;
	}
	public function update($id){
		$sql = "UPDATE " . $this->tableName. " SET firstname='". $this->firstname . "',middlename='". $this->middlename ."',lastname='". $this->lastname . "',email='". $this->email ."',phone_number='". $this->phone_number . "',birthdate='".$this->birthdate."' where id=".$id;
		$result = $this->exec($sql);
		return $result;
	}
	
}