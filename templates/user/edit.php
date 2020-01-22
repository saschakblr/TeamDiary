<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <!-- //* FileUploader for the avatar -->
    <div class="bigAvatar mx-auto mb-4"></div>
    <div class="input-group mb-3 w-50 mx-auto">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile02">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
        </div>
    </div>
    <!-- //* Container to edit user information -->
    <div class="editProfileContainer mx-auto w-50">
        <!-- //* Inputfields to edit the name and email -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Name" aria-label="name" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
        </div>
        <!-- //* Two input fields to change the password -->
        <strong>Change password:</stronng>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Repeat Password" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <!-- //* Checkbox to delete the profile -->
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Delete Profile (Cannot be undone!)
                </label>
            </div>
        </div>
        <!-- //* Buttons to abort and submit changes -->
        <div class="text-center">
            <a href="#">
                <button type="submit" class="btn btn-danger">Cancel</button>
            </a>
            <a href="#">
                <button type="reset" class="btn btn-success">Submit</button>
            </a>
        </div>
    </div>
</div>