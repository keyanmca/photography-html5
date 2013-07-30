<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/default.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/animations.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/browser.css" />
<?php 
    if(strcmp($page, 'album') === 0)
    {
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/scatter_<?=$album->count();?>.css" />
<?php
    }
?>
<?php
    if(isset($photos_json))
    {
?>
<script type="text/javascript">
    var photos_json = <?= $photos_json; ?>;
</script>
<?php
    }
?>
<script type="text/javascript" src="<?=base_href;?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=base_href;?>js/main.js"></script>