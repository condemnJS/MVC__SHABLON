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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <i class="fas fa-trash"></i>
                        <i class="fas fa-edit"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php endSectionTemplate(); ?>


