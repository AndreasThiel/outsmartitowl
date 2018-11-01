<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_outsmartitowl
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
if ($jq == 1) {
    JHtml::_('jquery.framework');
}

$document->addScript(JURI::base() . 'modules/mod_outsmartitowl/assets/owl.carousel.min.js');


if ($gumberCarousel == 'O') {
    $document->addScriptDeclaration('jQuery(document).ready(function () {
            jQuery("#' . $owl_id . '").owlCarousel({
                autoplay: '. $autoplay .',
                loop: '. $loop .',
                navigation: false, 
                dotsSpeed: 400,
                items: 1,
                dots:' . $paginationbool . ', 
                nav:' . $navigationbool . ',    
            });
        });');
   /* $document->addScriptDeclaration('jQuery(document).ready(function () {
            jQuery(".owl-carousel").owlCarousel() 
                });');*/
} elseif ($gumberCarousel == 'I') {
    $document->addScriptDeclaration('jQuery(document).ready(function () {
            jQuery("#' . $owl_id . '").owlCarousel({
                autoplay: '. $autoplay .',
                loop: '. $loop .',
                autoplaySpeed: ' . $gumberspeed . ', 
                items : ' . $gumberitems . ',
                dots:' . $paginationbool . ', 
                nav:' . $navigationbool . ', 
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]
            });
        });');
} elseif ($gumberCarousel == 'L') {
    $document->addScriptDeclaration('jQuery(document).ready(function () {
            jQuery("#' . $owl_id . '").owlCarousel({
                autoplay: '. $autoplay .',
                items : ' . $gumberitems . ',
                dots:' . $paginationbool . ', 
                nav:' . $navigationbool . ',     
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]
            });
        });');
}
?>
<div class="container">
<div id="<?php echo $owl_id; ?>" class="owl-carousel owl-theme">

    <?php
    if ($bigcaption) {
        $wrapperclass="carousel-wrapper-big";
        $captionclass="carousel-caption-big";
    } else {
        $wrapperclass="carousel-wrapper-small";
        $captionclass="carousel-caption-small";
    }
        
    for ($i = 1; $i < 14; $i++) {
        $number = 'image' . $i;
        $captionnr = 'caption' . $i;
        $titlenr = 'title' . $i;
        $linknr = 'link'.$i;
        if ($gumber_img[$number]) {
            if ($caption) {
                if (!$linknr){
                    $newlink="#";
                }
                else {
                    $newlink = $gumber_img[$linknr];
                }
                echo '<div class="item myrelative">'
                .   ' <img src="' . $gumber_img[$number] . ' " alt="' . $gumber_img[$titlenr] . '">
                        <a href="'.$newlink.'">
                        <div class="'.$wrapperclass.'">
                            <div class="'.$captionclass.'">
                                <h5>' . $gumber_img[$titlenr] . '</h5>
                                <div>' . $gumber_img[$captionnr] . '</div>
                            </div>
                        </div>
                        </a>
                    </div>';
            } else {
                echo '<div class="item">'
                . '<img src="' . $gumber_img[$number] . ' " alt="'.$gumber_img[$titlenr].'">
                    </div>';
            }
        }
    }
    ?>
</div>
</div>