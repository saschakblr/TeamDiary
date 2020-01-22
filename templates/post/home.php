<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <?php if (empty($posts)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Posts gefunden.</h2>
		</div>
	<?php else: ?>
        <!-- //* Button to create post -->
        <div class="btnContainer">
            <a href="#">
                <button type="button" class="btn btn-secondary rightBtn"><strong>+</strong> New Post</button>
            </a>
        </div>
        <!-- //* Cards to display the posts -->
        <?php foreach ($posts as $post): ?>
        <div class="postCard mx-auto">
            <div class="cardHead row">
                <!-- //* Title and length of the post -->
                <div class="col">
                    <h2><?= $post->title?></h2>
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
        <?php endforeach; ?>
    <?php endif; ?>
</div>