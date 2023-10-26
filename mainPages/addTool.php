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
            <h2>669898984</h2>
            <form action="" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-sm-2 col-form-label">เลขครุภัณฑ์</label>
                        <input type="text" class="form-control" id="inputPassword" name="numberMain">

                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="col-sm-2 col-form-label">ชื่อครุภัณฑ์</label>
                        <input type="text" class="form-control" id="inputPassword" name="name">

                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียดครุภัณฑ์</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">แหล่งเงิน</label>
                        <input type="text" class="form-control" id="inputPassword" name="">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ปีงบประมาณ</label>
                        <input type="number" class="form-control" id="inputPassword" name="">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">วันที่รับครุภัณฑ์</label>
                        <input type="text" class="form-control" id="inputPassword" name="name">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">สถานที่ตั้ง</label>
                        <input type="text" class="form-control" id="inputPassword" name="">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ชั้น</label>
                        <input type="number" class="form-control" id="inputPassword" name="">

                    </div>
                    <div class="col">
                        <label for="inputPassword" class=" col-form-label">ชื่อห้อง</label>
                        <input type="text" class="form-control" id="inputPassword" name="">

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