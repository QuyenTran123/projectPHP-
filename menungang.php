<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
* {
  margin: 0;
  padding: 0;
}

/* dùng thuộc tính list-style-type để xóa các dấu đầu dòng.*/
#menungang ul {
  background: #e8b7d0;
  color: black;
  list-style-type: none;
  text-align: center;
}

/* Tiếp theo, bạn muốn các mục con nằm trên cùng một hàng ngang thì đưa các thẻ <li> về kiểu hiển thị inline-block. */
#menungang li {
  color: black;
  display: inline-block;
  width: 120px;
  height: 40px;
  line-height: 40px;
  margin-left: -5px;
}
/* Và cuối cùng bạn thêm style cho các thẻ <a> và đưa kiểu hiển thị của thẻ này thành kiểu block để nó được phủ kín #menu ul */
#menungang a {
  text-decoration: none;
  color: black;
  display: block;
}
#menungang a:hover {
  background: #F1F1F1;
  color: #333;
}

/* Tao hieu ung menu con tha xuong 

Bây giờ bạn muốn tùy biến lại .sub-menu để nó không bị đẩy lên thì sử dụng thuộc tính position để tùy biến vị trí một phần tử mà không ảnh hưởng đến phần tử khác. Nhưng tôi muốn .sub-menu nằm gần menu mẹ thì tôi sẽ thiết lập #menu li thành kiểu relative bởi #menu li là item cấp lớn nhất.

*/


#menungang li {
 position: relative;
}

/*   Tiếp theo, thiết lập cho .sub-menu thành kiểu absolute để nó luôn nằm trong menu mẹ*/
.sub-menungang {
 display: none;
 position: absolute;
}


/* ẩn và  hiển thị menu con ra */

.sub-menungang li {
  display: none;
}

#menungang li:hover .sub-menungang {
 display: block;
}

/* xóa margin không cần thiết  */

.sub-menungang li {
 margin-left: 0 !important;
}
    </style>
<body>
<div id="menungang">
    <ul>
      <strong><li><a href="viewsanpham.php">Sản Phẩm</a></li></strong>
      <strong><li><a href="qlydonhang.php">Đơn Hàng</a></li></strong>
      <!-- <strong><li><a href="#">Giỏ Hàng</a></li></strong> -->
      <strong><li><a href="usercustomer.php">Khách Hàng</a></li></strong>
      <!--  -->
    </ul>
</div>
</body>



</div>
</body>


