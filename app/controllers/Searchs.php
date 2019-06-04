<?php

class Searchs extends Controller {


    public function __construct() {

        $this->searchModel = $this->model('Search');

    }

    public function index() {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $searchInput = $_POST['search'];

        $searchResults = $this->searchModel->getSearchResults($searchInput);

        $data = [

            'searchResults' => $searchResults

        ];

        $this->view("searchs/index", $data);

    }

}


?>