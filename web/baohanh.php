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

<h2 id="mcetoc_1e4i9liht0">MobileCity Khẳng định Bảo hành, Hậu mãi tốt nhất:</h2>
<p>1. Thời gian BH chỉ 3-5 ngày (BHV).</p>
<p>2. Bảo hành lần 3 đổi máy khác (Duy nhất tại VN).</p>
<p>3. Khách hàng có thể BH tại mọi chi nhánh (Duy nhất tại VN).</p>
<p>4. Hỗ trợ phần mềm từ xa: 8h30 đến 20h30 (Duy nhất tại VN).</p>
<p>5. Gói bảo hành mua thêm (BHV) RẺ nhất.</p>
<p>6. Tất cả các cửa hàng đều có số điện thoại phản ánh chất lượng dịch vụ.</p>
<p>Quý khách sẽ được tặng ngay 1 triệu, nếu nhân viên phục vụ không tốt, không làm đúng quy định BH.</p>
<h3 id="mcetoc_1e4i9qnbs0"> 1. Thời gian đổi máy, bao test, chờ BH:</h3>
<p><strong>BH thường</strong>:</p>
<p>Quý khách được đổi máy (Nếu có lỗi của nhà sản xuất): <span style="color: #ff0000;">7 ngày</span> đối với máy cũ, <span style="color: #ff0000;">15 ngày</span> đối với máy mới.</p>
<p>Tặng thêm <span style="color: #ff0000;">15 ngày</span> BH đối với máy ship xa. Thời gian chờ BH máy là <span style="color: #ff0000;">5-7 ngày</span> làm việc.</p>
<p>Đổi máy khác nếu bảo hành phần cứng lần 3. Không hỗ trợ nhập lại máy.</p>
<p><strong>BH Vàng</strong>:</p>
<p>Quý khách được đổi máy (Nếu có lỗi của nhà sản xuất): <span style="color: #ff0000;">15 ngày</span> đối với máy cũ, <span style="color: #ff0000;">30 ngày</span> đối với máy mới.</p>
<p>Tặng thêm <span style="color: #ff0000;">30 ngày</span> BH đối với máy ship xa. Thời gian chờ BH máy là <span style="color: #ff0000;">3-5 ngày</span> làm việc.</p>
<p>Đổi máy khác nếu bảo hành phần cứng lần 3. Hỗ trợ nhập lại máy với giá cao.</p>
<h3 id="mcetoc_1e4ia5e7r1">2. Nội dung được BH:</h3>
<p><strong>BH thường</strong>:</p>
<p>Bảo hành 6 (máy cũ) - 12 (máy mới) tháng phần cứng (<span style="color: #ff0000;">Trừ nguồn, màn hình, PIN, Camera, Vân tay</span>).</p>
<p>Hỗ trợ giá thay thế, sửa chữa linh kiện tối đa bằng công thay thế, sửa chữa <span style="color: #ff0000;">(50-150K)</span></p>
<p><strong>BH Vàng</strong>:</p>
<p>Bảo hành 6 (máy cũ) - 12 (máy mới) tháng phần cứng, <span style="color: #ff0000;">cả nguồn, màn hình, PIN, Camera, Vân tay</span> (Trừ các vết cấn, móp, cong, vào nước - khách hàng được mở máy kiểm tra, các vết xước vẫn được BH).</p>
<p>Hỗ trợ giá thay thế, sửa chữa linh kiện lên đến <span style="color: #ff0000;">1.000.000</span> cụ thể như sau:</p>
<p>- Hỗ trợ khách 100% số tiền BHV (Tối đa bằng giá sửa chữa, thay thế) nếu máy lỗi do người dùng trong 1 tháng đầu.</p>
<p>- Hỗ trợ khách 50% số tiền BHV (Tối đa bằng giá sửa chữa, thay thế) nếu máy do người dùng trong 2 tháng đầu(BHV 6 tháng) và 3 tháng đầu(BHV 12 tháng).</p>
<p>- Hỗ trợ khách 25% số tiền BHV (Tối đa bằng giá sửa chữa, thay thế) nếu máy do người dùng trong 3 tháng đầu(BHV 6 tháng) và 6 tháng đầu(BHV 12 tháng).</p>
<h3 id="mcetoc_1e4ialc1i2">3. Quà tặng:</h3>
<p><strong>BH thường</strong>:</p>
<p>Tặng sạc, cáp thường khi mua máy cũ.</p>
<p><strong>BH Vàng</strong>:</p>
<p>Tặng sạc nhanh (iPhone, Samsung), cáp, dán cl, ốp lưng khi mua máy cũ.</p>
<p>Tặng dán cl, ốp lưng, tai nghe (nếu máy chưa có) khi mua máy mới. Nếu máy đã có ốp lưng, tai nghe khách được tặng mặt hàng khác tương đương.</p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>Cám ơn Quý khách đã tin tưởng và ủng hộ MobileCity. </strong></span></p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>Rất mong quý khách lựa chọn gói BHV như một hình thức bảo hiểm máy. </strong></span></p>
<p style="text-align: center;"><span style="color: #ff0000;"><strong>MobileCity sẽ rất biết ơn khi chúng tôi có thể phục vụ khách hàng với những ưu đãi, hậu mãi tốt nhất!</strong></span></p>
<p style="text-align: center;"> </p>

