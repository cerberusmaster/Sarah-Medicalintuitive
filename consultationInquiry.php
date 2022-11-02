<?php
if(empty($_POST)) {
    exit;
}

$to = 'sarah@medicalintuitives.com';
$subject = 'About Your Intuitive Consultation';
$from = "{$_POST['fname']} {$_POST['lname']} <{$_POST['email']}>";
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Medical Intuitive</title>
	<title></title>
</head>
<body style="font-family: Arial; font-size: 15px; background: #f3f3f3;padding: 20px 0;">
	<div style="max-width:580px; margin:20px auto; background: #FFF; padding: 20px;">
		<div style="margin-bottom: 40px;">
			<a href="#" style="color: #000; font-weight: 700; text-decoration: none;">Medical Intuitive</a>
		</div>
		<div style="line-height: 5px; margin-bottom: 40px;">
			<!-- <p style="color: blue">Lili Comelo</p> -->
			<p style="color: blue"><?php echo $_POST['fname'] . ' ' . $_POST['lname']; ?></p>
			
			<!-- <p style="color: #00afa0; margin-left: 25px;">(609) 571-9006 PST</p> -->
			<p style="color: #00afa0; margin-left: 25px;">
				<a style="color: #00afa0; text-decoration: none;" href="tel:<?php echo $_POST['phone']; ?>"><?php echo $_POST['phone']; ?></a>
				<?php echo $_POST['timezone']; ?>
			</p>
			<!-- <p style="color: blue">92226 S Citrus ave</p> -->
			<p style="color: blue"><?php echo $_POST['address1']; ?></p>
			<p style="color: blue"><?php echo $_POST['address2']; ?></p>
			<!-- <p style="color: blue">Encino, CA 92027 United States</p> -->
			<p style="color: blue"><?php echo $_POST['city'] . ', ' . $_POST['state'] . ' ' .  $_POST['zipcode'] . ' ' . $_POST['country'] ?></p>
			<!-- <p style="margin-left: 25px;"><a href="mailto:" style="color: #00afa0; text-decoration: none">text@gmail.com</a></p> -->
			<p style="margin-left: 25px;"><a href="mailto:<?php echo $_POST['email']; ?>" style="color: #00afa0; text-decoration: none"><?php echo $_POST['email']; ?></a></p>
		</div>
		<table width="100%" cellspacing="5">
			<tr>
				<td>
					<?php echo date("m-d-y"); ?>
				</td>
				<td>
					<?php echo $_POST['occupation']; ?>
				</td>
				<td>
					<?php echo $_POST['lenghttime']; ?>
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="5" align="left">
			<tr>
				<td style="width: 15px;">
					<?php echo $_POST['gender']; ?>
				</td>
                                <td>
                                        <?php echo $_POST['age']; ?>
                                </td>
				<td>
					<?php echo $_POST['height']; ?>
				</td>
				<td>
					<?php echo $_POST['weight']; ?>
				</td>
				<td>
					Seizures: <?php echo $_POST['seizures']; ?>
				</td>
				<td>
					Diagnosis: <?php echo $_POST['diagnosis'] == 'Yes' ? $_POST['diagnosisMsg'] : 'No'; ?>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><p><?php echo !empty($_POST['symptoms']) ? $_POST['symptoms'] : '--'; ?></p>
			</tr>
		</table>
		<p style="font-size: 12px;">
			&copy; <?php echo date('Y'); ?> &copy; 1997 Sarah & Jessica Meredith | 8114 Sun Palm Drive, Kissimmee, Florida 34747<br>
			<span><a href="www.medicalintuitives.com" style="text-decoration: none; color: #000">www.medicalintuitives.com</a> | <a href="tel: (321) 401-4763" style="text-decoration: none; color: #000">(321) 401-4763</a></span>
		</p>
	</div>
</body>
</html>
<?php

$message = ob_get_clean();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: {$from}" . "\r\n";
$headers .= "Reply-To: {$from}" . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

mail($to, $subject, $message, $headers);
echo "Email Sent Successfully";
