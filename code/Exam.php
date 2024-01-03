<?php
    require_once("function/DBConnectionHandler.php");

    $servername = "140.127.74.201:9001";
    $username = "root";
    $password = "root";
    $db = "bigdata";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "bigdata";

    try{
        DBConnectionHandler::setConnection(
            $servername,
            $username,
            $password,
            $db
        );

        $connection = DBConnectionHandler::getConnection();
        
        // 1.1
        $sql = "SELECT COUNT(DISTINCT dp001_review_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":ID", 39);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 1.2
        $sql = "SELECT COUNT(DISTINCT dp001_question_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID = :ID AND dp001_question_sn != :VAL;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":ID", 39);
        $stmt->bindValue(":VAL", "NA");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 2.1
        $sql = "SELECT dp001_indicator FROM edu_bigdata_imp1 WHERE PseudoID=281 GROUP BY dp001_video_item_sn";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 2.2
        $sql = "SELECT COUNT(1) FROM edu_bigdata_imp1 WHERE PseudoID=281 AND dp001_prac_score_rate = 100;";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 3.1
        $sql = "SELECT COUNT(1) FROM edu_bigdata_imp1 WHERE PseudoID=71 AND dp001_record_plus_view_action = :ACT;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":ACT", "paused");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 3.2
        $sql = "SELECT DISTINCT STR_TO_DATE(dp001_review_start_time, :OUT) FROM edu_bigdata_imp1 WHERE PseudoID=71;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":OUT", "%Y-%m-%d");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 4.1
        $sql = "SELECT dp001_review_sn FROM edu_bigdata_imp1 GROUP BY dp001_review_sn ORDER BY COUNT(dp001_review_sn) ASC LIMIT 1;";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 4.2
        $sql = "SELECT COUNT(1) AS count FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment LIKE :ALIGN;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":ALIGN", "%十二年國民基本教育類%");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 4.3
        $sql = "SELECT dp002_verb_display_zh_TW, COUNT(dp002_verb_display_zh_TW) AS count FROM edu_bigdata_imp1 WHERE dp002_verb_display_zh_TW != :NA GROUP BY dp002_verb_display_zh_TW ORDER BY COUNT(dp002_verb_display_zh_TW) DESC LIMIT 3;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":NA", "NA");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        // 4.4
        $sql = "SELECT COUNT(1) AS count FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment LIKE :ALIGN;";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(":ALIGN", "%校園職業安全%");
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($r);

        echo "success";
    }catch(Exception $e){
        echo " ERROR ". $sql . "</br>" . $e->getMessage();
    }
?>