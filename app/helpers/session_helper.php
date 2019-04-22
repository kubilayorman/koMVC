<?php
session_start();

function flashMessage($nameOfMessage = '', $theMessage = '', $class='session-helper') {

    if($nameOfMessage) {
        if(isset($theMessage) && empty($_SESSION[$nameOfMessage])) {

            unset($_SESSION[$nameOfMessage]);
            unset($_SESSION[$nameOfMessage . "_class"]);

            $_SESSION[$nameOfMessage] = $theMessage;
            $_SESSION[$nameOfMessage . "_class"] = $class;

        } elseif(empty($theMessage) && isset($_SESSION[$nameOfMessage])) {

            $class = isset($_SESSION[$nameOfMessage . "_class"]) ? $_SESSION[$nameOfMessage . "_class"] : "" ;
            echo "<div class='$class' id='msg-flash'>$_SESSION[$nameOfMessage]</div>";
            unset($_SESSION[$nameOfMessage]);
            unset($_SESSION[$nameOfMessage. "_class"]);

        }
    }
}

function isLoggedIn() {

    if(isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

?>