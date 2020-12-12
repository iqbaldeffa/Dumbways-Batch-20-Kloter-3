<?php
require("functions.php");

if (isset($_POST["submit"])) {

    if (add_skill($_POST) > 0) {

        echo "
        <script>
        alert('data berhasil ditambah!');
        document.location.href = 'skill.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal ditambah!');
        document.location.href = 'skill.php';
        </script>
        ";
    }
}
?>
<h1 class="header">ADD SKILL</h1>



<div class="container">
    <div class="row">
        <div class="col">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data["id"]; ?>">

                <div class="input-group mt-5 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name_skill">NAME SKILL</label>
                    </div>
                    <input type="text" class="form-control" name="name_skill" id="name_skill" autofocus>
                </div>

                <div class="form-group mt-5">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="user_id">ID</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" rows="3">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-5" name="submit" onclick="return confirm('ingin menambah data ini?');">SUBMIT</button>
            </form>
        </div>
    </div>
</div>







</body>

</html>