<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title>
    <?php
    bloginfo('name');
    ?>
    <?php
    wp_title();
    ?>
</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>" 
charset="<?php bloginfo('charset');?>/">
<meta name="generator" content="WordPress<?php bloginfo('version') ?>">
 <!-- bloginfo(’stylesheet_url’); -->
 <!-- 是一个 PHP 函数，它能取得 style.css 文件所在的路径
 这样主题就能使用 style.css 文件来样式化页面上的所有元素. -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>" type="text/css" media="screen">
<link rel="alternate" type=" application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url');?>">
<link rel="alternate" type="text/xml" title="RSS .92" href=" <?php bloginfo('rss__url'); ?>">
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url');?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) );?>
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_ popup_ script(); // off by default ?>
<?php wp_head(); ?>
</head>

<body id="wrapper">
<!-- bloginfo('name') - 调用博客信息，具体是博客的标题 -->
<!-- bloginfo('description')-博客描述 -->
<div id="header">
<h1 ><a name="toc-7"></a><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php bloginfo('description'); ?>
</div>