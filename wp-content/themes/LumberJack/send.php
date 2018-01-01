<? 
//print_r($_POST);
if(!($empty['text-830']) && !empty($_POST['tel-787']) && !empty($_POST['email-410']))
{
	

	
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: ".$_POST['email-410']."\r\n";
		$td1_style = "border: 1px solid #000; max-width: 140px; padding: 5px 10px; font-weight: bold; background-color: #e8e8e8;";
	$td2_style = "border: 1px solid #000; max-width: 460px; min-width: 300px; padding: 5px 10px;";
	$msg_top = "
		<html>
			<body>
				";
				$msg_bot = "			<tr>
						<td style=\"$td1_style font-size:30px;color:red; vertical-align: top;\">Общая цена</td>
						<td style=\"$td2_style font-size:30px;color:red; \">".$_POST['text-832']." грн</td>
					</tr>
				</table>
			</body>
		</html>";
		$msg_user = "
					<tr>
						<td style=\"$td1_style vertical-align: top;\">ФИО</td>
						<td style=\"$td2_style\">".$_POST['text-830']."</td>
					</tr>
					
					<tr>
						<td style=\"$td1_style vertical-align: top;\">Телефон</td>
						<td style=\"$td2_style\">".$_POST['tel-787']."</td>
					</tr>
					
					";
					$message=$msg_top.$_POST['text-831'].$msg_user.$msg_bot;
					
	
		$subject = " Новый заказ ";
			mail("lumberbarber@gmail.com", $subject, $message, $headers) or print "Не могу отправить письмо !!!";
			echo '<div class="wpcf7-response-output wpcf7-display-none wpcf7-mail-sent-ok" style="display: block;" role="alert">Ваш заказ совершен успешно. В ближайшее время наш менеджер свяжется с вами. Спасибо.</div>';
}
else
	{
		echo '<div class="wpcf7-response-output wpcf7-display-none wpcf7-validation-errors" style="display: block;" role="alert">Ошибки заполнения. Пожалуйста, проверьте все поля и отправьте Ваш заказ снова.</div>';
	}
			?>