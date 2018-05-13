<?php 
include  MODEL_DIR . "/Customer_request.php";
class CustomerrqController extends Controller
{
    public function indexAction()
    {
       $mCus_Rq=new Customer_Request();
        $mCus_Rqs=$mCus_Rq->findAll();
        return $this->render("index",['danhsachkhachhangyc' => $mCus_Rqs]);

       

    } 
}
    ?>