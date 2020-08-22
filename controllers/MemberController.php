<?php

class MemberController extends Controller
{

    public function index()
    {
        $user = $this->model("User");
        session_start();



        if (isset($_SESSION["uid"])) {
            $user->sUserName = $_SESSION["uid"];

        } else {
            $user->sUserName = "Guest";

        }
        $this->view("Member/index", $user);
    }

    public function login()
    {
        session_start();
        $user = $this->model("User");


        if (isset($_POST["btnOK"])) {
            $user->sUserName = $_POST["txtUserName"];
            if (trim($user->sUserName) != "") {
                $_SESSION["uid"] = $user->sUserName;
                $_SESSION["login"] = 1;
                // if (isset($_SESSION["lastPage"])) {
                //     header(sprintf("Location: %s", $_SESSION["lastPage"]));
                // } else {
                header("Location:status");
                exit();

            }
        }

        //使用者按下「回首頁」 的按鈕後，回到首頁。
        if (isset($_POST["btnHome"])) {
            header("Location:index");
            exit();
        }

        $this->view("Member/login", $user);

    }



    public function secret()
    {
        $page = $this->model("LastPage");
        session_start();

        if($_SESSION["uid"] == "Guest")
        {
        
            $_SESSION["lastPage"] = "secret";
            header("Location: login");
            exit();
        }

        $this->view("Member/secret");
    }


    public function status()
    {
        $page = $this->model("LastPage");
        session_start();
        
        if (isset($_SESSION["lastPage"]) and $_SESSION["login"] == 1) {
            $_SESSION["login"] = 0;
            $page->pageLocation = "登入成功!，2秒後自動跳轉到會員專區";
            header("Refresh:2; url=secret");
            $this->view("Member/status", $page);
            exit();
        }elseif($_SESSION["login"] == 1){
            $_SESSION["login"] = 0;
            $page->pageLocation = "登入成功!，2秒後自動跳轉到首頁";
            header("Refresh:2; url=index");
            $this->view("Member/status", $page);
            $page->pageLocation = "";
            exit();
        }else{
            $_SESSION["uid"] = "Guest";
            $page->pageLocation = "已登出，2秒後自動跳轉到首頁";
            $_SESSION["lastPage"] = NULL;
            header("Refresh:2; url=index");
            $this->view("Member/status", $page);
            exit();
        }
        
        
       
    }


}
?>