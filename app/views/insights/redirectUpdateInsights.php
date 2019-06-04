<?php 

// Redirect back to edit page but not as POST.
redirect('insights/edit/' . $_SESSION['edit_error_insight']['id']);

?>