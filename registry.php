<?php
       // Установить соединение с БД localhost-это127.0.01 – на локальном комп.
 $conn = mysqli_connect('localhost', 'root', '', 'platuniongal');   
?>

<?php 
include 'template/head.php';
include 'template/header_guest.php';
include 'template/header.php';
?>
<div class=" voiti">
<div class="container">
	<div class="row">
		<div class="col-3 col-lg-4 col-md-2">
			<img src="img/Group 161.png" alt="геометрия">
		</div>
		<div class="col-8 col-lg-5 col-md-4">
			<div class="container">
				<div class="row">
					
							<div style="padding-top: 100px; padding-bottom: 100px">
							<p><font class="fontvxod">Регистрация</font></p>
							<br>
                       			<form role="form" method="POST" action="">
                        			<div class="form-group">
                        				<p style="line-height: 1px; color: white">Введите имя</p>
                          				<input type="text" class="form-control" id="exampleInputtext1" placeholder="Иван" name="firstname">
                          			</div>
                          			
                       			 <div class="form-group">
                       			 	<p style="line-height: 1px; color: white;">Введите фамилию</p>
                          				<input type="text" class="form-control" id="lastname" placeholder="Иванов" name="lastname">
                        		 </div>
                        		 <div class="form-group">
                       			 	<p style="line-height: 1px; color: white;">Введите e-mail</p>
                          				<input type="email" class="form-control" id="email" placeholder="admin@mail.ru" name="email">
                        		 </div>
                        		 <div class="form-group">
                       			 	<p style="line-height: 1px; color: white;">Введите пароль</p>
                          				<input type="password" class="form-control" id="password" placeholder="********" name="password">
                        		 </div>
                             <p id="error"></p>
                        		 <div class="form-group">
                       			 	<p style="line-height: 1px; color: white;">Повторите пароль</p>
                              
                          				<input type="password" class="form-control" id="password2" placeholder="********" name="password1">
                        		 </div>
                        		 <div>
  								<input type="checkbox" class="custom-checkbox" id="soglasen" name="soglasen">
								<label for="soglasen">Согласен с условием сервиса</label>
								 </div>
								 <div>
  								<input type="checkbox" class="custom-checkbox" id="soglasen_na_obrabot" name="soglasen_na_obrabot">
								<label for="soglasen_na_obrabot">Согласен на обработку ПД</label>
								 </div>
                        		 <button id="submit" type="submit" class="btn knopkavoiti"><b>Зарегистроваться</b></button>
                      			</form>
                      			<div class="container">
                      			<div style="padding-top: 20px">
                      				<font style="color: lightgray">Уже зарегистрованы?</font>
                      				<a href="user.php" class="vosstanov"><u>ВОЙТИ</u></a>
                      			</div>
                      			</div>
           					</div>
                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php

if (!empty($_POST))
{
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  
  $sql = ("insert into polzovatel (email, password, firstname, lastname, level, procent) VALUES ('$email', '$password', '$firstname', '$lastname', 'Новичок', 0)");
  var_dump($sql);
  $result = $conn->query($sql);
}

?>

</div>
</div>

<?php include 'template/footer.php' ?>