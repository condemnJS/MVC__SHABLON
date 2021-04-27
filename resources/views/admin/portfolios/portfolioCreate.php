<?php extendsLayout('layouts/adminLayout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <?php if(hasSession('message')): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?php echo flash('message'); ?>
        </div>
    <?php endif; ?>
    <h2 class="mt-3">Создать портфолио</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="">Дата</label>
            <input type="date" name="year" class="form-control <?php echo hasError('year') ? 'is-invalid' : '' ?>">
            <?php if(hasError('year')): ?>
                <div class="text-danger">
                    <span><?php echo error('year') ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group mt-2">
            <label for="">Описание</label>
            <textarea name="description" cols="30" rows="10" class="form-control <?php echo hasError('description') ? 'is-invalid' : '' ?>"></textarea>
            <?php if(hasError('description')): ?>
                <div class="text-danger">
                    <span><?php echo error('description') ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="d-flex mt-2 flex-column">
            <label for="">Сайт</label>
            <input type="text" name="site" class="form-control mt-2 <?php echo hasError('site') ? 'is-invalid' : '' ?>">
            <?php if(hasError('site')): ?>
                <div class="text-danger">
                    <span><?php echo error('site') ?></span>
                </div>
            <?php endif; ?>
        </div>
        <input type="submit" value="Создать" class="btn btn-success mt-3">
    </form>
</div>
<?php endSectionTemplate(); ?>


