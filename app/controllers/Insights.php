<?php 

class Insights extends Controller {

    public function __construct()  {

        $this->insightModel = $this->model('Insight');
        $this->userModel = $this->model('User');
    }

    public function index() {

        $insights = $this->insightModel->getInsights();

        $data = [
            'insights' => $insights
        ];

        $this->view('insights/index', $data);
    }

    public function show($id = null) {

        $insightSingle = $this->insightModel->getInsightSingle($id);

        if($insightSingle == false) {
            redirect('insights/index');
        }

        $data =  $insightSingle;

        $this->view('insights/show', $data);    
    }

    public function add() {

        //Check if form is POST
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'id'                     => trim($_POST['id']),
                'title'                  => trim($_POST['title']),
                'sub_title'              => trim($_POST['sub_title']),
                'body'                   => trim($_POST['body']),
                'title_err'              => '',
                'sub_title_err'          => '',
                'body_err'               => '',
                'date_stamp'             => '',
                'user_name'              => ''
                
            ];
    
            // Validate the user
            if($data['id'] != $_SESSION['user_id']) {
                flashMessage("add_insight_restricted", "You are not allowed to ADD a new INSIGHT");
                redirect('admin/insights');
                
            } else {
    
                //Validate title
                if(empty($data['title'])){
                $data['title_err'] = "Please enter a title.";
                } 

                //Validate Sub Title
                if(empty($data['sub_title'])){
                    $data['sub_title_err'] = "Please enter a Sub Title.";
                }
    
                //Validate body
                if(empty($data['body'])){
                    $data['body_err'] = "Please enter a text.";
                }

                //Time in seconds
                $tm =  time();

                $date_stamp = date('d/m/y', $tm);
                $data['date_stamp'] = $date_stamp;


                // Add the user name
                $user_name = $this->userModel->findUserByIdInArray($data['id']);

                $data['user_name'] = $user_name['name'];


                //Check for No errors
                if(empty($data['title_err']) && empty($data['body_err']) && empty($data['sub_title_err'])) {
    
                    if($this->insightModel->addInsight($data)) {
                        flashMessage("add_insight_success", "You have ADDED a new INSIGHT");
                        redirect('admin/insights');
                    } else {
                        die("Something went wrong adding the insight");
                    }
                } else {
                    $this->view("insights/add", $data);
                }
    
            }
    
        } else {
    
            // Init data
            $data = [
                'title'               => '',
                'sub_title'           => '',
                'body'                => '',
                'title_err'           => '',
                'sub_title_err'       => '',
                'body_err'            => ''
    
            ];
    
            $this->view("insights/add", $data);
    
        }
    }

    public function edit($id = null) {

        $currentInsight = $this->insightModel->findInsightByIdAsArray($id);
    
        // Check if the UPDATE button is pressed
        // Second iteration of method 
        if ($id == "update") {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                if($_POST['user_id'] != $_SESSION['user_id']) {
                    flashMessage('update_insight_notallowed', 'You are not allowed to UPDATE this Insight.');
                    redirect('admin/insights');
                    
    
                } /*elseif($_POST['id'] != $currentInsight['id']) {
                    flashMessage('update_insight_by_id_notallowed', 'You are not allowed to UPDATE this Insight ID.');
                    redirect('admin/insights'); } */
    
                elseif($_POST['user_id'] == $_SESSION['user_id']) {
                    
    
                    // Init data
                    $data = [
                        'user_id'               => trim($_POST['user_id']),
                        'id'                    => trim($_POST['id']),
                        'title'                 => trim($_POST['title']),
                        'sub_title'             => trim($_POST['sub_title']),
                        'body'                  => trim($_POST['body']),
                        'title_err'             => '',
                        'sub_title_err'         => '',
                        'body_err'              => ''
                    ];
    
                    //Validate Title
                    if(empty($data['title'])){
                        $data['title_err'] = "Please enter a Insight Title.";
                    }

                    if(empty($data['sub_title'])){
                        $data['sub_title_err'] = "Please enter a Insight Sub Title.";
                    }
    
                    //Validate Body
                    if(empty($data['body'])){
                        $data['body_err'] = "Please enter a Insight Body.";
                    }
    
                    //Check for no Errors
                    if(empty($data['title_err']) && empty($data['body_err']) && empty($data['sub_title_err'])) {
                        
                        if($this->insightModel->updateInsight($data)) {
                            flashMessage("update_insight_successful", "You have UPDATED this Insight.");
                            redirect("admin/insights");
                        } else {
                            die("Something went wrong with UPDATING the insight");
                        }
    
                    } else {
                        
                        $_SESSION['edit_error_insight'] = $data;
                        redirect("insights/redirectUpdateInsights");
                    }
    
                }
    
            } else {
    
                // Empty data
                $data = [
                    'user_id'               => '',
                    'id'                    => '',
                    'title'                 => '',
                    'sub_title'             => '',
                    'body'                  => '',
                    'title_err'             => '',
                    'sub_title_err'         => '',
                    'body_err'              => ''
                ];
        
            $this->view("admin/index");
            
            }
    
        // Check if the author of the insight is the same as the current logged in user trying to Edit the case
        // This piece of code will also take us to admin/cases if we do not pass a parameter to the method edit. 
        // I.e if we only write for example the url ...cases/edit then the parameter will be null and the currentCase will be nothing. 
        } elseif($currentInsight['user_id'] != $_SESSION['user_id']) {
            flashMessage("insight_edit_notsuccessful", "You are not allowed to EDIT this Insight.");
            redirect("admin/insights");
    
        } elseif($currentInsight['user_id'] == $_SESSION['user_id']) {
    
            // Actually checks if we have pushed the UPDATE button on the Edit page before
            // By checking if there are any stored errors in the edit_error SESSION variable
            // If there are any errors from the previous visit and submition of the Edit form 
            // then we are actually redirected from the redirectUpdateCase page as a 200 in order to prevent any Post-Redirect-Get issues.
            if(isset($_SESSION['edit_error_insight'])) {
    
                $this->view("insights/edit", $_SESSION['edit_error_insight']);
    
            } else {
            
                // Here we are sent to the Update form on the Edit page 
                // Note that this means that we are visiting the Edit page for the first time
                // from the All Cases page. Since we are visiting the first time, it also means that there 
                // cannot be any errors stored in the edit_error SESSION.
    
                $data =  $currentInsight;
    
                $this->view("insights/edit", $data);
            }
        }
      }
    
        public function redirectUpdateInsights() {
    
            $this->view('insights/redirectUpdateInsights');
        }

        public function deleteInsight($id = null) {

            if(!empty($id)) {
      
                // Double check if user is correct
                $currentInsight = $this->insightModel->findInsightById($id);
      
                if($currentInsight->user_id != $_SESSION['user_id']) {
                    flashMessage('insight_delete_notsuccessful', 'You are not allowed to DELETE this Insight.');
                    redirect('admin/insights');
                
                } elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
      
                    if($this->insightModel->deleteInsight($id)) {
                        flashMessage('insight_deleted', 'The Insight is deleted.');
                        redirect('admin/insights');
                    }
      
                } else {
                    redirect('admin/index');
                }
            }
        }

    }



?>