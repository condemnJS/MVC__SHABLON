<?php extendsLayout('layouts/adminLayout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <?php if(hasSession('message')): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?php echo flash('message'); ?>
        </div>
    <?php endif; ?>
    <h2 class="mt-3">Создать новость</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group mt-2">
            <label for="">Название</label>
            <input type="text" name="title" class="form-control <?php echo hasError('title') ? 'is-invalid' : '' ?>">
            <?php if(hasError('title')): ?>
                <div class="text-danger">
                    <span><?php echo error('title') ?></span>  
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
            <label for="">Картинка</label>
            <input type="file" name="image" class="form-control-file mt-2 <?php echo hasError('image') ? 'is-invalid' : '' ?>">
            <?php if(hasError('image')): ?>
                <div class="text-danger">
                    <span><?php echo error('image') ?></span>  
                </div>
            <?php endif; ?>
        </div>
        <input type="submit" value="Создать" class="btn btn-success mt-3">
    </form>
</div>
<?php endSectionTemplate(); ?>


