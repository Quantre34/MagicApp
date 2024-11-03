<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<?php $ayarlar=myquery("SELECT * FROM contact"); ?>

<?php
	$target=clr_text($_GET["target"]);

	if($target=="" OR $target=="home"){
		$data=msq("SELECT * FROM seo_calisma WHERE secretkey='home'");
		echo '<title>'.$data[0][seotitle].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';

	}elseif ($target=="kurumsal") {
		$data=msq("SELECT * FROM seo_calisma WHERE secretkey='kurumsal'");
		echo '<title>'.$data[0][seotitle].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';
		 
	}elseif ($target=="videos") {
		$data=msq("SELECT * FROM seo_calisma WHERE secretkey='videos'");
		echo '<title>'.$data[0][seotitle].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';
		 
	}elseif ($target=="referans") {
		$data=msq("SELECT * FROM seo_calisma WHERE secretkey='referans'");
		echo '<title>'.$data[0][seotitle].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';
		 
	}elseif ($target=="makale") {
		$id=clr_text($_GET["id"]);
		if($id!=""){
			$data = myquery("SELECT * from blog where id=$id");
			echo '<title>'.$data[0][nametr].'</title>
				<meta name="description" content="'.$data[0][seodesc].'">
				<meta name="keywords" content="'.$data[0][seokeyword].'">
			';

		}else{
			$data=msq("SELECT * FROM seo_calisma WHERE secretkey='makale'");
			echo '<title>'.$data[0][seotitle].'</title>
				<meta name="description" content="'.$data[0][seodesc].'">
				<meta name="keywords" content="'.$data[0][seokeyword].'">
			';

		}
		
		 
	}elseif ($target=="contact") {
		$data=msq("SELECT * FROM seo_calisma WHERE secretkey='contact'");
		echo '<title>'.$data[0][seotitle].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';
	}elseif ($target=="detay") {
		unset($data,$id,$url);
	    $id = intval(clr_text($_GET['id']));
	    $data = myquery("SELECT * from product where id=$id");
	    $catid=$data[0]['cat_id'];
		$cat=myquery("select * from category where id=$catid");
		$url = "http://ledgaranti.com.tr/urunler/".$id."/".url_to_lat(strtolower($data[0]['nametr']))."/";
		echo '<title>'.$data[0][nametr].'</title>
			<meta name="description" content="'.$data[0][description].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">  
			<meta property="og:url" content="'.$url.'" />
		    <meta property="og:type" content="article" />
		    <meta property="og:title" content="'.$data[0]['nametr'].'" />
		    <meta property="og:description" content="'.$data[0][description].'" />
		    <meta property="og:image" content="http://ledgaranti.com.tr/img/'.$data[0][image].'" />
		    <meta property="og:image:secure_url" content="http://ledgaranti.com.tr/img/'.$data[0]['image'].'" />
		    <link rel="image_src" href="http://ledgaranti.com.tr/img/'.$data[0]['image'].'"/>
			<meta property="fb:app_id" content="113194226044164" />
			<meta property="og:locale" content="en_US" />';
	}elseif($target=="category"){
		$id=intval($_GET["id"]);
		
		$data=msq("SELECT * FROM category WHERE id='$id'");
		echo '<title>'.$data[0][nametr].'</title>
			<meta name="description" content="'.$data[0][seodesc].'">
			<meta name="keywords" content="'.$data[0][seokeyword].'">
		';
	}
	
?>
<meta name="author" content="BERANET">
<meta name="robots" content="index,follow">
<link rel="canonical" href="https://www.ledgaranti.com.tr/blog/" />
<base href="<?=$config['siteurl']?>" />
<link href="<?=$config['siteurl']?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>css/style.css?<?=strtotime('now')?>" rel="stylesheet">
<link href="<?=$config['siteurl']?>wow/animate.min.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>css/bootstrap-select.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>css/efect.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>css/responsive.css" rel="stylesheet">
<link href="<?=$config['siteurl']?>css/lightbox.css" rel="stylesheet">


<link rel="apple-touch-icon" sizes="57x57" href="<?=$config['siteurl']?>/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?=$config['siteurl']?>/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=$config['siteurl']?>/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?=$config['siteurl']?>/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=$config['siteurl']?>/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?=$config['siteurl']?>/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?=$config['siteurl']?>/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?=$config['siteurl']?>/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=$config['siteurl']?>/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?=$config['siteurl']?>/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=$config['siteurl']?>/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?=$config['siteurl']?>/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=$config['siteurl']?>/icon/favicon-16x16.png">
<link rel="manifest" href="<?=$config['siteurl']?>/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?=$config['siteurl']?>/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">




<!--  fancybox-->
<link rel="stylesheet" href="<?=$config['siteurl']?>css/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$config['siteurl']?>css/fancybox/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZMF0CZXP5T"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZMF0CZXP5T');
</script>


</head>
