<?php
session_start(); 
$id_polz = $_SESSION ['id_polz']; 
$conn = mysqli_connect('localhost', 'root', '', 'platuniongal');

$sql_kat = "select * from kategoriya";
$result_kat = mysqli_query($conn, $sql_kat);

$sql_mat = "select * from material";
$result_mat = mysqli_query($conn, $sql_mat);

$sql = "select * from port_rabot where id_polz=$id_polz";
        //Выполнить запрос и результат записать в буфер
        $result = mysqli_query($conn, $sql);
          //Если массив POST непустой, то добавить запись в базу  
          if (!empty($_POST)) 
          {
          
            $name_prod = $_POST['name_prod'];
            $opisanie = $_POST['opisanie'];
            $id_kat = $_POST['id_kat'];
            $id_mat = $_POST['id_mat'];
            $razmer = $_POST['razmer'];
            $ed_line = $_POST['ed_line'];
            $ves = $_POST['ves'];
            $ed_ves = $_POST['ed_ves'];
            $image = $_POST['image'];
            
            $sql = "insert into port_rabot (id_polz, name_prod, opisanie, id_kat, id_mat, razmer, ed_line, ves, ed_ves, image, data_ob) values ('$id_polz', '$name_prod', '$opisanie', '$id_kat', '$id_mat', '$razmer', '$ed_line', '$ves', '$ed_ves', '$image', now())";

            $result=$conn->query($sql);
          }

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
			<p style="color: #575C63;">Личный кабинет/Портфолию/Добавить работу</p>
		</div>
	</div>
</div>


<br>
<div class="container">
	
		<form role="form" method="POST" action="">
			<div class="row">
			<div class="col-lg-7">
			<div class="form-group">
    			<label for="name_produkt" style="font-size: 18px"><b>Название продукта*</b></label>
    				<input type="text" class="form-control" id="name_produkt" placeholder="Введите название продукта" name="name_prod" style="height: 50px">
    		</div>	
    		<div class="form-group">
		    	<label for="opisanie1" style="font-size: 18px"><b>Описание*</b></label>
		    		<textarea class="form-control" id="opisanie1" rows="5" placeholder="Опишите вашу работу" name="opisanie"></textarea>
		    </div>
		    <div class="form-group">
    			<label for="kat1" style="font-size: 18px"><b>Выберите категорию*</b></label>
    				<select class="form-control" id="kat1" name="id_kat">
				    <?php
           				 while ($row = mysqli_fetch_assoc($result_kat))
			            {
			              echo '<option value="'.$row['id_kat'].'"> '.$row['name_kat'].'</option>';
			            }
			        ?>
    				</select>
  			</div>
  			<div class="form-group">
  			<label id="mat1" style="font-size: 18px"><b> Выберите используемые материалы </b></label>
  			<select class="form-control" id="mat1" name="id_mat">
  				<?php
  				while ($row = mysqli_fetch_assoc($result_mat))
			            {
			              echo '<option value="'.$row['id_mat'].'"> '.$row['name_mat'].'</option>';
			            }
				?>
			</select>
		    </div>
			<div class="form-group">
				<label style="font-style: 18px"><b>Размер</b></label>
				<div class="input-group">
				  <input type="text" class="form-control" name="razmer">
				  <div class="input-group-append" style="width: 130px;">
				      <select class="form-control" name="ed_line">
				      <option>см</option>
				      <option>мм</option>
				      <option>м</option>
				    </select>
				  </div>
				</div>
			</div>
			<div class="form-group">
				<label style="font-style: 18px"><b>Вес</b></label>
				<div class="input-group">
				  <input type="text" class="form-control" name="ves">
				  <div class="input-group-append" style="width: 130px;">
				      <select class="form-control" name="ed_ves">
				      <option>грамм</option>
				      <option>килограмм</option>
				      <option>миллиграмм</option>
				    </select>
				  </div>
				</div>
			</div>
			<div class="form-group">
				<label style="font-style: 18px"><b>Добавить фото</b></label>
				<div class="custom-file">
				  <input type="file" class="custom-file-input" id="customFile" name="image">
				  <label class="custom-file-label file122222222222222" for="customFile">Выбрать фото</label>
				</div>
			</div>
			<br>
			<label style="color: #EB5757; opacity: 0.5;">* помечены обязательные поля</label><br><br><br>
			<button type="submit" class="btn btn-primary btn-lg" style="width: 212px; height: 50px; font-size: 16px; background-color: #AFC0D7; color: #1F2122; border: none"><b>ДОБАВИТЬ</b></button>
  			</div>

  			<div class="col-lg-4">
  				<p>Поделиться в соц. сетях</p>
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-4">
  				<a href="https://www.instagram.com/?hl=ru"><img src="img/followinsta.png" style="width: 48px"></a><br><br>
  						</div>
  						<div class="col-lg-4">
  							<a href="https://www.vk.com/"><img src="img/followvk.png" style="width: 48px"></a><br><br>
  						</div>
  						<div class="col-lg-4">
  							<a href="https://www.facebook.com/"><img src="img/followfacebuk.png" style="width: 48px; border-radius: 10px;"></a><br>
  						</div>
  						</div>
  				</div>
  			</div>
  			</div>
			</div>
  			</div>

            <br>
            
		</form>
		
	</div>
	

<br>
<br>
<?php include 'template/footer.php' ?>