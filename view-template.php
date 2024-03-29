<?php
if ( isset( $email ) ) {
	?>
    <tr class="odd gradeX" id="row<?php echo $id; ?>">
<!--        <td><input type="checkbox" id="del_--><?php //echo $id; ?><!--"></td>-->
        <td id="id_val<?php echo $id; ?>"><?php echo $id; ?></td>
        <td id="lname_val<?php echo $id; ?>"><?php echo $lname; ?></td>
        <td id="fname_val<?php echo $id; ?>"><?php echo $fname; ?></td>
        <td id="gender_val<?php echo $id; ?>"><?php echo $gender; ?></td>
        <td id="email_val<?php echo $id; ?>"><?php echo $email; ?></td>
        <td id="password_val<?php echo $id; ?>"><?php echo $password; ?></td>
        <td id="address_val<?php echo $id; ?>"><?php echo $address; ?></td>
        <td id="lang_val<?php echo $id; ?>"><?php echo $lang; ?></td>
        <td id="status_val<?php echo $id; ?>"><?php echo $status; ?></td>
        <td class="center">
            <div class="btn-group-xs">

                <button title="Edit" type="button" class="btn btn-xs btn-primary" id="edit_button<?php echo $id; ?>"
                        onclick="edit_row('<?php echo $id; ?>');"><i
                            class="fa fa-edit"></i></button>

                <button title="Save" type="button" style="display:none;" class="btn btn-xs btn-primary"
                        id="save_button<?php echo $id; ?>"
                        onclick="save_row('<?php echo $id; ?>');"><i
                            class="fa fa-save"></i></button>

                <button title="Delete" type="button" class="btn btn-xs btn-danger" id="delete_button<?php echo $id; ?>"
                        onclick="delete_row('<?php echo $id; ?>');"><i
                            class="fa fa-trash"></i></button>

				<?php if ( $status === 'Deactive' ) {
					?>
                    <button title="Active" style="display:inline-block;" type="button" class=" btn btn-xs btn-warning"
                            id="active_button<?php echo $id; ?>"
                            onclick="active_row('<?php echo $id; ?>');"><i
                                class="fa fa-check"></i></button>
					<?php
				} else {
				?>
                <button title="Deactive" type="button" class=" btn btn-xs btn-warning"
                        id="deactive_button<?php echo $id; ?>"
                        onclick="deactive_row('<?php echo $id; ?>');"><i
                            class="fa fa-ban"></i>
					<?php } ?>
            </div>
        </td>
    </tr>
<?php } else if ( isset( $hospital_admin_name ) ) { ?>

    <tr class="odd gradeX" id="row<?php echo $id; ?>">
<!--        <td><input type="checkbox" id="del_--><?php //echo $id; ?><!--"></td>-->
        <td></td>
        <td id="id_val<?php echo $id; ?>"><?php echo $id; ?></td>
        <td id="password_val<?php echo $id; ?>"><?php echo $password; ?></td>
        <td id="name_val<?php echo $id; ?>"><?php echo $name; ?></td>
        <td id="address_val<?php echo $id; ?>"><?php echo $address; ?></td>
        <td id="hosadmin_val<?php echo $id; ?>"><?php echo $hospital_admin_name; ?></td>
        <td id="hosadminemail_val<?php echo $id; ?>"><?php echo $hospital_admin_email; ?></td>
        <td id="status_val<?php echo $id; ?>"><?php echo $status; ?></td>
        <td class="center">
            <div class="btn-group-xs">

                <button title="Edit" type="button" class="btn btn-xs btn-primary" id="edit_button<?php echo $id; ?>"
                        onclick="edit_row_hos('<?php echo $id; ?>');"><i
                            class="fa fa-edit"></i></button>

                <button title="Save" type="button" style="display:none;" class="btn btn-xs btn-primary"
                        id="save_button<?php echo $id; ?>"
                        onclick="save_row_hos('<?php echo $id; ?>');"><i
                            class="fa fa-save"></i></button>

                <button title="Delete" type="button" class="btn btn-xs btn-danger" id="delete_button<?php echo $id; ?>"
                        onclick="delete_row_hos('<?php echo $id; ?>');"><i
                            class="fa fa-trash"></i></button>


				<?php if ( $status === 'Deactive' ) {
					?>
                    <button title="Active" style="display:inline-block;" type="button" class=" btn btn-xs btn-warning"
                            id="active_button<?php echo $id; ?>"
                            onclick="active_row_hos('<?php echo $id; ?>');"><i
                                class="fa fa-check"></i></button>
					<?php
				} else {
				?>
                <button title="Deactive" type="button" class=" btn btn-xs btn-warning"
                        id="deactive_button<?php echo $id; ?>"
                        onclick="deactive_row_hos('<?php echo $id; ?>');"><i
                            class="fa fa-ban"></i>
					<?php } ?>
            </div>
        </td>
    </tr>

<?php }

