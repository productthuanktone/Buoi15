<?php 
include  MODEL_DIR . "/person.php";
class PersonController extends Controller
{
   public function indexAction(){
    $mperson=new Person();
        $Persons=$mperson->findAll(" INNER JOIN customer ON customer.person_id=person.id; ");
        return $this->render("index",['persons' => $Persons]);
   }
    
    public function indexaddAction()
    {
        
        return $this->render("themperson");

    } 
    public function addAction(){
    	$mperson=new person();
    	$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
        $firstname = $_POST["firstname"];
        $middlename = $_POST["middlename"];
        $lastname = $_POST["lastname"];
        $phone_number = $_POST["phone_number"];
    	 $error = "";
    	if ($isPost && $firstname !=""&&$middlename!=""&&$lastname!=""&&$phone_number!=""){

            $data = $_POST;
            $mperson->load($data);
            $id = (new person())->getId($phone_number);
            if (! $mperson->save()){
                $error = "Lỗi: Không thể lưu."	;
            }else{
                $_SESSION['idperson']   = serialize($id);
                header("location: /Buoi15/person/index");
            }

        }
        else{
            $error = "Nhap day du thong tin"  ;
        }
        return $this->render("themperson", [
            'error' => $error
        ]);
    }
    public function deleteAction()
    {

        $id = $_GET["id"];

        $m = new person();

        $isOK = $m->delete($id);

        if ($isOK){
            header("location: /Buoi15/person");
        }


        return $this->render("delete", [

        ]);


    }
}
?>