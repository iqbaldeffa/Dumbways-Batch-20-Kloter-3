<?php
require("functions.php");


$data = query("SELECT * FROM skill_tb INNER JOIN users_tb WHERE skill_tb.user_id=users_tb.id");


?>

<h1 class="header">USERS</h1>

<div>

    <?php foreach ($data as $input) : ?>

</div>




<div class="container">
    <div class="row float-left ml-5 sm-5">
        <div class="card mt-5 " style="width: 20rem;">
            <img src="img/<?= $input["photo"]; ?>" class="card-img-top" style="width: 20rem; height: 20rem">
            <div class=" card-body">
                <h5 class="card-title font-weight-bold text-uppercase text-center"><?= $input["name_user"]; ?></h5>
                <p class="card-text text-capitalize"><?= $input["name_skill"]; ?></p>
                <p class="card-text text-capitalize">ID : <?= $input["id"]; ?></p>
            </div>
            <div class="card-body m-auto">

                <a type="submit" class="btn btn-primary" name="submit" href="edit_user.php?id=<?= $input['id'] ?>">EDIT</a>

                <a type="submit" class="btn btn-primary" name="submit" href="delete_user.php?id=<?= $input['id'] ?>" onclick="return confirm('ingin menghapus data ini?');">DELETE</a>
            </div>
        </div>
    </div>
</div>


<?php endforeach; ?>

</body>

</html>