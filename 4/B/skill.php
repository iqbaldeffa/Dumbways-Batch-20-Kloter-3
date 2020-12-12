<?php
require("functions.php");


$data = query("SELECT * FROM skill_tb ");


?>

<h1 class="header">SKILL</h1>

<div>

    <?php foreach ($data as $input) : ?>

</div>




<div class="container">
    <div class="row float-left ml-5 sm-5">
        <div class="card mt-5 " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title font-weight-bold text-uppercase text-center">ID : <?= $input["user_id"]; ?></h5>
                <p class="card-text text-capitalize"><?= $input["name_skill"]; ?></p>

            </div>
            <div class="card-body m-auto">

                <a type="submit" class="btn btn-primary" name="submit" href="edit_skill.php?id=<?= $input['id'] ?>">EDIT</a>

                <a type="submit" class="btn btn-primary" name="submit" href="delete_skill.php?id=<?= $input['id'] ?>" onclick="return confirm('ingin menghapus data ini?');">DELETE</a>
            </div>
        </div>
    </div>
</div>


<?php endforeach; ?>

</body>

</html>