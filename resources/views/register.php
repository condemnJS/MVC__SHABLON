<?php extendsLayout('layout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <h2 class="mt-3">Регистрация</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="fio" class="form-label">FIO</label>
            <input type="text" name="fio" class="form-control" id="fio" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
<?php endSectionTemplate(); ?>


