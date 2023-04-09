<?php  function render_table($a){ ?>

<table border='1' class='table table-hover table-responsive'>
    <tr>
        <th scope='col'>#</th>

        <th scope='col' class="col col-3">name</th>

        <th scope='col' class="col col-3">Mobile</th>

        <th scope='col' class="col col-4">email</th>

        <th scope='col' class="col col-2">Actions</th>

    </tr>

    <?php $i=1;
     foreach ($a as $vals) { ?>
    <div class='modal fade' id="post<?php echo $vals['contact_id']; ?>" tabindex='-1' role='dialog'
        aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class="modal-header">
                    <h5 class="modal-title" id="post<?php echo $vals['contact_id']; ?>">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <form action='' method='POST'>

                        <input name='contact_id' type='text' value='<?php echo $vals['contact_id']; ?>' hidden>
                        <input name='name' type='text' class='form-control form-cotrol-lg m-2'
                            value='<?php echo $vals['contact_name']; ?>'>
                        <input name='phone' type='text' class='form-control form-cotrol-lg m-2'
                            value='<?php echo $vals['phone'] ; ?>'>
                        <input name='email' type='text' class='form-control form-cotrol-lg m-2'
                            value='<?php echo $vals['email']; ?>'>
                        <button name='update' class='btn btn-warning btn-lg mt-2 w-100'>update</button>
                        <button class='btn btn-primary btn-lg mt-2 w-100' data-dismiss='modal'>Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <tr>

        <td scope='row'> <?php echo $i; ?></td>

        <td> <?php echo $vals['contact_name']; ?></td>

        <td> <?php echo $vals['phone']; ?></td>

        <td> <?php echo $vals['email']; ?></td>

        <td>
            <div class='d-flex align-items-center justify-content-around'>
                <span style='cursor:pointer' data-toggle='modal' data-target='#post<?php echo $vals['contact_id']; ?>'>
                    <img src='asset/image/edit.png' />
                </span>
                <a href='?p=contact&id=<?php echo $vals['contact_id']; ?>'
                    onclick="return confirm('Are you sure you want to delete Item?')">
                    <img src='asset/image/delete.png' />
                </a>
            </div>
        </td>

    </tr>
    <?php $i++; }  ?>

</table>


<?php } ?>

<br><br>