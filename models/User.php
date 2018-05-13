<?php 

class User extends DatabaseHelper{
		public $tableName = "user";
		public $id;
		public $group;
		public $username;
		public $password_hash;
		public $avatar;


		public function getUser($username)
        {
            $whrere = " WHERE username='". $username . "'";
            $m = new self();
            $m->findOne($whrere);
            return $m;
        }
        public function getQuyen($username)
        {
            $whrere = "select s.group form user s WHERE username='". $username . "'";
            $m = new self();
            $m->findOne($whrere);
            return $m;
        }


    public function authenticate($password)
    {
        if ($this->id != ""){
            return password_verify($password, $this->password_hash );
        }

        return false;
    }

}
?>