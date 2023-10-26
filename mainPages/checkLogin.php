<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<?php

session_start();
include '../conn/conn.php';

try {

    $stmt = $coon->prepare(" SELECT* FROM admin WHERE admin_username = ? AND admin_password = ? ");
    $stmt->execute([$_POST["user"], $_POST["pass"]]);
    $row = $stmt->rowCount();
    if ($row == 1) {
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["adminName"] = $r["admin_name"];
        header("location:mainPage.php");
    } else {
        echo "
        <script>
            $(document).ready(function(){
                Swal.fire({
                        title: 'ระบบงานครุภัณฑ์',
                        text: 'ท่านไม่สามารถเข้าสู่ระบบได้ กรุณาทำการล็อกอินใหม่อีกครั้ง!',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'กลับ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../pages/index.php';
                        }
                    })
            }) 
        </script>
        ";
    }
} catch (Exception $e) {
    echo "no" . $e->getMessage();
}
?>