<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<?php
include '../conn/conn.php';
?>

<div class="modal" id="modalSearch">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">

            <!--../mainPages/checkLogin.php-->
            <form action="toolSearch.php" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-box-arrow-in-right"></i> ค้นหาครุภัณฑ์ (ค้นหาได้แค่ 1
                        ช่องค้นหาเท่านั้น)
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">เลขครุภัณฑ์</label>
                        <input type="text" class="form-control" name="numTool" id="numTool" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ชื่อครุภัณฑ์</label>
                        <input type="text" class="form-control" name="nameTool" id="nameTool" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb3">
                        <label for="" class="form-label">สถานที่ตั้ง</label>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="addTool" id="addTool">
                            <option value="">--สถานที่ตั้ง--</option>
                            <?php
                            $addTool = $coon->prepare(" SELECT* FROM room_tool ORDER BY room_floor ASC ");
                            $addTool->execute();
                            while ($rAddTool = $addTool->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $rAddTool["room_id"] ?>">
                                    <?= $rAddTool["room_name"] . $rAddTool["room_id"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb3">
                        <label for="" class="form-label">หน่วยงานที่รับผิดชอบ</label>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="adminTool" id="adminTool">
                            <option value="">--หน่วยงานที่รับผิดชอบ--</option>
                            <?php
                            $staffTool = $coon->prepare(" SELECT* FROM admin_check_tool ORDER BY ac_id ASC ");
                            $staffTool->execute();
                            while ($rStaffTool = $staffTool->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $rStaffTool["ac_id"] ?>"><?= $rStaffTool["ac_name"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btnSearchClick" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>
                        ปิด</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $(".btnSearchClick").click(() => {
            if ($("#numTool").val() == "" && $("#nameTool").val() == "" && $("#addTool").val() == "" && $(
                    "#adminTool").val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'ค้นหาครุภัณฑ์',
                    text: 'กรุณาระบุครุภัณฑ์ในช่องค้นหา',
                });
                return false;
            }
        })


    })
</script>