<?php 

// Redirect back to edit page but not as POST.
redirect('users/edit/' . $_SESSION['edit_error']['id']);

?>