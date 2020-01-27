<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <!-- //* Button to edit the profile -->
    <div class="btnContainer">
        <form action="/user/doEdit" class="d-inline" name="edit" method="post">
            <input type="hidden" name="editId" value="<?= $user->id ?>">
            <button type="submit" class="btn btn-secondary rightBtn">Edit Profile</button>
        </form>
    </div>
    <!-- //* Container to Display user information -->
    <div class="userProfile mx-auto">
        <div class="bigAvatar"></div>
        <div class="profileInfo">
            <div class="infoRow"><strong>Firstname: </strong>Max</div>
            <div class="infoRow"><strong>Lastname: </strong>Mustermann</div>
            <div class="infoRow"><strong>Email: </strong>max.mustermann@gmail.com</div>
        </div>
    </div>
    <!-- //* Cards to display the posts -->
    <div class="postCard mx-auto">
        <div class="cardHead row">
            <!-- //* Title and legth of the post -->
            <div class="col">
                <h2>Title of the Post</h2>
                <span>2 Hours</span>
            </div>
            <!-- //* Avatar and info about the user -->
            <div class="col right-action d-flex">
                <div class="flex-fill profilePicCont">
                    <div class="profilePic"></div>
                </div>
                <div class="flex-fill align-middle">
                    <strong id="userNameDisplay">
                        Max Mustermann
                    </strong>
                    <br>
                    <span class="unitDisplay">
                        Marketing
                    </span>
                    <br>
                    <span class="creationTimeDisplay">
                        Created at: 20.1.2020
                    </span>
                </div>
            </div>
        </div>
        <hr>
        <!-- //* Body of the post -->
        <div class="postDescription">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
        <!-- //* Buttons to edit and delete the post -->
        <div class="postFooterCont">
            <div>
                <a href="#">
                    <button type="button" class="btn btn-primary">Edit</button>
                </a>
                <a href="#">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>