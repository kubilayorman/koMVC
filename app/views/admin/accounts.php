<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<?php require APPROOT . "/views/inc/admin_navbar.php"; ?>

<div class="container">

    <?php flashMessage("register_success"); ?>
    <?php flashMessage("delete_notsuccessful"); ?>
    <?php flashMessage("edit_notallowed"); ?>
    <?php flashMessage("update_notallowed"); ?>

    <div class="content__newaccount">
        <p class="content-top__head--headtitle"><?php // echo $requested_page_title; ?></p>

        <a href="<?php echo URLROOT; ?>/users/register" class="content__newaccount--btn">
            <i class="feature-box__icon icon-basic-elaboration-document-plus"></i>
        </a>
    </div>

    <div class="content">

        <table class="table">
                <div class="table__yellow">
                    <tr class="table__row table__row--header">
                        <th class="table__cell table__title">Account Number</th>
                        <th class="table__cell table__title">Account Date</th>
                        <th class="table__cell table__title">Account Name</th>
                        <th class="table__cell table__title">Account Email</th>
                        <th class="table__cell table__title">Edit Account</th>
                        <th class="table__cell table__title">Delete Account</th>
                    </tr>
                </div>

                <?php foreach ($data['accounts'] as $account) { ?>
                    <tr class="table__row table__row--data">
                        <td class="table__cell"><?php echo $account->id; ?></td>
                        <td class="table__cell"><?php echo $account->created_at; ?></td>
                        <td class="table__cell"><?php echo $account->name; ?></td>
                        <td class="table__cell"><?php echo $account->email; ?></td>
                        <td class="table__cell">
                        <?php if($account->id == $_SESSION['user_id']) { ?>
                            <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $account->id; ?>" class="table__menubtn">
                                <i class="feature-box__icon icon-basic-elaboration-todolist-pencil"></i>
                            </a>
                        <?php } ?>
                        </td>
                        <td class="table__cell">
                        <?php if($account->id == $_SESSION['user_id']) { ?>
                            <form action="<?php echo URLROOT; ?>/users/deleteuser/<?php echo $account->id; ?>" method="post">
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