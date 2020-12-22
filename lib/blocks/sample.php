<?php 
/* 
 * ACF Custom Block 
 * */

//  register the block
acf_register_block_type(array(
    'name'              => 'sample',
    'title'             => __('Sample Block'),
    'className'         => 'sample',
    'render_template'   => 'lib/blocks/sample.php',
    'category'          => 'weart',
    'icon'              => 'editor-paste-word',
    'keywords'          => array( 'sample', 'weart' ),
    'align'				=> 'full', // align
));

// unique id / class
$id = ( !empty($block['anchor']) ) ? $block['anchor'] : "weart-".$block['id'];
$className = ( !empty($block['className']) ) ? ' weart-block '.$block['className'] : " weart-block ";
$className .= ( !empty($block['align']) ) ? ' align' . $block['align'] : $className .= ' alignfull';

// code of the block?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="section-title">
        <?php if(get_field('alcim')): ?><h6 class="subtitle"><?php the_field('alcim') ?></h6><?php endif; ?>
        <?php if(get_field('cim')): ?><h2 class="title"><?php the_field('cim') ?></h2><?php endif; ?>
    </div>
</div>