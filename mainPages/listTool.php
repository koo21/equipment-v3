<?php
session_start();
include '../conn/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php include '../title-footer/title.php'; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/banner.css">
    <link rel="stylesheet" href="../boot5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="../boot5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include '../banner/banner1.php'; ?>
    <div class="container" style="margin-top: 15rem;">
        <div class="col-md-12">
            <h3>รายการทั้งหมด</h3>
            <div class="btnSearch text-end ">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSearch">
                    <i class="bi bi-search"></i> ค้นหาครุภัณฑ์
                </button>
            </div>

            <hr>
            <div class="row">
                <?php

                include 'myClass.php';
                $obj = new MyClass;
                include 'link.php';

                $np = $coon->prepare(" SELECT* FROM main_tool ORDER BY tool_id DESC ");
                $np->execute();
                $Num_Rows = $np->rowCount();


                $Per_Page = 112;   // Per Page

                $Page = $_GET["Page"];
                if (!$_GET["Page"]) {
                    $Page = 1;
                }

                $Prev_Page = $Page - 1;
                $Next_Page = $Page + 1;

                $Page_Start = (($Per_Page * $Page) - $Per_Page);
                if ($Num_Rows <= $Per_Page) {
                    $Num_Pages = 1;
                } else if (($Num_Rows % $Per_Page) == 0) {
                    $Num_Pages = ($Num_Rows / $Per_Page);
                } else {
                    $Num_Pages = ($Num_Rows / $Per_Page) + 1;
                    $Num_Pages = (int)$Num_Pages;
                }


                $stmt = $coon->prepare(" SELECT* FROM main_tool ORDER BY tool_id DESC LIMIT $Page_Start , $Per_Page ");
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

                    if ($r["tool_sta"] == 1) {
                        $iconStatus = 'u.png';
                    } else {
                        $iconStatus = 'n.png';
                    }
                ?>
                    <div class="col-md-3 mb-3 ">
                        <div class="card">
                            <div class="cardFixSize">
                                <div class="imgFix">
                                    <div class="iconStatus"><img src="../images/<?= $iconStatus ?>" alt="" srcset=""></div>
                                    <img class="card-img-top" src="<?= $toolImg ?>" alt="<?= $r["tool_ad1"] ?>">
                                </div>
                                <div class="card-body cardBk">
                                    <p class="card-text cardText">
                                        <b>เลขครุภัณฑ์ : </b> <?= $r["tool_as"] ?> <br>
                                        <b>ชื่อครุภัณฑ์ :</b> <?= $r["tool_ad1"] ?> <br>
                                        <b>ที่ตั้ง : </b> <?= $obj->nameRoom($r["tool_id_room"]) . $r["tool_id_room"] ?>
                                        <br>
                                        <b>ผู้ครอบครอง : </b> <?= $toolIdUser  ?> <br>
                                        <b>หน่วยงานที่รับผิดชอบ : </b> <?= $obj->checkTool($r["tool_check"]) ?>
                                    </p>
                                    <div class="text-center">
                                        <a class="btn btn-warning btn-sm" href="edit.php?id=<?= $r["tool_id"] ?>" role="button"><i class="bi bi-pencil-square"></i> แก้ไขข้อมูล</a>

                                        <a class="btn btn-secondary btn-sm" href="detailTool.php?id=<?= $r["tool_id"] ?>" role="button"><i class="bi bi-door-open"></i> รายละเอียด</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="boxNumPage"> <b>หน้า</b> :
                <?php
                if ($Prev_Page) {
                    echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
                }

                for ($i = 1; $i <= $Num_Pages; $i++) {
                    if ($i != $Page) {
                        echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ";
                    } else {
                        echo "<b> $i </b>";
                    }
                }
                if ($Page != $Num_Pages) {
                    echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>>></a> ";
                }
                ?>
            </div>

        </div>
    </div>
    <?php include 'modalSearch.php'; ?>
    <?php include '../title-footer/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>

</html>