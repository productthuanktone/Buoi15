<?php 
include  MODEL_DIR . "/Customer.php";
include  MODEL_DIR . "/Person.php";
include  MODEL_DIR . "/Company.php";
include_once MODEL_DIR . "/User.php";
class CustomerController extends Controller
		 
{
	
    public function indexAction()
    {
        $mperson=new Person();
   		$Persons=$mperson->findAll(" WHERE id IN (SELECT person_id FROM Customer);");
        return $this->render("index",['danhsachKH' => $Persons]);

    } 
        public function deleteAction()
    {

        $id = $_GET["id"];

        $m = new Customer();

        $isOK = $m->delete($id);

        if ($isOK){
            header("location: /Buoi15/Customer");
        }
        else{
        	$error="Tao khong cho xoa doa ! lam gi tao";
        }


        return $this->render("index", ["error"=>$error,'danhsachKH' => $Persons

        ]);


    }
    public function addindexAction(){
       
        //Person
        $mperson=new Person();
        $Persons=$mperson->findAll(" WHERE id NOT IN (SELECT person_id FROM Customer); ");
        //Company
        $mcopa=new Company();
        $Companys=$mcopa->findAll();
        //User
        $muser=new User();
        $Users=$muser->findAll();

    return $this->render("addCustomer",['Persons'=>$Persons,'Companys'=>$Companys,'Users'=>$Users]);
    }
    public function editindexAction(){
        $id = $_GET["id"];
         $mperson=new Person();
        $Persons=$mperson->getid($id);
        //
        
        return $this->render("edit",['person'=>$Persons]);
    }
    public function editAction(){
        $mperson=new Person();
        $isPost = $_SERVER["REQUEST_METHOD"] == "POST";
        $firstname = $_POST["firstname"];
        $middlename = $_POST["middlename"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $birthdate=$_POST["birthdate"];
        $phone_number=$_POST["phone_number"];
        $id=$_POST["id"];
            if ($isPost){
            $data = $_POST;
            $mperson->load($data);
            if (! $mperson->update($id)){
                $error = "Lỗi: Không thể lưu."  ;
                return $this->render("delete", [

        ]);
            }else{
                header("location: /Buoi15/customer/index");
            }

        }
    }
    public function addAction(){
    	
   		//
        $mcustomer=new Customer();
    	$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
        $person_id = $_POST["person_id"];
        $deleted = $_POST["deleted"];
        $company_id = $_POST["company_id"];
        $user_id = $_POST["user_id"];
    	 $error = "";
    	if ($isPost && $person_id!=""){
            $data = $_POST;
            $mcustomer->load($data);
            if (! $mcustomer->save()){
                $error = "Lỗi: Không thể lưu."	;  
            }else{
                header("location: /Buoi15/customer/index");
            }

        }
        else{
            $error = "Nhap day du thong tin"  ;
        }
        return $this->render("addCustomer", ['error' => $error]);
    }
}
    ?>