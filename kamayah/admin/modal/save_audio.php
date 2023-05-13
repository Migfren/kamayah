<?php
 include('../function/db.php');


    if ($_SESSION['nonce'] === $_POST['nonce'] && !empty($_FILES['payload'])) {
        $info = pathinfo($_FILES['payload']['name']);
        $fname = $_FILES['payload']['tmp_name'];



        $sql = mysqli_query($con, "SELECT * FROM common_phrases
        ORDER BY phrase_id DESC
        LIMIT 1;");
        $arr = mysqli_fetch_array($sql);
        $new_name = $arr['phrase_id']+1;
        $filename = 'rec'.$new_name;

        // new file must be less than 10mb
        if (filesize($fname) < 10 * pow(1024, 2))
            move_uploaded_file($fname, "../uploads/audio/$filename.wav");
        $_SESSION['nonce'] = '';
    }

    exit;
?>


