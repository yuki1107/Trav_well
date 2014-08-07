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
  margin-left:50px;
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
            <div class="headerSpace">
                <div class="container">
                  	<h1 id='pageName'>Search Result</h1><hr />
                    <div id='listResults' class='listContainer'>
                    </div><!--listContainer-->
                    <ul class="pager">
                      <li id='previous' class="previous"><a href="#">&larr; Previous</a></li>
                      <li id='next' class="next"><a href="#">Next &rarr;</a></li>
                    </ul>
                </div><!--cityInfoContainer-->
            </div><!-- headerSpace -->
      </div><!-- content -->
<!-- JavaScript -->
<script>
    $(document).ready(function() {
        var sRes = <?php echo json_encode($search_result);?>;
        if(!sRes) {
          $('#pageName').html('Search Error');
          $('#listResults').append('<p>Keyword not found</p>');
        }
        else
        {
          var htmlText = '';
          $.each(sRes, function(i, item) {
            if(i%5==0){
              htmlText = htmlText + "<div id='page"+i/5+"' >";
            }
            htmlText = htmlText + "<div id='place"+i+"' class='row placeholders listElement'>" +
                              "<div class='col-xs-6 col-sm-4'><img class='placeInfoImg' src='<?php echo base_url();?>"+item.picURL+"'/></div>" +
                              "<div id='"+item.name+"' class='col-xs-5 col-sm-6 description'>"+
                                  "<address><h4><a href='<?php echo base_url('home'); ?>/view_place/" + item.name +"'>"+item.name+"</a></h4>"+item.address+"<br/><abbr>Contact: </abbr>"+item.contact+"</address>" +
                                   "<div class='starRate'>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/5'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/4'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/3'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/2'>☆</a>" +
                                      "<a href='<?php echo base_url();?>interaction/addRating/" + item.placeID + "/1'>☆</a>" +
                              "</div>" +
                              "<br>" +
                                   "<div><a class='btn btn-info' href='<?php echo base_url(); ?>interaction/wantToGo/" + item.placeID + "'>Wanna Go</a> <a class='btn btn-info' href='<?php echo base_url(); ?>interaction/placeBeen/" + item.placeID + "'>Been There</a>" +
                                   "</div></div><!--description--></div><!--row-->";
            if(i%5==4){
              htmlText = htmlText + "</div>";
            }
          });
          if (sRes.length%5!=0){
            htmlText = htmlText + "</div>";
          }
        $('#listResults').append(htmlText);
        }

        /* Pagination */ 
        $('#page0').attr('class','onPage');
        for(i=1; i<=(sRes.length/5); i++){
          var hidePage = '#page'+i;
          $(hidePage).hide();
        }

        $('#next').click(function(){
          var current = document.getElementsByClassName('onPage')[0];
          var hidePage = '#' + current.id;
          var nextPage = current.id.match('[0-9]');
          var showPage = '#page' + (parseInt(nextPage)+1);
          if ($(showPage).length == 0){
            alert('This is the last page!')
          }
          else{
            $(hidePage).hide();
            $(hidePage).removeClass('onPage');
            $(showPage).show();
            $(showPage).attr('class','onPage');
          }
        })

        $('#previous').click(function(){
          var current = document.getElementsByClassName('onPage')[0];
          var hidePage = '#' + current.id;
          var nextPage = current.id.match('[0-9]');
          var showPage = '#page' + (parseInt(nextPage)-1);
          if ($(showPage).length == 0){
            alert('This is the first page!')
          }
          else{
            $(hidePage).hide();
            $(hidePage).removeClass('onPage');
            $(showPage).show();
            $(showPage).attr('class','onPage');
          }
        })

      });
</script>
<?=$this->load->view("Template/footer")?>
