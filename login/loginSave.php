<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    // echo $youEmail, $youPass;
    function msg($alert){
        echo "<p class='alert'>${alert}</p>";
        echo "<a class='btn btn_style1 mt30' href='../login/login.php'>로그인</a>";
    }
    // 데이터 조회
    $sql = "SELECT memberID, youEmail, youName, youPass FROM classMember WHERE youEmail = '$youEmail' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            msg("이메일 또는 비밀번호가 틀렸습니다.");
        } else {
            //로그인 성공
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            //섹션 생성
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            $_SESSION['youName'] = $memberInfo['youName'];
            // echo "<pre>";
            // var_dump($result);
            // echo "<pre>";
            Header("Location: ../main/main.php");
        }
    } else {
        msg("에러발생 - 관리자에게 문의하세요");
    }
?>