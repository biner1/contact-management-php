


<div class="table_container d-block">

    <!-- Button trigger modal -->
    <div class="d-flex align-items-end justify-content-between">
        

        <form class="form-group" action="">
            <div class="input-group">
                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>
        </form>


        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
            data-target="#exampleModal">
            <img src="asset/image/add-user.svg" alt="" width='40'>
            Add Contact
        </button>



    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action='' method='POST'>
                    <div class="modal-body">
                        <label for="" class='my-2'>Name</label>
                        <input name='name' type='text' class='form-control form-cotrol-lg'>
                        <label for="" class='my-2'>Phone number</label>
                        <input name='phone' type='text' class='form-control form-cotrol-lg'>
                        <label for="" class='my-2'>Email</label>
                        <input name='email' type='text' class='form-control form-cotrol-lg'>

                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name='addContact'>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php 

    render_table($model);
   
    ?>



</div>