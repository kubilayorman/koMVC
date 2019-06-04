<?php 

// Redirect back to edit page but not as POST.
redirect('cases/edit/' . $_SESSION['edit_error_case']['id']);

?>