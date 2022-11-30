<?php

function iotcat_statistic_card_render_callback( $block_attributes, $content, $block ) {
    $titleColor = null;
    if(array_key_exists("titleColor", $block_attributes)){
        $titleColor = $block_attributes["titleColor"];
    }

    $valueColor = null;
    if(array_key_exists("valueColor", $block_attributes)){
        $valueColor = $block_attributes["valueColor"];
    }

    $count = "";
    if(array_key_exists("endpoint", $block_attributes)){
        $count = file_get_contents($block_attributes["endpoint"]);
    }   

    $image = "";
    if(array_key_exists("image", $block_attributes)){
        $image = $block_attributes["image"];
    }

    return '
        <div style="display: flex; flex-direction: column; align-items: center">   
            <div style="width: 50px; height: 50px">
                <img src='.$image.' />
            </div>
            <div style="color:'.$valueColor.'; font-size: '.$block_attributes["valueFontSize"].'; margin-top: 0px; font-weight: bold">
                '.$count.'
            </div>
            <div style="color:'.$titleColor.'; font-size: '.$block_attributes["titleFontSize"].'; margin-top: 0px; text-transform: uppercase;">
                '.$block_attributes["title"].'
            </div>
        </div>
    ';

}
  
function iotcat_register_statistic_card_block() {

    register_block_type(__DIR__ . '/build/iotcat-statistic-card' ,
    array(
        'render_callback' => 'iotcat_statistic_card_render_callback'
    ));
}
  
add_action( 'init', 'iotcat_register_statistic_card_block' );

?>