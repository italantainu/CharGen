<?php
	require_once 'character.class.php';

	if (isset($_GET['s'])) {
		$params = array();
		foreach ($_GET as $param=>$value) {
			if ($param != 's') {
				$params[$param] = $value;
			}
		}
		$character = new character($_GET['s'],$params);
	} else {
		$character = new character();
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Character Generation</title>
	</head>
	<body>
		<form method="get">
			<table>
				<tr>
					<td>Seed</td>
					<td>
						<input type="text" name="s" value="<?php echo (isset($_GET['s'])) ? $_GET['s'] : '';?>" />
					</td>
				</tr>
				<?php
				foreach ($character->listAttributeInitParams() as $param) {
					$value = (isset($_GET[$param])) ? $_GET[$param] : '';
					echo "<tr><td>$param</td><td><input type=\"text\" name=\"$param\" value=\"$value\" /></td></tr>";
				}
				?>
				<tr>
					<td colspan="2" style="text-align: right;">
						<input type="submit" value="Generate character" />
					</td>
				</tr>
			</table>
			<hr />
			<table>
				<tr>
					<td>Seed</td>
					<td>
						<?php echo$character->seed; ?>
					</td>
				</tr>
				<?php
				foreach ($character->listAttributes() as $attribute) {
					echo "<tr><td>$attribute</td><td>".$character->$attribute."</td></tr>";
				}
				?>
			</table>
		</form>
	</body>
</html>

