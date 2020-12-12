<?php
require("header.php");
$conn = mysqli_connect("localhost", "root", "", "dw_programmer");



function query($query)
{

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function add_user($data)
{
    global $conn;

    $name_user = htmlspecialchars($data["name_user"]);

    $photo = upload();
    if ($photo === false) {

        return false;
    }



    $query = "INSERT INTO users_tb VALUES
    ('', '$name_user','$photo')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $fileName = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];



    if ($error === 4) {
        echo "<script>
                alert('Masukan gambar terlebih dahulu!!')
                </script>";
        return false;
    }


    $ekstensiFileValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $fileName); // akan berubah ['name', 'jpg']
    $ekstensiFile2 = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile2, $ekstensiFileValid)) {
        //in_array untuk mencari ( string di dalam array (string,array) menghasilkan true/false)
        echo "<script>
        alert('Yang anda upload tidak sesuai!!')
        </script>";
        return false;
    }


    if ($fileSize > 2000000) {

        echo "<script>
                alert('gambar terlalu besar!! MAX 2mb')
                </script>";
        return false;
    }


    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $ekstensiFile2;

    move_uploaded_file($tmpName, 'img/' . $newFileName);

    return $newFileName;
}



function add_skill($data)
{
    global $conn;

    $name_skill = htmlspecialchars($data["name_skill"]);
    $user_id = htmlspecialchars($data["user_id"]);

    $query = "INSERT INTO skill_tb VALUES
    ('', '$name_skill', '$user_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function edit_user($data)
{
    global $conn;

    $id = $data["id"];
    $name_user = htmlspecialchars($data["name_user"]);
    $oldPhoto = $data["oldPhoto"];

    //cek apakah user upload gambar baru atau tidak
    if ($_FILES['photo']['error'] === 4) {
        $photo = $oldPhoto;
    } else {
        $photo = upload();
    }


    $query = "UPDATE users_tb SET
    id = '$id',
    name_user = '$name_user',
    photo = '$photo'
    
    WHERE id = $id
";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function edit_skill($data)
{
    global $conn;

    $id = $data["id"];
    $name_skill = htmlspecialchars($data["name_skill"]);
    $user_id = htmlspecialchars($data["user_id"]);

    $query = "UPDATE skill_tb SET
    id = '$id',
    name_skill = '$name_skill',
    user_id = '$user_id'
    
    WHERE id = $id
";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete_user($id)
{

    global $conn;
    mysqli_query($conn, " DELETE FROM users_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function delete_skill($id)
{

    global $conn;
    mysqli_query($conn, " DELETE FROM skill_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}