else if ( isset( $gen_specialty ) ) { ?>
        <tr class="odd gradeX" id="row<?php echo $id; ?>">
        <td><input type="checkbox" id="del_<?php echo $id; ?>"></td>
        <td id="id_val<?php echo $id; ?>"><?php echo $id; ?></td>
        <td id="name_val<?php echo $id; ?>"><?php echo $name; ?></td>
        <td id="gen_val<?php echo $id; ?>"><?php echo $gen_specialty; ?></td>
        <td class="center">
            <div class="btn-group-xs">

                <button title="Edit" type="button" class="btn btn-xs btn-primary" id="edit_button<?php echo $id; ?>"
                        onclick="edit_row_gen('<?php echo $id; ?>');"><i
                            class="fa fa-edit"></i></button>

                <button title="Save" type="button" style="display:none;" class="btn btn-xs btn-primary"
                        id="save_button<?php echo $id; ?>"
                        onclick="save_row_gen('<?php echo $id; ?>');"><i
                            class="fa fa-save"></i></button>

                <button title="Delete" type="button" class="btn btn-xs btn-danger" id="delete_button<?php echo $id; ?>"
                        onclick="delete_row_gen('<?php echo $id; ?>');"><i
                            class="fa fa-trash"></i></button>

            </div>
        </td>
    </tr>

<?php }

 else if ( isset( $accepted_ins ) ) { ?>
    <tr class="odd gradeX" id="row<?php echo $id; ?>">
<!--        <td><input type="checkbox" id="del_--><?php //echo $id; ?><!--"></td>-->
        <td></td>
        <td id="id_val<?php echo $id; ?>"><?php echo $id; ?></td>
        <td id="lname_val<?php echo $id; ?>"><?php echo $lname; ?></td>
        <td id="fname_val<?php echo $id; ?>"><?php echo $fname; ?></td>
        <td id="gender_val<?php echo $id; ?>"><?php echo $gender; ?></td>
        <td id="degree_val<?php echo $id; ?>"><?php echo $degree; ?></td>
        <td id="accept_ins_val<?php echo $id; ?>"><?php echo $accepted_ins; ?></td>
        <td id="specific_specialty_val<?php echo $id; ?>"><?php echo $specific_specialty; ?></td>
        <td id="office_hours_val<?php echo $id; ?>"><?php echo $office_hours; ?></td>
        <td id="lang_val<?php echo $id; ?>"><?php echo $lang; ?></td>
        <td id="hosname_val<?php echo $id; ?>"><?php echo $hosname; ?></td>
        <td class="center">
            <div class="btn-group-xs">

                <button title="Edit" type="button" class="btn btn-xs btn-primary" id="edit_button<?php echo $id; ?>"
                        onclick="edit_row_doc('<?php echo $id; ?>');"><i
                            class="fa fa-edit"></i></button>

                <button title="Save" type="button" style="display:none;" class="btn btn-xs btn-primary"
                        id="save_button<?php echo $id; ?>"
                        onclick="save_row_doc('<?php echo $id; ?>');"><i
                            class="fa fa-save"></i></button>

                <button title="Delete" type="button" class="btn btn-xs btn-danger" id="delete_button<?php echo $id; ?>"
                        onclick="delete_row_doc('<?php echo $id; ?>');"><i
                            class="fa fa-trash"></i></button>

            </div>
        </td>
    </tr>

<?php }

 else if ( isset( $doctor ) ) { ?>
     <tr class="odd gradeX" id="row<?php echo $id; ?>">
<!--         <td><input type="checkbox" id="del_--><?php //echo $id; ?><!--"></td>-->
         <td></td>
         <td id="id_val<?php echo $id; ?>"><?php echo $id; ?></td>
         <td id="content_val<?php echo $id; ?>"><?php echo $content; ?></td>
         <td id="date_val<?php echo $id; ?>"><?php echo $date; ?></td>
         <td id="owner_val<?php echo $id; ?>"><?php echo $owner; ?></td>
         <td id="doctor_val<?php echo $id; ?>"><?php echo $doctor; ?></td>
         <td id="status_val<?php echo $id; ?>"><?php echo $status; ?></td>
         <td class="center">
             <div class="btn-group-xs">

	             <?php if ( $status === 'Deactive' ) {
		             ?>
                     <button title="Active" style="display:inline-block;" type="button" class=" btn btn-xs btn-warning"
                             id="active_button<?php echo $id; ?>"
                             onclick="active_row_comment('<?php echo $id; ?>');"><i
                                 class="fa fa-check"></i></button>
		             <?php
	             } else {
	             ?>
                 <button title="Deactive" type="button" class=" btn btn-xs btn-danger"
                         id="deactive_button<?php echo $id; ?>"
                         onclick="deactive_row_comment('<?php echo $id; ?>');"><i
                             class="fa fa-ban"></i>
		             <?php } ?>
             </div>

             </div>
         </td>
     </tr>

 <?php }