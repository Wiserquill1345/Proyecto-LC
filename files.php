<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Archivos</title>
</head>
<body>
    <a href="upload.php">&#8592;</a>
    <?php
        $sql = "SELECT * FROM files ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($res) > 0){
            while ($files = mysqli_fetch_assoc( $res )){ ?>

            <div class="alb">
                <img src="uploads/<?=$files['file_url']?>">
            </div>
        <?php }}?>
</body>
</html>