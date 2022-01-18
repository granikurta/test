<div class="container">
    <div class="row mt-4 ">
        <?php if (!empty($condition['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Warning!</h4>
                <?php foreach ($condition['error'] as $key => $error) {
                    echo $error . '<br>';
                } ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="/auth">
            <div class="form-group">
                <label for="pwd">Email address</label>
                <input type="email" class="form-control" name="email" id="pwd" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pswd" id="exampleInputPassword1"
                       placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login in</button>
        </form>
    </div>
</div>