	<?php
session_start();//Khai báo session, nếu không khai báo thì session không hoạt động
include_once'dtbase.php';
include_once'ftion.php';
    $db = new Database;

    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/banhang/public/uploads/");


    $category = $db->fetchAll("category");
    $page = $db->fetchAll("page");

    /**
     * Lấy danh sách sản phẩm mới
     */
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 4";
    $productNew=$db->fetchsql($sqlNew);

    $sqlpay = "SELECT * FROM product WHERE pay > 0 ORDER BY pay DESC LIMIT 4";

    $productpay = $db->fetchsql($sqlpay);


    $id=intval(getInput('id'));
    //chi tiết sản phẩm
    $editcart = $db->fetchID('product',$id);

 ?>
