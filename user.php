<?php

if (!empty($_POST))
{
$conn = mysqli_connect('localhost', 'root', '', 'platuniongal');
if (mysqli_connect_errno($conn)) {
	echo "Не удалось подключиться к БД: " . mysqli_connect_error();
}
$email = $_POST['email'];
        $password = $_POST['password'];
    // Составим  строку SQL  запроса Логин и пароль – это строки, их надо в запрос включить в кавычках
             $sql = 'select id_polz, firstname, lastname, level, procent from polzovatel where email="'.$_POST['email'].'" and password="'.$_POST['password'].'"';
        // Выполнить запрос. Результат  заносим в буфер - переменную $result
            $result = mysqli_query($conn, $sql);
        // Выбрать строку из буфера в ассоциативный массив
          $row = mysqli_fetch_assoc($result);
          $id_polz = $row['id_polz'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $level = $row['level'];
          $procent = $row['procent'];
           // Выбрать полностью все строки результата запроса, например, чтобы вывести их в виде таблицы
        // Все данные, полученные приложением остаются PHP строками
        if ($level=="Новичок")
        { 
        session_start(); 
        $_SESSION['id_polz'] = $id_polz; 
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname; 
        $_SESSION['level'] = $level; 
        $_SESSION['procent'] = $procent; 
        header("Location: profile.php");
        }
        elseif ($level=="Мастер")
        { 
        session_start(); 
        $_SESSION['id_polz'] = $id_polz; 
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname; 
        $_SESSION['level'] = $level;
        $_SESSION['procent'] = $procent;  
        header("Location: polzovatel.php");
        }
        elseif ($level=="Сотрудник")
        { 
        session_start(); 
        $_SESSION['id_polz'] = $id_polz; 
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname; 
        $_SESSION['level'] = $level; 
        $_SESSION['procent'] = $procent; 
        header("Location: polzovatel.php");
        }
        elseif ($level=="Администратор")
        { 
        session_start(); 
        $_SESSION['id_polz'] = $id_polz; 
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname; 
        $_SESSION['level'] = $level; 
        $_SESSION['procent'] = $procent; 
        header("Location: polzovatel.php");
        }

        else { 
        $sms = "Неверный логин или пароль!"; 
        } 
        mysqli_free_result ($result); 
}

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
					
							<div style="padding-top: 80px">
							<p><font class="fontvxod">Вход в систему</font></p>
							<br>
                       			<form role="form" method="POST" action="">
                       				<?php echo '<p style="color: orange">' .$sms.'</p>' ?>
                        			<div class="form-group">
                        				<p style="line-height: 1px; color: white;">Введите e-mail</p>
                          				<input type="text" class="form-control" id="exampleInputtext1" placeholder="admin@mail.ru" name="email"> 
                          			</div>
                          			<br>
                       			 <div class="form-group">
                       			 	<p style="line-height: 1px; color: white;">Введите пароль</p>
                          				<input type="password" class="form-control" id="password" placeholder="*********" name="password">
                        		 </div>
                        		 <button id="submit" type="submit" class="btn knopkavoiti"><b>Войти</b></button>
                      			</form>
                      			<div class="container">

                      			<div style="padding-top: 20px">
                      				<font style="color: lightgray">Забыли пароль?</font>
                      				<a href="" class="vosstanov"><u>ВОССТАНОВИТЬ</u></a>
                      			</div>
                      			<div style="padding-top: 20px">
                      				<font style="color: lightgray">Нет аккаунта?</font>
                      				<a href="registry.php" class="vosstanov"><u>РЕГИСТРАЦИЯ</u></a>
                      			</div>
                      			</div>
           					</div>
                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>


</div>
</div>
<?php include 'template/footer.php' ?>