<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

<?php 
    flashMessage("add_insight_success");
    flashMessage("add_insight_restricted"); 
    flashMessage("insight_deleted"); 
    flashMessage("insight_delete_notsuccessful"); 

    flashMessage("update_insight_successful"); 
    flashMessage("insight_edit_notsuccessful"); 
    flashMessage("update_insight_by_id_notallowed"); 
    flashMessage("update_insight_notallowed"); 
?>

    

    <div class="content">

        <table class="table">
                <div class="table__yellow">
                    <tr class="table__row table__row--header">
                        <th class="table__cell table__title">Id</th>
                        <th class="table__cell table__title">User ID</th>
                        <th class="table__cell table__title">Title</th>
                        <th class="table__cell table__title">Body</th>
                        <th class="table__cell table__title">Created At</th>
                        <th class="table__cell table__title">Edit Account</th>
                        <th class="table__cell table__title">Delete Account</th>
                    </tr>
                </div>

                <?php foreach ($data['insights'] as $insights) { ?>
                    <tr class="table__row table__row--data">
                        <td class="table__cell"><?php echo $insights->id; ?></td>
                        <td class="table__cell"><?php echo $insights->user_id; ?></td>
                        <td class="table__cell"><?php echo $insights->title; ?></td>
                        <td class="table__cell"><?php echo $insights->body; ?></td>
                        <td class="table__cell"><?php echo $insights->created_at; ?></td>
                        <td class="table__cell">
                        <?php if($insights->user_id == $_SESSION['user_id']) { ?>
                            <a href="<?php echo URLROOT; ?>/insights/edit/<?php echo $insights->id; //echo $_SESSION["case_id_time"]; ?>" class="table__menubtn">
                                <i class="feature-box__icon icon-basic-elaboration-todolist-pencil"></i>
                            </a>
                        <?php } ?>
                        </td>
                        <td class="table__cell">
                        <?php if($insights->user_id == $_SESSION['user_id']) { ?>
                            <form action="<?php echo URLROOT; ?>/insights/deleteinsight/<?php echo $insights->id; //echo $_SESSION["case_id_time"]; ?>" method="post">
                                <button type="submit" class="table__menubtn" id="delete">
                                    <i class="feature-box__icon icon-basic-elaboration-todolist-remove"></i>
                                </button>
                            </form>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
        </table>

    </div>

</div>

<?php require APPROOT . "/views/inc/footer.php"; ?>