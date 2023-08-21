<?php 
    include_once'../../autoload/autoload.php';
    $open="category";
    $category = $db->fetchAll("category");//lấy dữ liệu từ csdl
    
    
    //$sql="SELECT * FROM category ORDER BY id DESC";
    $sql = "SELECT category.*,page.name as pagecate FROM category LEFT JOIN page on category.page_id = page.id ORDER BY id DESC";
    
    if (isset($_GET['page'])) {
        $p=$_GET['page'];
    }
    else
    {
        $p=1;
    }
    
    $category =$db->fetchJone('category',$sql,$p,10,true);
    
    $sotrang=$category['page'];
    unset($category['page']);
    ?>
<?php include_once'../../../layouts/header.php'?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách danh mục <a href="add.php" class="btn btn-info">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Danh mục
            </li>
        </ol>
        <!--Hiển thị danh thông báo session khi thành công hay thất bại-->
        <div class="clearfix"></div>
        <?php if(isset($_SESSION['success'])):?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success'];
                unset($_SESSION['success']) ?>
        </div>
        <?php endif ?>
        <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'];
                unset($_SESSION['error']) ?>
        </div>
        <?php endif ?>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <h2>Bảng danh mục</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Trang</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category as $row) { 
                        ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['pagecate']?></td>
                        <td>
                            <!-- Hiển thị nút home ở trạng thái hiển thị và không hiển thị-->
                            <a  href="home.php?id=<?php echo $row['id'] ?>"
                                class="btn btn-xs <?php echo $row['home']==1?'btn-info' : 'btn-default'?>">
                            <?php echo $row['home']==1?"Hiển thị":"Không hiển thị" ?>
                            </a>
                        </td>
                        <td>             
                            <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-xs btn-info" href="edit.php?id=<?php echo $row['id'];?>"><i class="fa fa-refresh" style="color: #fff;"></i>Chỉnh sửa</a>
                            <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Bạn thực sự muốn xóa nó?');"><i class="fa fa-remove" style="color: #fff;"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pull-right">
                <nav aria-label="page navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <!--phân trang-->
                            <a class="page-link" href="?page=<?php echo $p-1==0?1:$p-1 ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for ($i=1; $i <= $sotrang ; $i++): ?> 
                        <li class="<?php ($p==$i)?active:'' ?>"><a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i ?></a></li>
                        <?php endfor ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $p+1<$i?$p+1:$p ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php include_once'../../../layouts/footer.php'?>