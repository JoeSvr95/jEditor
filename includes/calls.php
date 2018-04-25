<?php
	if (isset($_POST['op'])) {
		$op = $_POST['op'];
		$file = $_POST['file'];
		switch ($op) {
			case 'trans':
				$command = $_POST['command'];
				$value = $_POST['value'];
				$result = exec("python ../py/trans.py $command $value $file");
				break;
			case 'filter':
				$command = $_POST['command'];
				$result = exec("python ../py/filters.py $command $file");
				break;
			default:
				$result = "No operation found";
				break;
		}
		echo json_encode($result);
	} else {
		echo "No command or value found";
	}