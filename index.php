<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Wysyłanie plików na serwer</title>
</head>
<body>



		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000000" />
			<input type="file" name="plik" />
			<input type="submit" value="Wyślij plik" />
		</form>
	
	
	
	
	<?php
		$typy_plikow=array("image/gif", "image/jpeg", "image/png");
		if(isset($_FILES['plik'])){
			print_r($_FILES['plik']);
			switch($_FILES['plik']['error']){
				case 0;
				if(in_array($_FILES['plik']['type'],$typy_plikow)){
				move_uploaded_file($_FILES['plik']['tmp_name'], "obrazy/".md5(md5(rand()*rand()*rand()+2*rand())).$_FILES['plik']['name']);
				echo "Gratulacje. Plik został pomyślnie przesłany na serwer.";
				}
				else echo "Niedozwolone rozszerzenie pliku.";
				break;
				case 1;
				echo "Zbyt duży plik. Proszę sprawdzić php.ini";
				break;
				case 2;
				echo "Zbyt duży plik";
				break;
				case 3;
				echo "Niekompletny plik";
				break;
				case 4;
				echo "Nie wybrano pliku.";
				break;
				default:
				echo "Nieprzewidziany błąd.";
			}
		}
	?>
</body>
</html>
