<?php
require('config.php');
require('function.inc.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
$name = get_safe_value($conn, $_POST['name']);
$uid = $_SESSION['USER_ID'];
mysqli_query($conn, "UPDATE regi set username='$name' where id='$uid'");
$_SESSION['USER_NAME'] = $name;
echo "Your name updated";
?>