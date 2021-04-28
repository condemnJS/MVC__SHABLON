<?php extendsLayout('layouts/adminLayout') ?>

<?php sectionTemplate(); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-3">Все Портфолио</h2>
        <a href="/admin/portfolios/create" class="btn btn-success mt-3">Создать портфолио</a>
    </div>
    <div class="mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Year</th>
                    <th scope="col">Description</th>
                    <th scope="col">Site</th>
                    <th scope="col">Buttons</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($portfolios as $key => $value): ?>
                    <tr>
                        <th scope="row"><?php echo $value['id'] ?></th>
                        <td><?php echo $value['year'] ?></td>
                        <td><?php echo $value['description'] ?></td>
                        <td><a href="<?php echo $value['site'] ?>"><?php echo $value['site'] ?></a></td>
                        <td>
                            <a href="/admin/portfolios/<?php echo $value['id'] ?>/delete"><i class="fas fa-trash bg-danger" style="padding: 10px; cursor:pointer; color: #fff; border-radius: 6px;"></i></a>
                            <a><i class="fas fa-edit bg-primary" style="padding: 10px; cursor:pointer; color: #fff; border-radius: 6px;"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php endSectionTemplate(); ?>


