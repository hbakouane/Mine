<div class="card">
    <div class="card-header">
        <h3>Register</h3>
    </div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo getClass('name', 'is-valid', 'is-invalid'); ?>" value="<?php echo keep('name'); ?>">
                <small class="text-danger"><?php echo error('name') ?></small>
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input name="email" class="form-control <?php echo getClass('email', 'is-valid', 'is-invalid'); ?>" value="<?php echo keep('email'); ?>">
                <small class="text-danger"><?php echo error('email') ?></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo getClass('password', 'is-valid', 'is-invalid'); ?>" value="<?php echo keep('password'); ?>">
                <small class="text-danger"><?php echo error('password') ?></small>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirm" class="form-control <?php echo getClass('password_confirm', 'is-valid', 'is-invalid'); ?>" value="<?php echo keep('password_confirm'); ?>">
                <small class="text-danger"><?php echo error('password_confirm') ?></small>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
            if (isset($name_error)) {
                echo $name_error;
            }
        ?>
    </div>
</div>