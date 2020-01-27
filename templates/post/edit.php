<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <!-- //* Container to edit post -->
    <div class="editPostContainer mx-auto w-50">
        <!-- //* Inputfields to fill in values into the post -->
            <form action="/post/doSave" class="d-inline" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" value="<?= $post->title ?>" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="number" name="length" class="form-control" value="<?= $post->length ?>" placeholder="Length" aria-label="Length" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" id="textarea"> 
                    <textarea class="form-control" name="description" placeholder="Decription" aria-label="With textarea"><?= $post->description ?></textarea>
                </div>


                <!-- //* Buttons to abort and submit changes -->
                <div class="text-center">
                <input type="hidden"  value="<?= $post->id ?>" />
                <button type="submit" name="reset" class="btn btn-danger">Cancel</button>
                <input type="hidden" name="saveId" value="<?= $post->id ?>" />
                <button type="submit" name="save" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