<h3 id="mcetoc_1f2gm5q2i2">Những điểm nối bật của trung tâm sửa chữa MCCare</h3>
<p>1. Trung tâm MCCare là hệ thống sửa chữa duy nhất ở Việt Nam có mặt song song cùng với hệ thống bán hàng. MCCare có mặt tại tất cả các chi nhánh của MobileCity. Đặc biệt tất cả các mức độ sửa chữa MCCare đầu có: Bảo hành, Phầm mềm, Unbrick, Thay thế, Sửa Main ...</p>
<p>2. MCCare có trung tâm đào tạo học viên sửa chữa tại cả 3 miền: Bắc, Trung, Nam. Đây là điều kiện thuận lợi để chúng tôi có được đội ngũ nhân viên kỹ thuật lành nghề, có kinh nghiệm nhiều năm.</p>
<p>3. Duy nhất tại Việt Nam, MCCare thực hiện đầy đủ quy trình: nhận test máy, sửa chữa thay thế, test máy kỹ sau khi sửa và trước khi gửi lại khách hàng.</p>
<p>4. Thông tin bảo hành và sửa máy được quản lý online. Quý khách dễ dàng cập nhật thông tin và kiểm tra lại sau này ở đường link sau: <a href="https://mobilecity.vn/login">https://mobilecity.vn/login</a></p>
<p>5. Tất cả các trung tâm đều có số Hotline phản ảnh chất lượng dịch vụ. Trực tiếp tổng công ty sẽ tiếp nhận và giải đáp mọi thắc mắc của Quý khách. Quý khách sẽ yên tâm tuyệt đối khi bảo hành, sửa chữa tại MCCare.</p>
<figure class="sudo-media-item" style="text-align: center;"><img class="lazy" style="display: block; margin-left: auto; margin-right: auto;" src="https://mobilecity.vn/public/assets/img/load_video.svg" data-original="https://cdn.mobilecity.vn/mobilecity-vn/images/2021/10/trung-tam-dao-tao-mccare-650.jpg" alt="" />
<figcaption>Trung tâm đào tạo MCCare</figcaption>
</figure>
<p style="text-align: center;"> MobileCity luôn mong muốn lắng nghe ý kiến của Quý khách để ngày càng hoàn thiện chất lượng dịch vụ. Khẳng định khẩu hiệu "KHÁCH HÀNG LÀ SỐ 1"</p>
<figure class="sudo-media-item" style="text-align: center;"><img class="lazy" src="https://mobilecity.vn/public/assets/img/load_video.svg" data-original="https://cdn.mobilecity.vn/mobilecity-vn/images/2021/10/phan-anh-chat-luong-dich-vu-mccare.jpg" alt="" />
<figcaption>MobileCity Care</figcaption>
</figure>
<p>Nếu còn bất cứ thắc mắc nào về dịch vụ hay bạn có gặp phải bất kỳ hư hỏng gì với chiếc dế yêu của mình, hãy liên hệ ngay với chúng tôi để được hỗ trợ tốt nhất. Hân hạnh phục vụ quý khách! <p><strong>Hệ thống sửa chữa điện thoại di động <span style="color: #ff6600;">MobileCity Care</span></strong></p>
<p><span style="color: #0000ff;">Tại Hà Nội</span></p>
<?php include 'footer.php' ?>