<?php
require("functions.php");



$id = $_GET["id"];

$data = query("SELECT * FROM skill_tb WHERE id=$id")[0];


if (isset($_POST["submit"])) {

    if (edit_skill($_POST) > 0) {

        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'skill.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'skill.php';
        </script>
        ";
    }
}

?>
<h1 class="header">EDIT SKILL</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_skill">NAME</label>
                    </div>
                    <input type="text" class="form-control" name="name_skill" id="name_skill" value="<?= $data["name_skill"]; ?>">
                </div>


                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="user_id">USER ID</label>
                    </div>
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $data["user_id"]; ?>">
                </div>

                <div>
                    <button class="btn btn-primary mt-5" type="submit" name="submit" onclick="return confirm('ingin mengubah data ini?');">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>