<?php
require("functions.php");



$id = $_GET["id"];

$data = query("SELECT * FROM users_tb WHERE id=$id")[0];


if (isset($_POST["submit"])) {

    if (edit_user($_POST) > 0) {

        echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diubah!');
        document.location.href = 'user.php';
        </script>
        ";
    }
}

?>
<h1 class="header">EDIT USER</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                <input type="hidden" name="oldPhoto" value="<?= $data["oldPhoto"]; ?>">

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_user">NAME</label>
                    </div>
                    <input type="text" class="form-control" name="name_user" id="name_user" value="<?= $data["name_user"]; ?>">
                </div>


                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="photo">PHOTO</label>
                        <img width="150" src="img/<?= $data['photo'] ?>">
                    </div>
                    <input type="file" name="photo" id="photo">
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