<?php
set_time_limit(0);
                                                                                                                                                     
require('phpquery/phpQuery.php');
$urllink="http://www.sgpc.net/hukumnama/indexhtml.asp";
if($urllink!="")
{
?>
<p align="center"><strong>Scraped data from search gurbani site</strong></p>

<?php
		 $file =$urllink;
	
		$doc=phpQuery::newDocumentFileHTML($file);

		$datetime =	pq("center div font[face='Georgia, Times New Roman, Times, serif']")->text();
		echo $datetime;
		
		echo "<br />";
		
		$title =	pq("center div font[color='#000000'] b")->text();
		echo $title;
		
		echo "<br />";
		
		$content1 =	pq("center p[align='justify'] font[color='#000079'] font strong font[color='#cc3333'] font[color='#000000']")->text();
		echo $content1;
			
		echo "<br />";
		
		$left =	pq("div[align='justify'] table tr td[width='75%'] font[color='black']")->text();
		echo $left;
		
		echo "<br />";
		
		$right =	pq("div[align='justify'] table tr td[width='25%'] font[color='black']")->text();
		echo $right;
		
		echo "<br />";
		echo mb_detect_encoding('®');
		$trans = get_html_translation_table(HTML_ENTITIES);
		$content2 =	pq("center table tr td p[align='justify'] font[size='+1'][color='black'][face='WebAkharSlim']")->text();
		echo $cont= mb_convert_encoding($content2, "UTF-8", "ASCII");
		echo iconv('ASCII', 'ISO-8859-1//IGNORE', $content2);;
		

		
		echo "<br />";
		
		$engtitle =	pq("center table tr td[height='16'] div[align='center'] font")->text();
		echo $engtitle;
		
		echo "<br />";
		
		$engcontent =	pq("center table tr td p[align='justify'] font[color='black'][size='3']")->text();
		echo $engcontent;
		
		echo "<br />";
		
		$engleft =	pq(" table[align='center'] tr td[height='23'][width='77%'] font[color='black'][size='3']")->text();
		echo $engleft;
		
		echo "<br />";
		
		$engright =	pq("table[align='center'] tr td[align='right'][height='23'][width='23%'] font[color='black'][size='3']")->text();
		echo $engright;
		
		echo "<br />";
		
		$month =	pq("font[size='1'] select[name='month'] option[selected]")->text();
		echo $month;
		
		echo "<br />";
		
		$day=	pq("font[size='1'] select[name='date'] option[selected]")->text();
		echo $day;
		
		echo "<br />";
		
		$year=	pq("font[size='1'] select[name='year'] option[selected]")->text();
		echo $year;
		
		$date = $month." ".$day.",".$year;
		echo "<br>".date("Y-m-d",strtotime($date));

}
		
?>

