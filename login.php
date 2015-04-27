<?php 
	include_once('__autoload.php');
	include_once('database.php');
	//include_once('user.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập hệ thống quản trị</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php 
	if(isset($_POST['submit_name'])){
		if($_POST['tk']==""){
			$error="<span style='color:red;'>Du lieu khong duoc de trong</span>";
		}
		else{
			$user_name=$_POST['tk'];
		}
		if($_POST['mk']==""){
			$error="<span style='color:red;'>Du lieu khong duoc de trong</span>";
		}
		else{
			$user_pass=$_POST['mk'];
		}
		
	
		if(isset($user_name)&&isset($user_pass)) {

			$user = new user();
			$user->set_user_name($user_name);
			$user->set_user_pass($user_pass);
			$user->login();
			
			if($user->login() ==TRUE){
				header('location: index.php');
			}
			if($user->login() ==FALSE){
				header('location: login.php');
			}
			
			// if ($user->login()) {
			// 	header("location:index.php");
			// } else {
			// 	$error="<span style='color:red;'>Tai khoan khong hop le</span>";
			// }
		}	
	}
?>
	<form action="" method="post">
		<table border="1" cellspacing="1" cellpadding="1" align="center">
			<tr>
				<td colspan="2" align="center"><?php if(isset($error)){echo $error;}else{ echo "ĐĂNG NHẬP HỆ THỐNG QUẢN TRỊ";}?></td>
			</tr>
			<tr>
				<td>Tên tài khoản</td>
				<td><input type="text" name="tk"></td>
			</tr>
			<tr>
				<td>Mật Khẩu</td>
				<td><input type="password" name="mk"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit_name" value="Đăng Nhập" />
					<input type="reset" name="reset_name" value="Làm Mới" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>