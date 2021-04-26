<?php extendsLayout('layouts/adminLayout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-3">Все Новости</h2>
        <a href="/admin/news/create" class="btn btn-success mt-3">Создать новость</a>
    </div>
    <div class="mt-3 d-flex flex-wrap justify-content-between">
        <?php foreach ($news as $key => $value): ?>
            <div class="card mt-3" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $value['image'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value['title']; ?></h5>
                    <p class="card-text"><?php echo $value['description'] ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endSectionTemplate(); ?>


