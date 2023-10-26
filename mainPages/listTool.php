<?php
include '../conn/conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../boot5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="../boot5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include '.../banner/banner1.php'; ?>
    <div class="container" style="margin-top: 15rem;">
        <div class="col-md-12">
            <h3>รายการทั้งหมด</h3>
            <hr>
            <div class="row">
                <?php
                include 'myClass.php';
                $obj = new MyClass;
                include 'link.php';
                $stmt = $coon->prepare(" SELECT* FROM main_tool ORDER BY tool_id DESC LIMIT 0,20 ");
                $stmt->execute();
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    if ($r["tool_img"] == "") {
                        $toolImg = '../images/imgTool/noImg.jpeg';
                    } else {
                        $toolImg = $link . $r["tool_img"];
                    }

                    if ($r["tool_id_user"] == 0) {
                        $toolIdUser = 'ส่วนกลาง';
                    } else {
                        $toolIdUser = $obj->nameUser($r["tool_id_user"]);
                    }
                ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="imgFix">
                                <img class="card-img-top" src="<?= $toolImg ?>" alt="<?= $r["tool_ad1"] ?>">
                            </div>
                            <div class="card-body">
                                <p class="card-text cardText">
                                    <b>เลขครุภัณฑ์ : </b> <?= $r["tool_as"] ?> <br>
                                    <b>ชื่อครุภัณฑ์ :</b> <?= $r["tool_ad1"] ?> <br>
                                    <b>ที่ตั้ง : </b> <?= $obj->nameRoom($r["tool_id_room"])  ?> <br>
                                    <b>ผู้ครอบครอง : </b> <?= $toolIdUser  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>