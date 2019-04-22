<?php 

class Cases extends Controller {


    public function __construct() {

        $this->caseModel = $this->model('CaseOne');

    }

    public function index() {

      $cases = $this->caseModel->getCases();

      $data = [
        "cases" => $cases
      ];

      $this->view('Cases/index', $data);

    }

    public function add() {

      //Check if form is POST

      if($_SERVER['REQUEST_METHOD'] == 'POST') {

          // Sanitize post data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = [
              'title'                  => trim($_POST['title']),
              'body'                   => trim($_POST['body']),
              'title_err'              => '',
              'body_err'               => '',
              'id'                     => trim($_POST['id']),
          ];

          // Validate the user
          if($data['id'] != $_SESSION['user_id']) {
            flashMessage("add_case_restricted", "You are not allowed to ADD a new CASE");
            redirect('admin/cases');
              
          } else {

            //Validate title
            if(empty($data['title'])){
              $data['title_err'] = "Please enter a title.";
            } 

            //Validate body
            if(empty($data['body'])){
                $data['body_err'] = "Please enter a username.";
            }

            //Check for No errors
            if(empty($data['title_err']) && empty($data['body_err'])) {

                if($this->caseModel->addCase($data)) {
                    flashMessage("add_case_success", "You have ADDED a new CASE");
                    redirect('admin/cases');
                } else {
                    die("Something went wrong registering user");
                }
            } else {
                $this->view("cases/add", $data);
            }

          }

      } else {

          // Init data
          $data = [
              'title'               => '',
              'body'                => '',
              'title_err'           => '',
              'body_err'            => ''

          ];
  
      $this->view("cases/add", $data);

      }
  }

    public function deleteCase($id = null) {

      /*echo $id;
      echo $_SESSION["case_id_time"];
      die;*/

      if(!empty($id)) {

          // Double check if user is correct
          $currentCase = $this->caseModel->findCaseById($id);

          if($currentCase->user_id != $_SESSION['user_id']) {
              flashMessage('case_delete_notsuccessful', 'You are not allowed to DELETE this Case.');
              redirect('admin/cases');
          
          } /*elseif ($id != $_SESSION["case_id_time"]) {
            flashMessage('case_delete_notsuccessful', 'You are not allowed to delete THIS CASE HAHA.');
            redirect('admin/cases');
            
          }*/ elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

              if($this->caseModel->deleteCase($id)) {
                  flashMessage('case_deleted', 'The Case is deleted.');
                  redirect('admin/cases');
              }

          } else {
              redirect('admin/index');
          }
      }
  }


}



?>