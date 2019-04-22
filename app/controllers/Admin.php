<?php 

class Admin extends Controller {

    public function __construct() {

        $this->adminModel = $this->model('Adminpanel');

        if(isLoggedIn() === false) {
            redirect('pages/index');
        }

    }

    public function index() {

        $data = [
            'title' => 'Welcome',
        
        ];

        $this->view("admin/index", $data);

    }

    public function insights() {

        $insights = $this->adminModel->getAllInsights();

        $data = [

            "insights" => $insights

        ];

        $this->view("admin/insights", $data);
        
    }

    public function cases() {

        $cases = $this->adminModel->getAllCases();

        $data = [

            'cases' => $cases

        ];

        $this->view("admin/cases", $data);

    }

    public function generalSettings() {

        $data = [
            'title' => 'Welcome',
        
        ];

        $this->view("admin/generalsettings", $data);

    }

    public function accounts() {

        $accounts = $this->adminModel->getAllUsers();

        $data = [

            'accounts' => $accounts
            
        ];

        $this->view("admin/accounts", $data);

    }

}

?>