<?php
include '../conn/conn.php';
include '../mainPages/myClass.php';
$obj = new MyClass;
$id = $_GET["id"];
if (empty($id)) {
    $g = 'in';
} else {
    $g = 'ed';
}
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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="../boot5/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include '../banner/banner1.php'; ?>
    <div class="container" style="margin-top: 15rem;">
        <div class="col-md-12">
            <h3>เพิ่มข้อมูลครุภัณฑ์ใหม่</h3>

            <div class="imgesShow mt-2">
                <img id="target" />
            </div>

            <?php
            $stmt = $coon->prepare(" SELECT* FROM main_tool WHERE tool_id = ? ");
            $stmt->execute([$id]);
            $r = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>


            <form action="insertDataTool.php?g=<?= $g ?>" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-form-label">เลขครุภัณฑ์*</label>
                        <input type="text" class="form-control numberTool" id="inputPassword" name="numberTool" placeholder="เลขครุภัณฑ์" value="<?= $r["tool_as"] ?>">

                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-form-label">ชื่อครุภัณฑ์*</label>
                        <input type="text" class="form-control nameTool" id="inputPassword" name="nameTool" placeholder="ชื่อครุภัณฑ์">

                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">รายละเอียดครุภัณฑ์</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detailTool"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">แหล่งเงิน*</label>
                        <select name="tool_fund" id="" class="form-select atMoneyTool">
                            <option value="0" selected>-- แหล่งเงิน --</option>
                            <?php
                            $am = $coon->prepare("SELECT DISTINCT tool_fund FROM main_tool");
                            $am->execute();
                            while ($moneyTool = $am->fetch(PDO::FETCH_ASSOC)) {


                            ?>
                                <option value="<?= $moneyTool["tool_fund"] ?>"><?= $moneyTool["tool_fund"] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ปีงบประมาณ*</label>
                        <input type="number" class="form-control yearTool" id="inputPassword" name="yearTool" placeholder="ปีงบประมาณ">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">วันที่รับครุภัณฑ์*</label>
                        <input type="date" class="form-control cdTool" name="tool_cd">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">สถานที่ตั้ง</label>
                        <input type="text" class="form-control" id="inputPassword" name="alTool" placeholder="สถานที่ตั้ง">
                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ชั้น*</label>
                        <select name="roofTool" id="" class="form-select roofTool">
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
                        <label for="inputPassword" class="col-form-label">ผู้ดูแล*</label>
                        <select name="acTool" id="" class="form-select acTool">
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
                        <select name="userTool" id="" class="form-select">
                            <option value="0" selected>-- ไม่มีผู้ใช้งาน --</option>
                            <?php

                            $userTool = $coonName->prepare(" SELECT*FROM meeting_user ORDER BY name asc");
                            $userTool->execute();
                            while ($rowUser = $userTool->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $rowUser["user_id"] ?>"><?= $rowUser["name"] ?></option>

                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">วันที่ครอบครอง</label>
                        <input type="date" class="form-control" id="inputPassword" name="occupyTool">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">ประเภทอุปกรณ์</label>
                        <select name="sta2Tool" id="" class="form-select">
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
                        <select name="staTool" id="" class="form-select">
                            <option selected>-- สถานใช้งาน --</option>
                            <?php
                            $sta = $coon->prepare("SELECT DISTINCT tool_sta FROM main_tool");
                            $sta->execute();
                            while ($row = $sta->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                                <option value="<?= $row["tool_sta"] ?>"><?= $row["tool_sta"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="mb-3 mt-4">
                    <label for="inputPassword" class="col-form-label">รูปภาพ</label>
                    <input type="file" class="form-control" id="src" name="imgesTool">
                    <br>
                    <input type="radio" name="Green" id="Green1" value="1"> <label for="">เข้าเกณฑ์ Green office</label>
                    <input type="radio" name="Green" id="Green2" value="0"> <label for="">ไม่เข้าเกณฑ์ Green office</label>


                </div>

                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ยี่ห้อ</label>
                        <input type="text" class="form-control" id="inputPassword" name="bnTool" placeholder="ยี่ห้อ">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">รุ่น</label>
                        <input type="number" class="form-control" id="inputPassword" name="mdTool" placeholder="รุ่น">

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
                        <input type="text" class="form-control" id="inputPassword" name="TelTool" placeholder="เบอร์โทรศัพท์">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">อายุการรับประกัน</label>
                        <input type="number" class="form-control" id="inputPassword" name="lifeTimeTool" placeholder="อายุประกันภัย">

                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ราคา</label>
                        <input type="text" class="form-control" id="inputPassword" name="ovTool" placeholder="ราคา">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">Serial Number</label>
                        <input type="number" class="form-control" id="inputPassword" name="snTool" placeholder="Serial Number">

                    </div>

                </div>


                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-primary text-center btnsub">บันทึกข้อมูล</button>
                </div>

            </form>

        </div>
    </div>

</body>
<link rel="stylesheet" href="../boot5/js/bootstrap.min.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function showImage(src, target) {
        var fr = new FileReader();
        // when image is loaded, set the src of the image where you want to display it
        fr.onload = function(e) {
            target.src = this.result;
        };
        src.addEventListener("change", function() {
            // fill fr with image data    
            fr.readAsDataURL(src.files[0]);
        });
    }
    var src = document.getElementById("src");
    var target = document.getElementById("target");
    showImage(src, target);

    // $(document).ready(function() {
    //     $(".btnsub").click(function() {
    //         if ($(".numberTool").val() == "") {

    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุเลขครุภัณฑ์',
    //             })
    //             return false;

    //         }

    //         if ($(".nameTool").val() == "") {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุชื่อครุภัณฑ์',
    //             })
    //             return false;
    //         }
    //         if ($(".atMoneyTool").val() == 0) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุแหล่งเงิน',
    //             })
    //             return false;
    //         }

    //         if ($(".yearTool").val() == 0) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุปีงบประมาณ',
    //             })
    //             return false;
    //         }
    //         if ($(".roofTool").val() == 0) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุชั้น',
    //             })
    //             return false;
    //         }
    //         if ($(".acTool").val() == 0) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'กรุณาใส่ข้อมูลให้ครบ ตามเครื่องหมาย *',
    //                 text: 'กรุณาระบุผู้ดูแล',
    //             })
    //             return false;
    //         }

    //     })

    //})
</script>

</html>