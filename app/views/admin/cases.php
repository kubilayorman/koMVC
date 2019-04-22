<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

    <?php flashMessage("add_case_success"); ?>
    <?php flashMessage("add_case_restricted"); ?>
    <?php flashMessage("case_deleted"); ?>
    <?php flashMessage("case_delete_notsuccessful"); ?>
    
    <?php flashMessage("case_edit_notallowed"); ?>
    <?php flashMessage("case_update_notallowed"); ?>


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

                <?php 
                
                //$case_array_counter = 0;
                
                foreach ($data['cases'] as $cases) { 
                    
                    // $_SESSION["case_id_time"] = $cases->id;

                    ?>
                    <tr class="table__row table__row--data">
                        <td class="table__cell"><?php echo $cases->id; ?></td>
                        <td class="table__cell"><?php echo $cases->user_id; ?></td>
                        <td class="table__cell"><?php echo $cases->title; ?></td>
                        <td class="table__cell"><?php echo $cases->body; ?></td>
                        <td class="table__cell"><?php echo $cases->created_at; ?></td>
                        <td class="table__cell">
                        <?php if($cases->user_id == $_SESSION['user_id']) { ?>
                            <a href="<?php echo URLROOT; ?>/cases/edit/<?php echo $cases->id; //echo $_SESSION["case_id_time"]; ?>" class="table__menubtn">
                                <i class="feature-box__icon icon-basic-elaboration-todolist-pencil"></i>
                            </a>
                        <?php } ?>
                        </td>
                        <td class="table__cell">
                        <?php if($cases->user_id == $_SESSION['user_id']) { ?>
                            <form action="<?php echo URLROOT; ?>/cases/deletecase/<?php echo $cases->id; //echo $_SESSION["case_id_time"]; ?>" method="post">
                                <button type="submit" class="table__menubtn" id="delete">
                                    <i class="feature-box__icon icon-basic-elaboration-todolist-remove"></i>
                                </button>
                            </form>
                        <?php } 
                        //var_dump($_SESSION["case_id_time"]);
                        //$case_array_counter = $case_array_counter + 1;
                        ?>
                        </td>
                    </tr>
                <?php } ?>
        </table>

    </div>

</div>

<?php require APPROOT . "/views/inc/footer.php"; ?>