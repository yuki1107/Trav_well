<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/rating.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
<style>
.b{
	text-indent: 60px;
}
.description{
	padding-left:80px;
}

.starRate {
  unicode-bidi: bidi-override;
  direction: rtl;
  text-align: left;
  font-size: 20;
}
.starRate > a {
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.starRate > a:hover:before,
.starRate > a:hover ~ a:before {
   content: "\2605";
   position: absolute;
}

h1{
  font-family:"Georgia, serif", cursive;
  font-size: 50px;
}

</style>
</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
            <div class="headerSpace">
                <div class="container">
                  	<h1 id='pageName'>Search Result</h1><hr />
                    <div id='listResults' class='listContainer'>
                    </div><!--listContainer-->
                </div><!--cityInfoContainer-->
            </div><!-- headerSpace -->
      </div><!-- content -->
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var sRes = <?php echo json_encode($search_result);?>;
        if(!sRes) {
          $('#pageName').html('Search Error');
          $('#listResults').append('<p>Keyword not found</p>');
        }
        else
        {
          $.each(sRes, function(i, item) {
            var htmlText = "<div id='place"+i+"' class='row placeholders listElement'>" +
                              "<div class='col-xs-6 col-sm-3 placeholder'><img class='placeInfoImg' src='<?php echo base_url();?>"+item.picURL+"'/></div>" +
                              "<div id='"+item.name+"' class='col-xs-6 col-sm-9 description'>"+
                                  "<address><h4><a href='<?php echo base_url('home'); ?>/view_place/" + item.name +"'>"+item.name+"</a></h4>"+item.address+"<br/><abbr>Contact: </abbr>"+item.contact+"</address>" +
                                   "<div class='starRate'>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/1'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/2'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/3'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/4'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/5'>☆</a>" +
                              "</div>" +
                              "<br>" +
                                   "<div><a class='btn btn-info' href='<?php echo base_url(); ?>interaction/wantToGo/" + item.placeID + "'>Wanna Go</a> <a class='btn btn-info' href='<?php echo base_url(); ?>interaction/placeBeen/" + item.placeID + "'>Been There</a>" +
                                   "</div></div><!--description--></div><!--row-->";
            $('#listResults').append(htmlText);
          });
        }
    });
</script>
<?=$this->load->view("Template/footer")?>
