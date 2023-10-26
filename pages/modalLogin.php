<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<!-- The Modal -->
<div class="modal" id="modalLogin">
    <div class="modal-dialog">
        <div class="modal-content ">

            <!--../mainPages/checkLogin.php-->
            <form action="mainPages/checkLogin.php" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบงานครุภัณฑ์</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                        <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"><i class="bi bi-key-fill"></i> Password</label>
                        <input type="text" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btnSub" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>
                        ปิด</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $(".btnSub").click(() => {
            if ($("#user").val() == "" || $("#pass").val() == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'เข้าสู่ระบบงานครุภัณฑ์',
                    text: 'กรุณาใส่ข้อมูลให้ครับด้วย!',
                });
                return false;
            }
        })


    })
</script>