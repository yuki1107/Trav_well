<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<link href="<?= base_url()?>/css/navg_style.css" rel="stylesheet">
<style>

.toronto-header{
	font-size:50px;
	font-family:"Comic Sans MS", cursive;
	font-weight:bold;
}

.TextWrap{
	float:right;
	margin:20px;
	margin-right:50px;
	border:5px double #63C;
}

p {
    font-size:16px;
}

#spaceLine{
    font-size: 84%;
	line-height: 5.0em;
	margin: 0 0 1.4em 1em;
	color:#545454;
	width:auto;
}

</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>
    <?=$this->load->view("Template/navg_bar")?>
            <div class="col-sm-9 col-md-10 main">
          		<h1 class="toronto-header">Toronto</h1>
                <div id="spaceLine"></div>
              	<div class>
                	<img class="cityImg TextWrap" src="<?= base_url()?>/images/cityToronto.jpg" />
                    <p>	
                		One of Canada’s best kept secrets, Toronto is on par with New York City, 
                    	San Francisco, and Chicago when it comes to cultural attractions and urban
                    	endeavors.
                    </p>
                    <p>
                        The best place to start is at the top; and in Toronto, there’s no mistaking where that is. The landmark CN 						Tower is the tallest free-standing structure in the West (Malaysia has a taller free-standing structure), 		
                        and also an important telecommunications hub. Take the elevator to the top for a breathtaking view of the 	
                        city and its surrounding areas. 
                    </p>
                    <p>
                        The CN Tower is situated close to Lake Ontario.  From there, you can work your way north and explore the 	
                        rest of what T.O. (Toronto, Ontario) has to offer. Right next door to the Tower, at the Rogers Centre 
                        (formerly SkyDome), you can catch a Blue Jays baseball game in the summer, or just walk around the massive
                        stadium. Newly opened, the Ripley's Aquarium of Canada sits at the base of the CN Tower and is ideal for 
                        families and aquatic lovers alike.
                    </p>
                    <p>
                    	Also in and around the city, check out the Royal Ontario Museum, the largest in Canada, with fascinating 
                        archaeology and natural history exhibits. There’s also the Art Gallery of Ontario, with a fine collection 
                        of European and Canadian works. If you’re into shopping, don’t miss the wide array of funky stores, ethnic
                        restaurants — and of course the Eaton Centre (one of the city's largest indoor shopping malls) — all on 
                        Queen Street West. 
                    </p>
                    <p>
                    	For a relaxing experience, head back down to the waterfront and enjoy Toronto’s Harbourfront, a complex of
                        unique shops and restaurants right on beautiful Lake Ontario. If you’re all shopped out, enjoy a nice 
                        stroll on the boardwalk and take in the great views of the city skyline.  From Harbourfront, you can 
                        escape the hustle and bustle of the city with a hop on the ferry to the Toronto Islands, an excellent spot
                        for a picnic and some outdoor recreation. 
                    </p>
                    <p>
                    	Toronto is a great destination for singles, families and executives. It is an incredibly clean, safe and 
                        easy city to get around, either on foot or by public transportation.
                    </p>
            	</div>
        	</div>
		</div>
<?=$this->load->view("Template/footer")?>
