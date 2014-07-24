<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<style>
.bigImageBar{
	text-align:center;
	padding-top:48px;
	background-color: #b0c4de;

}

.icon {
	width:200px;
	margin:5px;
    opacity: 0.4;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}

.icon:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}

.iconBar{
	text-align:center;
	margin:20px auto;
}
</style>
</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
            <div class="bigImageBar">
                <img class="bigImage" src="<?php echo base_url();?>assets/images/TorontoImg.jpg"/>
            </div>
            <div id='cityLinks' class="iconBar"></div>
        </div><!-- content -->

<!-- JavaScript -->
<script type="text/javascript">
    $(document).ready(function() {
        var listCities = <?php echo json_encode($cities); ?>;

        /* Create city links */
        $.each(listCities, function(i, city) {
            var html = "<a id='" + city.name + "' href='<?php echo base_url('home'); ?>/view_city/" + city.name +"'>" +
                        "<img class='icon' src='<?php echo base_url(''); ?>" + city.icon_url + "'></img></a>";
            $('#cityLinks').append(html);
        });
    });
</script>

<?=$this->load->view("Template/footer")?>
