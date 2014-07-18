<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Trav_well/assets/css/style.css" rel="stylesheet">
<style>
body {
	background-color: #306;

}

.photo{
	width:200px;
	margin:5px;
}

.intro{
	margin-top:90px;
}

.left{
	float:left;
}
</style>

</head>


<body>
<?=$this->load->view("Template/header")?>

	<div class="container">
    	<div class="intro">
            <div class="jumbotron row">
            	<div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/1.gif"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                	<p><b>Fujun Shen</b></p>
                    <p>I was born in Harbin, which located in the North-East of China. In 2008, I was first time landed in Canada. During my leisure time, I enjoy playing tennis, watching movies and also going for a trip.</p>
                </div>
            </div>

            <div class ="jumbotron row">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/2.gif"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                	<p><b>Sean Gallagher</b></p>
                    <p>I was born and raised in Toronto and am currently a 3rd year student at UofT. I really enjoy all aspects of comp sci and have a wide range of experience working for companies like Scotiabank, Ontario Teachers' Pension Plan and Statistics Canada. When I'm not writing code, I can be found competing in chess tournaments, going for runs, or eating sushi at local restaurants.</p>
                </div>
            </div>

            <div class="jumbotron row">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/3.gif"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                	<p><b>Feifei Ding (Sophie)</b></p>
                    <p>I was born in China moved to Canada few years ago. I have travelled some cities in both countries, such as Vancouver, Toronto, and Shanghai, and I really enjoy the moment of travelling. I like outdoor activities, psychology, and detective novel.</p>
                </div>
            </div>

            <div class="jumbotron row">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/4.gif"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                	<p><b>Yuxiu Wang (Emmy)</b></p>
                    <p>I was born in china and moved to Canada four years ago. I am second year  student at University of Toronto. I am interested computer programing  environment science and designing and enjoy in learning them. when I am  free, I love to have small trip and also travel with my friends! </p>
                </div>
            </div>

            <div class="jumbotron row">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/5.gif"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                	<p><b>Ying qi He (Yuki) </b></p>
                    <p>I am currently 2nd years Computer Science Student in U of T. I was born in China and moved to Canada few years ago. I like drawing and designing. I am familiar with using Adobe design software. Building website about traveling is fun, remains me about my hometown. </p>
                </div>
            </div>
            <div class="jumbotron row">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img class="photo" src="/Trav_well/assets/images/6.jpg"/>
                </div>
                <div class="col-xs-6 col-sm-9 description">
                    <p><b>Monica Li </b></p>
                    <p>Born in Toronto and growing up in the GTA region, I've always had a variety of interests. I just finished my third year of computer science at the University of Toronto. My love for programming drew me away from my love of physics and here I am. I hope to one day create awesome new things in the tech world and love exploring new ways of interacting with tech.</p>
                </div>
            </div>
    	</div>
    </div>

<?=$this->load->view("Template/footer")?>
