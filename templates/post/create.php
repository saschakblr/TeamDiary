<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <!-- //* Container to edit post -->
    <div class="editPostContainer mx-auto w-50">
        <!-- //* Inputfields to fill in values into the post -->
        <form action="/post/doCreate" method="post">
            <div class="input-group mb-3">
                <input name="title" type="text" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input name="length" type="number" class="form-control" placeholder="Length (in hours)" aria-label="Length" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3" id="textarea"> 
                <textarea name="description" class="form-control" placeholder="Decription" aria-label="With textarea"></textarea>
            </div>


            <!-- //* Buttons to abort and submit changes -->
            <div class="text-center">
                <a href="#">
                    <button name="reset" type="reset" class="btn btn-danger">Cancel</button>
                </a>
                <a href="#">
                    <button name="send" type="submit" class="btn btn-success">Submit</button>
                </a>
            </div>
        </form>
    </div>
</div>
