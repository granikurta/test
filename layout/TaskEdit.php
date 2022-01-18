<div class="container">
    <div class="row mt-4 ">
        <?php if (empty($error['error']) && !empty($error['status'])) : ?>
            <div class="alert alert-success" role="alert">
                Successful task update!
            </div>
        <?php endif; ?>
        <form method="post" action="<?php print $task->getId(); ?>/update">
            <div class="form-group">
                <?php if (!empty($error['error']['title'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        Title input not valid!
                    </div>
                <?php endif; ?>
                <label for="titleInput">Title</label>
                <input type="text" name="title" class="form-control" id="titleInput"
                       value="<?php print $task->getTitle(); ?>">
            </div>

            <div class="form-group">

                <label for="bodyInput">Body</label>
                <textarea class="form-control" id="bodyInput" rows="3"
                          name="body"><?php print $task->getBody(); ?></textarea>
                <?php if (!empty($error['error']['body'])) : ?>
                    <div class="alert alert-danger" role="alert">
                        Body input not valid!
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status"
                       id="statusCheckInput" <?php echo $task->getStatus() == 1 ? 'checked' : '' ?>>
                <label class="form-check-label" for="statusCheckInput">Completed</label>
            </div>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
</div>