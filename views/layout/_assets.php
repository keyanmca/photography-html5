<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/default.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_href;?>styles/css3.css" />
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