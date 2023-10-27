<?php
include '../conn/conn.php';


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
    <?php include '../banner/banner1.php'; ?>
    <div class="container" style="margin-top: 15rem;">
        <div class="col-md-12">
            <h3>เพิ่มข้อมูลครุภัณฑ์ใหม่</h3>

            <form action="" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-form-label">เลขครุภัณฑ์*</label>
                        <input type="number" class="form-control" id="inputPassword" name="numberTool" placeholder="เลขครุภัณฑ์">

                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-form-label">ชื่อครุภัณฑ์*</label>
                        <input type="text" class="form-control" id="inputPassword" name="nameTool" placeholder="ชื่อครุภัณฑ์">

                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">รายละเอียดครุภัณฑ์</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detailTool"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">แหล่งเงิน</label>
                        <select name="atMoneyTool" id="" class="form-select">
                            <option value="" selected>1</option>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ปีงบประมาณ</label>
                        <input type="number" class="form-control" id="inputPassword" name="yearTool">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">วันที่รับครุภัณฑ์</label>
                        <input type="year" class="form-control" id="inputPassword" name="tool_cd">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">สถานที่ตั้ง</label>
                        <input type="text" class="form-control" id="inputPassword" name="addTool">
                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ชั้น</label>
                        <select name="roofTool" id="" class="form-select">
                            <option value="0" selected>-- เลือกชั้น --</option>
                            <?php

                            $rf = $coon->prepare(" SELECT*FROM roof_tool  ORDER BY roof_name asc");
                            $rf->execute();
                            while ($seRoof = $rf->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $seRoof["roof_id"] ?>"><?= $seRoof["roof_name"] ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ชื่อห้อง</label>
                        <select name="roomTool" id="" class="form-select">
                            <option selected>-- เลือกห้อง --</option>
                            <?php

                            $room = $coon->prepare(" SELECT*FROM room_tool   ORDER BY room_name asc");
                            $room->execute();
                            while ($row = $room->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $row["room_id"] ?>"><?= $row["room_name"] ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ผู้ดูแล</label>
                        <select name="acTool" id="" class="form-select">
                            <option selected>-- เลือกผู้ดูแล --</option>
                            <?php

                            $ac = $coon->prepare(" SELECT*FROM admin_check_tool ORDER BY ac_name asc");
                            $ac->execute();
                            while ($acTool = $ac->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $acTool["ac_id"] ?>"><?= $acTool["ac_name"] ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ผู้ใช้งาน</label>
                        <input type="number" class="form-control" id="inputPassword" name="userTool">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">วันที่ครอบครอง</label>
                        <input type="text" class="form-control" id="inputPassword" name="occupyTool">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ประเภทอุปกรณ์</label>
                        <select name="staTool" id="" class="form-select">
                            <option selected>-- เลือกประเภทอุปกรณ์ --</option>
                            <?php

                            $seType = $coon->prepare(" SELECT*FROM type_tool ORDER BY type_name asc");
                            $seType->execute();
                            while ($tyTool = $seType->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $tyTool["type_id"] ?>"><?= $tyTool["type_name"] ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">สถานการใช้งาน</label>
                        <input type="number" class="form-control" id="inputPassword" name="userTool">

                    </div>

                </div>
                <div class="mb-3 mt-4">
                    <label for="inputPassword" class="col-form-label">รูปภาพ</label>
                    <input type="file" class="form-control" id="inputGroupFile01">
                </div>

                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ยี่ห้อ</label>
                        <input type="text" class="form-control" id="inputPassword" name="bnTool">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">รุ่น</label>
                        <input type="number" class="form-control" id="inputPassword" name="mdTool">

                    </div>

                </div>
                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">คุณสมบัติ</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="abTool"></textarea>
                </div>
                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">ชื่อบริษัท</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="nameCpyTool"></textarea>
                </div>
                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">ที่อยู่</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="addTool"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="inputPassword" name="TelTool">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">อายุการรับประกัน</label>
                        <input type="number" class="form-control" id="inputPassword" name="lifeTimeTool">

                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ราคา</label>
                        <input type="text" class="form-control" id="inputPassword" name="ovTool">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">Serial Number</label>
                        <input type="number" class="form-control" id="inputPassword" name="snTool">

                    </div>

                </div>


                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-primary text-center">Submit</button>
                </div>

            </form>

        </div>
    </div>

</body>

</html>