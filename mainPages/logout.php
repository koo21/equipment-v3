<?php
session_start();
session_destroy();

?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script>
$(document).ready(() => {
    Swal.fire({
        title: 'ออกจากระบบ',
        text: "ยืนยันการออกจากระบบนี้แล้ว!",
        icon: 'warning',
        showConfirmButton: false,
        timer: 2500
    }).then((result) => {

        window.location.href = "../pages/index.php";

    })
})
</script>