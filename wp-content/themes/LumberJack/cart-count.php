
<? session_start();
 if(count($_SESSION["Mass"])!=0)
 {


	for($i=0;$i<count($_SESSION["Mass"]);$i++)
{
		$a=intval($_SESSION["Mass"][$i]["kolichestvo"]);
  
  $countGoods+=$a;
}
$countGoods;
						echo $countGoods;
						}
						else{
							echo 0;
						} ?>