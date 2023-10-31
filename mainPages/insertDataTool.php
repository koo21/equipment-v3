<?php

include '../conn/conn.php';

if ($_GET["g"] == "in") {
    //echo $_POST["numberTool"], $_POST["staTool"];
    // try {
    //     $stmt = $coon->prepare(" INSERT INTO main_tool (tool_id, tool_as, tool_ad1, tool_ad2, tool_sn, tool_bn, tool_md, tool_ab, tool_img, tool_al, tool_lr, tool_floor, tool_year, tool_cd, tool_occupy, tool_fund, tool_ov, tool_company, tool_company_at, tool_company_tel, tool_qt, tool_lifetime, tool_sta, tool_crcy2, tool_sta2, tool_green, tool_check) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    //     $stmt->execute(["0", $_POST["numberTool"], $_POST["nameTool"], $_POST["detailTool"], $_POST["snTool"], $_POST["bnTool"], $_POST["mdTool"], $_POST["abTool"], $_POST["imgesTool"], $_POST["alTool"], $_POST["roomTool"], $_POST["roofTool"], $_POST["yearTool"], $_POST["tool_cd"], $_POST["occupyTool"], $_POST["tool_fund"], $_POST["ovTool"], $_POST["nameCpyTool"], $_POST["addTool"], $_POST["TelTool"], $_POST["lifeTimeTool"], $_POST["staTool"], $_POST["sta2Tool"], $_POST["Green"], $_POST["acTool"]]);

    //     if (empty($stmt)) {
    //         echo "ok";
    //     } else {
    //         echo "no";
    //     }
    // } catch (PDOException $e) {
    //     echo "not connect" . $e->getMessage();
    // }
}

if ($_GET["g"] == "ed") {
    echo "edit";
}
