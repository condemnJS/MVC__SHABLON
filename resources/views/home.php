<?php extendsLayout('layouts/layout') ?>

<?php sectionTemplate(); ?>
    <div>
        <div class="container">
            <h1 class="mt-3">Новости</h1>
            <div>
                <?php foreach ($news as $key => $value): ?>
                    <div class="mb-3">
                        <div class="card bg-dark text-white">
                            <img src="http://project/storage/<?php echo $value['image'] ?>" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title" style="font-size: 50px;"><?php echo $value['title'] ?></h5>
                                <p class="card-text" style="font-size: 20px;"><?php echo $value['description'] ?></p>
                            </div>
                        </div>
                        <div>
                            <div class="form-group mt-3">
                                <strong>Комментарии</strong>
                                <textarea name="text" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mt-3">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endSectionTemplate(); ?>

