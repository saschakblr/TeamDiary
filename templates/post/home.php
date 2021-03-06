<!-- //* Container for all the main elements of the page -->
<div class="contentContainer mx-auto">
    <?php if (empty($posts)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Posts gefunden.</h2>
		</div>
        <!-- //* Button to create post -->
        <div class="btnContainer">
            <a href="/post/create">
                <button type="button" class="btn btn-secondary rightBtn"><strong>+</strong> Create Post</button>
            </a>
        </div>
    <?php else: ?>
        <!-- //* Button to create post -->
        <div class="btnContainer">
            <a href="/post/create">
                <button type="button" class="btn btn-secondary rightBtn"><strong>+</strong> New Post</button>
            </a>
        </div>
        <!-- //* Cards to display the posts -->
        <?php foreach ($posts as $post): ?>
        <div class="postCard mx-auto">
            <div class="cardHead row">
                <!-- //* Title and length of the post -->
                <div class="col">
                    <h2><?= $post->title ?></h2>
                    <span><?= ($post->length > 1) ? "$post->length Hours" : "$post->length Hour"?></span>
                </div>
                <!-- //* Avatar and info about the user -->
                <div class="col right-action d-flex">
                    <div class="flex-fill profilePicCont">
                        <img class="profilePic" src="/<?= (!empty($post->imagePath)) ? $post->imagePath : "images/defaultpic.png" ?> " alt="Profile Picture">
                    </div>
                    <div class="flex-fill align-middle">
                        <strong id="userNameDisplay">
                            <?= $post->firstName . ' ' . $post->name ?>
                        </strong>
                        <br> 
                        <span class="creationTimeDisplay">
                            Created at: <?= date_format(new DateTime($post->createdAt), 'd.m.Y'); ?>
                        </span>
                    </div>
                </div>
            </div>
            <hr />
            <!-- //* Body of the post -->
            <div class="postDescription">
                <?= $post->description ?>
            </div>
            <?php if ($post->userId == $user): ?>
                <hr />
                <!-- //* Buttons to edit and delete the post -->
                <div class="postFooterCont">
                    <div>
                        <form action="/post/doEdit" class="d-inline" name="edit" method="post">
                            <input type="hidden" name="editId" value="<?= $post->postId ?>">
                            <button value="Edit" name="edit" type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="/post/doDelete" class="d-inline" method="post">
                            <input type="hidden" name="deleteId" value="<?= $post->postId ?>">
                            <button value="Delete" name="delete" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>