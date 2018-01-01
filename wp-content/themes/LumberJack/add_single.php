<?php
/**
 * Обработчик формы
 *  
 */
//Если форма была отправленна, то выводим ее содержимое на экран
//Summa
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

if(isset($_REQUEST["kolichestvo"]))
	{
		$_POST["kolichestvo"]=$_REQUEST["kolichestvo"];
	}





if (isset($_POST["ID"])) {	
	if(isset($_SESSION["Mass"]))
	{
		
	$bool=false;
		for($i=0;$i<count($_SESSION["Mass"]);$i++)
		{
		$temp=$_SESSION["Mass"][$i];
			if($temp["ID"]==$_POST["ID"])
			{
				
		$_SESSION["Mass"][$i]["kolichestvo"]+=$_POST["kolichestvo"];
  $bool=true;
			}
		}
			if($bool==false)
			{
					$mass=array("ID"=>$_POST["ID"],"Title"=>$_POST["Title"],"Price"=>$_POST["Price"],"Image"=>$_POST["Image"],"kolichestvo"=>$_POST["kolichestvo"]);
	array_push($_SESSION["Mass"],$mass);
			}
	}
	else
	{
		
	$mass=array(array("ID"=>$_POST["ID"],"Title"=>$_POST["Title"],"Price"=>$_POST["Price"],"Image"=>$_POST["Image"],"kolichestvo"=>$_POST["kolichestvo"]));
	$_SESSION["Mass"]=$mass;
	}
	
	for($i=0;$i<count($_SESSION["Mass"]);$i++)
{
		$a=intval($_SESSION["Mass"][$i]["kolichestvo"]);
  $b=floatval($_SESSION["Mass"][$i]["Price"]);
  $summa+=$a*$b;
  
}
$summa;
$td1_style = "border: 1px solid #000; max-width: 140px; padding: 5px 10px; font-weight: bold; background-color: #e8e8e8;";
	$td2_style = "border: 1px solid #000; max-width: 460px; min-width: 300px; padding: 5px 10px;";
	if(empty($summa))
	{
		
$result=0;
	}
	else{
		
$result=$summa;
	}
	echo '

			
					<ul>';
					if(isset($_SESSION["Mass"])) {

						
					
						for($i=0;$i<count($_SESSION["Mass"]);$i++) {
						
						
							$mass=$_SESSION["Mass"][$i];
						echo '<li class="col-lg-12 padding-0">';
							echo '<form method="post"  id="form_id'.$mass["ID"].'">';
								echo '<input hidden name="ID" value="'.$mass["ID"].'">
							<div class="col-lg-4 cart-left-full">';
								echo '<button onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/clearTovar.php\');return false;" class="remove-product">' .'</button>

								
								<img src="'.$mass["Image"].'">
							</div>
							<div class="prod-desc-cart col-lg-8">
								<div class="title-prod">
									<span>'.$mass["Title"].'</span>
								</div>
								<div class="cart-count">
									<span class="text-cnt">Кол-во:</span>
									<div class="select-count">
										<input name="kolichestvo" type="text" onchange="AjaxChange(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/Change.php\', this.value ); return false;" class="count-cart" value="'.$mass["kolichestvo"].'">
											
								<input hidden name="kolichestvo" value="'.$mass["kolichestvo"].'">
										<span class="count-php" style="display:none;"></span>
										<div class="btns-full-cart">
											<span class="btns-cart-line"></span>
											<button  name="plus" class="plus-cart" onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/form.php\'); return false;" ></button>
											<button name="minus" class="minus-cart" onclick="AjaxFormRequest(\'product-list\', \'form_id'.$mass["ID"].'\', \'/wp-content/themes/LumberJack/Minus.php\'); return false;" ></button>
										</div>
									</div>
								</div>
							</div>
							</form>
						</li>';
						$msg_tovar.="
					<tr>
						<td style=\"$td2_style\">".$_SESSION["Mass"][$i]["Title"]."</td>
						<td style=\"$td2_style\">".$_SESSION["Mass"][$i]["kolichestvo"]."</td>						
						<td style=\"$td2_style\">".($_SESSION["Mass"][$i]["Price"]*$_SESSION["Mass"][$i]["kolichestvo"])." грн</td>
					</tr>";
						}
					
	$msg_top = "
		
				<table style=\"border-collapse: collapse;\">
					<tr>
						<td style=\"$td1_style\">Название товара</td>
						<td style=\"$td1_style\">Количество</td>
						<td style=\"$td1_style\">Цена</td>
						
					</tr>";
					
	
	

		
					$message=$msg_top.$msg_tovar;
					echo '	
					</ul>
					<div id="for-order">
						<span class="info-text-left">Всего к оплате:</span>
						<span id="pay-sum">'.$result.' грн</span>
					</div>
					<div id="to-order">
						<div class="order-title">Контакты получателя</div>
						<div id="do-order">
						<div role="form" class="wpcf7" id="wpcf7-f110-o1" lang="ru-RU" dir="ltr">
<div class="screen-reader-response"></div>
<form method="post" id="sendMessage" class="wpcf7-form" novalidate="novalidate">

<p><span class="wpcf7-form-control-wrap text-830"><input type="text" name="text-830" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Ф.И.О"></span><br>
<span class="wpcf7-form-control-wrap tel-787"><input type="tel" name="tel-787" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Номер телефона"></span><br>
<span class="wpcf7-form-control-wrap email-410"><input type="email" name="email-410" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Ваш e-mail"></span><br>
<span class="wpcf7-form-control-wrap text-831" style="display:none"><input type="text" name="text-831" hidden value=\'"'.$message.'"\' size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required hidden_input" id="order-list" aria-required="true" aria-invalid="false"></span><br>
<span class="wpcf7-form-control-wrap text-832"><input type="text" name="text-832" hidden value="'.$result.'" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required hidden_input" id="last-price" aria-required="true" aria-invalid="false"></span><br>
<input type="submit" onclick="AjaxFormRequest(\'product-list\', \'sendMessage\', \'/wp-content/themes/LumberJack/send.php\'); return false;"  value="Отправить" class="wpcf7-form-control wpcf7-submit" id="send-order-btn"><img class="ajax-loader" src="http://lumber-jack.crystal-arts.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Отправка..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>'; ?>
							<?php //echo do_shortcode('[contact-form-7 id="110" title="Trade"]'); 
			
						echo '</div>
					</div>
				
				';
	
					}
	}
	
	
				?>