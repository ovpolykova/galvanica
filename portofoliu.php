<?php
session_start(); 
$id_polz = $_SESSION ['id_polz']; 
$conn = new mysqli('localhost', 'root', '', 'platuniongal');
$sql = "select * from port_rabot where id_polz=$id_polz";
$result = $conn->query($sql);
?>
<?php 
include 'template/head.php';
include 'template/header_cabinet.php';
include 'template/header.php';
include 'template/navbar_mykurs.php';
?>

<div class="container">
	<div class="row ">&ensp;&ensp;
		<div class="col-12">
			<p style="color: #575C63;">Личный кабинет/Портфолию</p>
		</div>
	</div>
</div>
<br>
<div class="container">
	<?php
	// ЭТО КОЛИЧЕСТВО ЗАПИСЕЙ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$sql_kol = "select count(*) as count from port_rabot where id_polz=$id_polz";
	$result_kol=$conn->query($sql_kol);
	foreach($result_kol as $row){
	echo '<h3>В портфолию '.$row['count'].' работы</h3>';
}
	?>
</div>
<br>
<div class="container">
	<div class="row">
<?php
while($row = mysqli_fetch_assoc($result))
  {
  	//вывести карточку
	echo '<div class="col-md-4 col-sm-6" style="padding-top: 40px">
			<div class="box">
			<img src="img/'.$row['image'].'">
				<div class="box-content" 
					<a href="informat.php" class="vosstanov"><h3 class="title">'.$row['name_prod'].'</h3></a>
					<span class="post">'.$row['data_ob'].'</span>
					<ul class="icon">
					<li><a href="#"><span><i class="fa fa-pencil"></i></span></a></li>
					<li><a href="#"><span><i class="fa fa-times"></i></span></a></li>
					</ul>
				</div>
			</div>
		</div>';
	}
		?>
	</div>
</div>
<br>
<br>
<br>
<div class="container" style="border-top: solid 1px; border-color: lightgray;">
<br>
<br>
	<a href="dobav_portfoliu.php"><button type="button" class="btn btn-primary btn-lg" style="width: 320px; height: 50px; font-size: 16px; background-color: #AFC0D7; color: #1F2122; border: none"><img src="img/+.png"><b>&ensp;ДОБАВИТЬ НОВУЮ РАБОТУ</b></button></a>
</div>
<br>
<br>
<?php 
include 'template/footer.php';
?>