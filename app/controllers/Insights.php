<?php 

class Insights extends Controller {

    public function __construct()  {

        $this->insightModel = $this->model('Insight');

    }

    public function index() {

        $insights = $this->insightModel->getInsights();

        $data = [

            'insights' => $insights

        ];

        $this->view('insights/index', $data);

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
                flashMessage("add_case_restricted", "You are not allowed to ADD a new INSIGHT");
                redirect('admin/insights');
                
            } else {
    
                //Validate title
                if(empty($data['title'])){
                $data['title_err'] = "Please enter a title.";
                } 
    
                //Validate body
                if(empty($data['body'])){
                    $data['body_err'] = "Please enter a text.";
                }
    
                //Check for No errors
                if(empty($data['title_err']) && empty($data['body_err'])) {
    
                    if($this->insightModel->addInsight($data)) {
                        flashMessage("add_case_success", "You have ADDED a new INSIGHT");
                        redirect('admin/insights');
                    } else {
                        die("Something went wrong registering user");
                    }
                } else {
                    $this->view("insights/add", $data);
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
    
        $this->view("insights/add", $data);
    
        }
    }

    }



?>