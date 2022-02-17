<? session_start(); ?>
<table width="100%" height="100"><tr><td><? include("login.php"); ?></td></tr></table>
<?
if($_SESSION["Level"] == "Member")
{
	echo "Member Page<p/>";
	include("member.php");
}
else if($_SESSION["Level"] == "Admin")
{
	echo "Admin Page<p/>";
	include("admin.php");
}
else
{
	echo "Main Page<p/>";
}
?>
