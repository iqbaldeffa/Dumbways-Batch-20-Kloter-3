<?php
require("functions.php");

if (isset($_POST["submit"])) {

    if (add_user($_POST) > 0) {

        echo "
        <script>
        alert('data berhasil ditambah!');
        document.location.href = 'user.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambah!');
        document.location.href = 'user.php';
        </script>
        ";
    }
}
?>
<h1 class="header">ADD USER</h1>



<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_user">NAME</label>
                    </div>
                    <input type="text" class="form-control" name="name_user" id="name_user" autofocus>
                </div>

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="photo">PHOTO</label>
                    </div>
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>

                <button type="submit" class="btn btn-primary mt-5" name="submit" onclick="return confirm('ingin menambah data ini?');">SUBMIT</button>
            </form>
        </div>
    </div>
</div>







</body>

</html>