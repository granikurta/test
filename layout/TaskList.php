<?php use core\Library\User;

session_start();
?>
<div class="container">
    <div class="row mt-4 ">
        <div class="col-xs-12">
            <div class="form-group">
                <a class="btn btn-primary bi bi-arrow-<?php echo ($orderDirect == 'DESC' && $orderColumn == 'u.Name') ? 'up' : 'down'; ?>"
                   href="?column=u.Name&order=<?php echo ($orderDirect == 'DESC' && $orderColumn == 'u.Name') ? 'ASC' : 'DESC'; ?>"
                   role="button">Name</a>
                <a class="btn btn-primary bi bi-arrow-<?php echo ($orderDirect == 'DESC' && $orderColumn == 'u.Email') ? 'up' : 'down'; ?>"
                   href="?column=u.Email&order=<?php echo ($orderDirect == 'DESC' && $orderColumn == 'u.Email') ? 'ASC' : 'DESC'; ?>"
                   role="button">Email</a>
                <a class="btn btn-primary bi bi-arrow-<?php echo ($orderDirect == 'DESC' && $orderColumn == 't.Status') ? 'up' : 'down'; ?>"
                   href="?column=t.Status&order=<?php echo ($orderDirect == 'DESC' && $orderColumn == 't.Status') ? 'ASC' : 'DESC'; ?>"
                   role="button">Status</a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <?php foreach ($tasks->getEntity() as $key => $task): ?>
                <div class="card mt-5">
                    <h5 class="card-header">
                        <?php print $task->getLabelByStatus(); ?>
                    </h5>
                    <div class="card-body">
                        <h5 class="card-title"><?php print $task->getTitle(); ?></h5>
                        <p class="card-text"><?php print $task->getBody(); ?></p>
                        <p class="card-text "><small class="text-muted">Email
                                : <?php print $task->getOwnerEmail(); ?></small>
                        </p>
                        <?php if (!User::isGuest()) : ?>
                            <a href="/task/<?php print $task->getId(); ?>" class="btn btn-primary">Edit</a>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

        <nav>
            <ul class="pagination">
                <?php foreach ($tasks->getUrlPages() as $page => $url): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $url; ?>"> <?php echo $page; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>