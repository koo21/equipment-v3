<?php
class MyClass
{
    public function nameRoom($n)
    {
        include '../conn/conn.php';
        $stmt = $coon->prepare(" SELECT* FROM room_tool WHERE room_id = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r["room_name"];
    }

    public function nameRoomFull($n)
    {
        include '../conn/conn.php';
        $stmt = $coon->prepare(" SELECT* FROM room_tool WHERE room_id = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return "<b>ชื่อห้อง : </b> " . $r["room_name"] . " ( " . $r["room_num"] . " ) ชั้น " . $r["room_floor"];
    }

    public function nameUser($n)
    {
        include '../conn/conn.php';
        $stmt = $coonName->prepare(" SELECT* FROM meeting_user WHERE user_id = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r["name"];
    }

    public function checkTool($n)
    {
        include '../conn/conn.php';
        $stmt = $coon->prepare(" SELECT* FROM admin_check_tool WHERE ac_num = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r["ac_name"];
    }

    public function toolStatus2($n)
    {
        include '../conn/conn.php';
        $stmt = $coon->prepare(" SELECT* FROM type_tool WHERE type_id = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r["type_name"];
    }

    /** จัดการวันเดือนปี วันที่รับครุภัณฑ์ */

    public function toolStatus($n)
    {
        if ($n == 1) {
            return "ใช้งานอยู่";
        } elseif ($n == 0) {
            return "ไม่ได้ใช้งาน";
        }
    }

    public function toolCd($n)
    {
        include '../array/month.php';
        $toolCdEx = explode(".", $n);
        if ($toolCdEx[2] > 2500) {
            $toolCdYear = $toolCdEx[2];
        } else {
            $toolCdYear = $toolCdEx[2] + 543;
        }
        return $toolCdEx[0] . ' ' . $month[(int)$toolCdEx[1]] . ' ' . $toolCdYear;
    }

    public function toolOccupy($n)
    {
        include '../array/month.php';
        $toolCdEx = explode(".", $n);
        if ($toolCdEx[2] > 2500) {
            $toolCdYear = $toolCdEx[2];
        } else {
            $toolCdYear = $toolCdEx[2] + 543;
        }
        return $toolCdEx[0] . ' ' . $month[(int)$toolCdEx[1]] . ' ' . $toolCdYear;
    }

    public function toolQt($n)
    {
        include '../array/month.php';
        $toolCdEx = explode(".", $n);
        if ($toolCdEx[2] > 2500) {
            $toolCdYear = $toolCdEx[2];
        } else {
            $toolCdYear = $toolCdEx[2] + 543;
        }
        return $toolCdEx[0] . ' ' . $month[(int)$toolCdEx[1]] . ' ' . $toolCdYear;
    }
}
