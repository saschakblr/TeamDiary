<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <form action="/user/doSave" class="d-inline" method="post" enctype="multipart/form-data">
        <!-- //* FileUploader for the avatar -->
        <div class="input-group mb-3 w-50 mx-auto">
            <div class="custom-file">
                <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
        </div>
        <!-- //* Container to edit user information -->
        <div class="editProfileContainer mx-auto w-50">
            <!-- //* Inputfields to edit the name and email -->
            <input type="hidden" value="<?= $user->id ?>" />
            <div class="input-group mb-3">
                <input type="text" name="firstName" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="basic-addon1" value="<?=$user->firstname;?>">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="name" aria-describedby="basic-addon1" value="<?=$user->name;?>">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="<?=$user->email;?>">
            </div>
            <div class="input-group mb-3">
                
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose from the following.</option>
                        <?php foreach($units as $unit): ?>
                            <option value="<?=$unit->id;?>"><?=$unit->name;?></option>
                        <?php endforeach ?>                        
                    </select>
                </div>
            </div>
            <!-- //* Buttons to abort and submit changes -->
            <div class="text-center">
                <input type="hidden" value="<?= $user->id ?>" />
                <button type="submit" name="reset" class="btn btn-danger">Cancel</button>
                <input type="hidden" name="saveId" value="<?= $user->id; ?>" />
                <button type="submit" name="save" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>