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

#placeInfo{
    margin-top: 15px;
}

#placeDesc{
    text-align: justify;
}

.placeDetailImg{
    width:330px;
    height:auto;
    border:5px double #DDD;
}

.commentBox{
    height:150px;
    margin-bottom:10px;
}

.commentArea{
    margin-top:30px;
}

.btn-this{
    width:160px;
}

.btnArea{
    margin-top:5px;
    text-align: justify;
}

.img-thumbnail{
    height:140px;
    width:auto;
    float:left;
    margin-left:15px;
}

#commentTime{
    margin-left:15px;
    font-size:12px;
    color:gray;
}

#commentUser{
    font-size:20px;
}

#commentCon{
    margin:auto 10px;
}

</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
    <div class="row headerSpace">
        <div id='sideNav' class="col-sm-3 col-md-2 navbar-collapse collapse sidebar">
            <ul class="nav nav-sidebar">
                <li id='overview' class='non-active'><a id='oLink' href="#">Overview</a></li>
                <li id="restaurant" class='non-active'><a id='rLink' href='#'>Restaurants</a></li>
                <li id="landmark" class='non-active'><a id='lLink' href="#">Landmarks</a></li>
                <li id="shopping" class='non-active'><a id='sLink' href="#">Shopping Malls</a></li>
                <li id="hotel" class='non-active'><a id='hLink' href="#">Hotels</a></li>
            </ul>
        </div>

        <div id="mainBody" class="col-sm-9 col-md-10">
            <div class="cityInfoContainer">
                <h1 id='placeName'></h1><hr/>
                <div class="row">
                    <div id='otherInfo' class="col-xs-6 col-sm-4 placeholder ">
                        <img id='placeImg' class='placeDetailImg' src='' />
                        <div class='btnArea'>
                            <a id="wannaGo" class="btn btn-info btn-this">Wanna Go</a>
                            <a id="beenThere" class="btn btn-info btn-this">Been There</a>
                        </div><br>
                        <div class='starRate'>
                            <?=anchor("interaction/addRating/".$placeInfo['placeID']."/5", "☆")?>
                            <?=anchor("interaction/addRating/".$placeInfo['placeID']."/4", "☆")?>
                            <?=anchor("interaction/addRating/".$placeInfo['placeID']."/3", "☆")?>
                            <?=anchor("interaction/addRating/".$placeInfo['placeID']."/2", "☆")?>
                            <?=anchor("interaction/addRating/".$placeInfo['placeID']."/1", "☆")?>
                        </div>
                        <div id='placeInfo'>
                                <p id='placeAddress'></p>
                                <p id='placeContact'></p>
                        </div>
                    </div>

                    <div id='mainInfo' class="col-xs-6 col-sm-8 description">
                        <p id='placeDesc'class="cityInfoFont"></p>
                    </div>
                </div>

                <div class="commentArea">
                    <h4>Comment:</h4>
                    <div id='commentDisplay'> <!--            **************               -->
                        <div class="row" id='commentCon'>
<!--
                            <img src= '<?= base_url()?>/assets/images/profile.png' class="img-thumbnail col-xs-6 col-sm-3">
                            <div id='commentMsg' class='col-xs-6 col-sm-10'>
                                <span id="commentUser">abc</span>
                                <span id="commentTime">2014-07-02</span>
                                <p id="commentContent">This is a very good place! </p>
                            </div>
-->
                        </div>
                    </div>
                    <div class="form-group commentArea">
                        <?php
                            echo form_open('interaction/insertComment/'.$placeInfo['placeID'], "class='form-group' role='textarea' row='5'");
                            echo form_textarea('content',set_value(), "class='form-control' placeholder='Write your comments here...'", "required");
                            echo "<br>";
                            echo form_submit('submit', 'Submit', "class = 'btn btn-info com_button'");
                            echo form_close();
                    ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
<!-- JavaScript -->
<script>
    $(document).ready(function() {
        var place = <?php echo json_encode($placeInfo);?>;
        var cn = <?php echo json_encode($cityName);?>;
        var commentList = <?php echo json_encode($commentList);?>;
        $('#placeName').html(place.name);
        $('#placeDesc').html(place.desc);
        if(place.name == "Error") {
            $('#otherInfo').remove();
        }
        else {
            /* Side Nav */
            $('#oLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn);
            $('#rLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/restaurant");
            $('#lLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/landmark");
            $('#sLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/shopping");
            $('#hLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/hotel");

            $('#pType').html(place.type);
            $("#placeImg").attr("src", "<?php echo base_url();?>" + place.picURL);
            $('#placeAddress').html("<strong>Address: </strong><br>" + place.address);
            $('#placeContact').html("<strong>Contact: </strong> " + place.contact);
            $('#wannaGo').attr("href", "<?php echo base_url();?>interaction/wantToGo/" + place.placeID);
            $('#beenThere').attr("href", "<?php echo base_url();?>interaction/placeBeen/" + place.placeID);
            var htmlText="";
            if (commentList.name == 'Error'){
                htmlText = "<p style='margin-left:15px;'>No comment yet! Say something!";
            }
            else{
                $.each(commentList, function(i, item) {
                    if(item.picture_url==null){
                        item.picture_url = '/assets/images/profile.png';
                    }
                    if(item.rating==null){
                        item.rating = 0;
                    }
                    htmlText = htmlText + "<div class='row'><img src= '<?= base_url()?>/" + item.picture_url + "' class='img-thumbnail col-xs-6 col-sm-3'/>"+
                                    "<div id='commentMsg' class='col-xs-6 col-sm-10'>"+
                                        "<span id='commentUser'>"+item.username+"</span>"+
                                        "<span id='commentTime'>"+item.time+"</span>"+
                                        "<p>" + Array(parseInt(item.rating)+1).join('★')+ "</p>" +
                                        "<p id='commentContent'>"+item.content+"</p></div></div><hr/>";
                });
            }
            $('#commentCon').append(htmlText);
        }
    });
</script>

<?=$this->load->view("Template/footer")?>
