<?php
require("functions.php");

$id = $_GET['id'];


if (delete_skill($id) > 0) {

    echo "
    <script>
    alert('data berhasil dihapus!');
    document.location.href = 'skill.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus!');
    document.location.href = 'skill.php';
    </script>
    ";
}
