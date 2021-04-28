<?php extendsLayout('layouts/adminLayout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-3">Все Новости</h2>
        <a href="/admin/news/create" class="btn btn-success mt-3">Создать новость</a>
    </div>
    <div class="mt-3 row">
        <?php foreach ($news as $key => $value): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card mt-3">
                    <img class="card-img-top" src="http://project/storage/<?php echo $value['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['title']; ?></h5>
                        <p class="card-text"><?php echo $value['description'] ?></p>
                        <div class="d-flex justify-content-center">
                            <div>
                                <a href="/admin/news/<?php echo $value['id'] ?>/delete"><i class="fas fa-trash bg-danger" style="padding: 10px; cursor:pointer; color: #fff; border-radius: 6px;"></i></a>
                                <a href="/admin/news/<?php echo $value['id'] ?>/edit"><i class="fas fa-edit bg-primary" style="padding: 10px; cursor:pointer; color: #fff; border-radius: 6px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endSectionTemplate(); ?>


