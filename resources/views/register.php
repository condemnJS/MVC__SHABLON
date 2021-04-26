<?php

extendsLayout('layouts/layout') ?>


<?php sectionTemplate(); ?>
<div class="container">
    <h2 class="mt-3">Регистрация</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="fio" class="form-label">FIO</label>
            <input type="text" name="fio" class="form-control <?php echo hasError('fio') ? 'is-invalid' : '' ?>" id="fio">
            <?php if(hasError('fio')): ?>
                <div class="text-danger">
                    <?php echo error('fio') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control <?php echo hasError('email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="emailHelp">
            <?php if(hasError('email')): ?>
                <div class="text-danger">
                    <span><?php echo error('email') ?></span>  
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control <?php echo hasError('password') ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
            <?php if(hasError('password')): ?>
                <div class="text-danger">
                    <span><?php echo error('password') ?></span>  
                </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
<?php endSectionTemplate(); ?>


