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

    public function nameUser($n)
    {
        include '../conn/conn.php';
        $stmt = $coonName->prepare(" SELECT* FROM meeting_user WHERE user_id = ? ");
        $stmt->execute([$n]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);

        return $r["name"];
    }
}
