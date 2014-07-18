<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Trav_well/assets/css/style.css" rel="stylesheet">
<link href="/Trav_well/assets/css/navg_style.css" rel="stylesheet">
</head>

<body>
	<?=$this->load->view("Template/header")?>
    <div class="conntainer-fluid">
    	<div class="row headerSpace">
            <div class="col-sm-3 col-md-2">
              <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview</a></li>
                <li class='non-active'><?php echo anchor('sidebar/restaurantPage', 'Restaurants')?></li>
                <li class='non-active'><a href="#">Landmarks</a></li>
                <li class='non-active'><a href="#">Shopping Malls</a></li>
                <li class='non-active'><a href="#">Hotels</a></li>
              </ul>
            </div>

            <div class="col-sm-9 col-md-10">
            <div class='cityInfoContainer'>
          		<h1 class="cityInfoHeader">Toronto</h1><hr />
                	<img class="cityInfoImg" src="/Trav_well/assets/images/cityToronto.jpg" />
                    <p class='cityInfoFont'>
                    <?php
					?>
                		One of Canada’s best kept secrets, Toronto is on par with New York City, San Francisco, and Chicago when it comes to cultural attractions and urban endeavors.<br /><br />

The best place to start is at the top; and in Toronto, there’s no mistaking where that is. The landmark CN Tower is the tallest free-standing structure in the West (Malaysia has a taller free-standing structure), and also an important telecommunications hub. Take the elevator to the top for a breathtaking view of the city and its surrounding areas. <br /><br />

The CN Tower is situated close to Lake Ontario.  From there, you can work your way north and explore the rest of what T.O. (Toronto, Ontario) has to offer. Right next door to the Tower, at the Rogers Centre (formerly SkyDome), you can catch a Blue Jays baseball game in the summer, or just walk around the massive stadium. Newly opened, the Ripley's Aquarium of Canada sits at the base of the CN Tower and is ideal for families and aquatic lovers alike.<br /><br />

Also in and around the city, check out the Royal Ontario Museum, the largest in Canada, with fascinating archaeology and natural history exhibits. There’s also the Art Gallery of Ontario, with a fine collection of European and Canadian works. If you’re into shopping, don’t miss the wide array of funky stores, ethnic restaurants — and of course the Eaton Centre (one of the city's largest indoor shopping malls) — all on Queen Street West. <br /><br />

For a relaxing experience, head back down to the waterfront and enjoy Toronto’s Harbourfront, a complex of unique shops and restaurants right on beautiful Lake Ontario. If you’re all shopped out, enjoy a nice stroll on the boardwalk and take in the great views of the city skyline.  From Harbourfront, you can escape the hustle and bustle of the city with a hop on the ferry to the Toronto Islands, an excellent spot for a picnic and some outdoor recreation. <br /><br />

Toronto is a great destination for singles, families and executives. It is an incredibly clean, safe and easy city to get around, either on foot or by public transportation.

                    </p>
            	</div>
        	</div>
		</div>
<?=$this->load->view("Template/footer")?>
