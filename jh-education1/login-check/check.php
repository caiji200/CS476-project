<?php 
    include '../db.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $table=$_COOKIE['tablename'];//Identify Totur or Student
    if(!$conn)
    {
        echo "connect error";
    }
    mysqli_set_charset($conn,"utf8");
    header("Content-Type:text/html;charset=utf-8");
    if($table=="tutor")   //$table==Tutor
    {
        $query = "SELECT * FROM tutor_table WHERE tutor_password = '$password' AND tutor_name = '$username'";
    }
    else
    {
        $query = "SELECT * FROM student_table WHERE student_password = '$password' AND student_name = '$username'";
    }
    
    $user = $conn->query($query);
    //the check result back to by query$userInfo
    
    if($userInfo=mysqli_fetch_array($user))
    {   
        session_start();
        if($table=="tutor"){
            $_SESSION['identity'] = "tutor";
            $_SESSION['id'] = $userInfo['tutor_id'];
            $_SESSION['name'] = $userInfo['tutor_name'];
            $_SESSION['tutorLevel'] = $userInfo['tutor_level'];
            $_SESSION['tutorSubject'] = $userInfo['tutor_subject'];
        }else{
            $_SESSION['identity'] = "student";
            $_SESSION['id'] = $userInfo['student_id'];
            $_SESSION['name'] = $userInfo['student_name'];
        }

        
        header("Location: ../main.php");
    }
    else 
    { 
        echo "<script>alert('username or password error,please input again');window.history.back(-1);</script>";die;
    
    } 
?>