<?php include_once'../../autoload/autoload.php'; 
    include_once'../../autoload/connect.php';
    $product = $db->fetchAll("product");
    $admin = $db->fetchAll("admin");
    $category = $db->fetchAll("category");
    $users = $db->fetchAll("users");
    $page = $db->fetchAll("page");
    $trans = $db->fetchAll("transaction");







?>
<?php include_once'../../../layouts/header.php'?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Kết quả tìm kiếm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Kết quả tìm kiếm
            </li>
        </ol>
        <!--Hiển thị danh thông báo session khi thành công hay thất bại-->
        <?php if(isset($_GET['search']))
        {   $search = $_GET['search'];
            if(empty($search))
            {
                echo "<p>Yêu cầu nhập dữ liệu</p>";
            }
            else
            {

                $query = "SELECT * FROM product,admin,category,transaction,users,page WHERE name LIKE '%$search%'";
                
                $result = mysqli_query( $conn,$query);
                _debug($result);
                ?>
                 <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Slug</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php //in danh sách 
                        foreach ($result as $row) { 
                            $id = (intval($row['category_id']));
                            
                           $sqli = "SELECT name FROM category WHERE id=$id";
                           $category_id=$db->fetchsql($sqli);
                           foreach ($category_id as $item): ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $item['name'];?></td>
                        <td><?php echo $row['slug'];?></td>
                        <td><img src="<?php echo uploads() ?>product/<?php echo $row['thumbal'] ?>"width='80px' height="80px"></td>
                        <td><?php echo $row['content'];?></td>
                        <td>
                            <ul>
                                <li>Giá: <?php echo formatprice($row['price']);?></li>
                                <li>Số lượng: <?php echo $row['number'];?></li>
                                <li>Giảm giá: <?php echo $row['sale'];?>%</li>
                                <li>Giá đã giảm: <?php echo saleprice($row['price'],$row['sale']) ?></li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach ?>
                    <?php
                     } ?>   

                </tbody>
            </table>
            
                <?php 
            }

        }
 ?> 
    </div>
</div>



<?php include_once'../../../layouts/footer.php'?>