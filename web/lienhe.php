<?php
include 'autoload/autoload.php';
//unset($_SESSION['cart']);
//truy vấn chọn trong bảng home có giá trị =1 hiển thị ngoài menu
$sqlhomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY update_at";

//Truy vấn dữ liệu trong bảng
$Categoryhome = $db->fetchsql($sqlhomecate);
$data = [];
foreach ($Categoryhome as $item) {
    $cateID = intval($item['id']); //ép kiểu về kiểu int để lọc các id
    //Chọn tất cả dữ liệu trong bảng product để gán vào mục sản phẩm
    $sql = "SELECT * FROM product WHERE category_id = $cateID ORDER BY ID DESC LIMIT 4";
    $productHome = $db->fetchsql($sql); //truy vấn vô csdl
    $data[$item['name']] = $productHome;
}
$pannel = $db->fetchAll("panel");
$count = count($db->fetchAll("panel"));

$a=1;
?>
<?php include 'header.php'?>
<a style="font-size: 24px; color: black"> Mọi thắc mắc hay đánh giá chất lượng dịch vụ vui lòng liên hệ trực tiếp <br><b style="font-size: 24px; color: red">hotline: 037426629</b></br>
<b style="font-size: 24px; color: red">Email: tranquochaua2@gmail.com</b> </a>   
<?php include 'footer.php' ?>