<?php

  add_action( 'admin_notices', 'sswp_pro_notice' );

function sswp_pro_notice() {
    ?>
    <div class="notice  is-dismissible" >
       <a style="text-decoration:none;" href="http://beeplugins.com/product/slideshow-wp-pro/" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ).'../public/img/slideshow_wp.png'; ?>" alt="upgrade pro version" /></a>
    </div>

<?php
}
// Register Custom Post Type
function sswp_post_type() {

	$sswp_labels = array(
		'name'                  => _x( 'Slideshow WP sliders', 'Post Type General Name', 'sswp_beeplugins.com' ),
		'singular_name'         => _x( 'Slideshow WP slider', 'Post Type Singular Name', 'sswp_beeplugins.com' ),
		'menu_name'             => __( 'SSWP Slideshow', 'sswp_beeplugins.com' ),
		'name_admin_bar'        => __( 'SSWP Slider', 'sswp_beeplugins.com' ),
		'archives'              => __( 'Item Archives', 'sswp_beeplugins.com' ),
		'attributes'            => __( 'Item Attributes', 'sswp_beeplugins.com' ),
		'parent_item_colon'     => __( 'Parent Slider:', 'sswp_beeplugins.com' ),
		'all_items'             => __( 'All Sliders', 'sswp_beeplugins.com' ),
		'add_new_item'          => __( 'Add New Slider', 'sswp_beeplugins.com' ),
		'add_new'               => __( 'Add Slider', 'sswp_beeplugins.com' ),
		'new_item'              => __( 'New Slider', 'sswp_beeplugins.com' ),
		'edit_item'             => __( 'Edit Slider', 'sswp_beeplugins.com' ),
		'update_item'           => __( 'Update Slider', 'sswp_beeplugins.com' ),
		'view_item'             => __( 'View Slider', 'sswp_beeplugins.com' ),
		'view_items'            => __( 'View Sliders', 'sswp_beeplugins.com' ),
		'search_items'          => __( 'Search Slider', 'sswp_beeplugins.com' ),
		'not_found'             => __( 'No Sliders found', 'sswp_beeplugins.com' ),
		'not_found_in_trash'    => __( 'No sliders found in Trash', 'sswp_beeplugins.com' ),
		'featured_image'        => __( 'Featured Image', 'sswp_beeplugins.com' ),
		'set_featured_image'    => __( 'Set featured image', 'sswp_beeplugins.com' ),
		'remove_featured_image' => __( 'Remove featured image', 'sswp_beeplugins.com' ),
		'use_featured_image'    => __( 'Use as featured image', 'sswp_beeplugins.com' ),
		'insert_into_item'      => __( 'Insert into Slider', 'sswp_beeplugins.com' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Slider', 'sswp_beeplugins.com' ),
		'items_list'            => __( 'Sliders list', 'sswp_beeplugins.com' ),
		'items_list_navigation' => __( 'Sliders list navigation', 'sswp_beeplugins.com' ),
		'filter_items_list'     => __( 'Filter Sliders list', 'sswp_beeplugins.com' ),
	);
	$sswp_args = array(
		'label'                 => __( 'Slideshow WP slider', 'sswp_beeplugins.com' ),
		'description'           => __( 'Slidesow WP', 'sswp_beeplugins.com' ),
		'labels'                => $sswp_labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'sswp_slider', $sswp_args );

}
add_action( 'init', 'sswp_post_type', 0 );


add_filter( 'rwmb_meta_boxes', 'sswp_meta_boxes' );
function sswp_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Slide Show Images', 'sswp' ),
        'post_types' => 'sswp_slider',
		'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => array(
            array(
                'id'   => 'sswp_images',
                'name' => __( 'Add Images', 'sswp' ),
                'type' => 'image_advanced',
				
            ),
			      )
    );
    return $meta_boxes;
	
	}




function sswp_slideshow_frontend($sswp_slider_id){

extract(shortcode_atts(array(
      'sswpid' => ''
      
   ), $sswp_slider_id));


?>
 <div class="swiper-container swiper<?php echo $sswpid;?>">
        <div class="swiper-wrapper">
        <?php
$sswp_settings_carousel_nos= get_post_meta($sswpid,'sswp_carousel_nos',true);
$sswp_slider_type = get_post_meta($sswpid,'sswp_type',true);
$sswp_images = rwmb_meta( 'sswp_images', 'size=full' ,$sswpid); 
$sswp_settings_carousel_nos = get_post_meta($sswpid,'sswp_carousel_nos',true);
$sswp_slider_type = get_post_meta($sswpid,'sswp_type',true);
$sswp_carousel_space= get_post_meta($sswpid,'sswp_carousel_space',true);
$sswp_autoplay=get_post_meta($sswpid,'sswp_autoplay',true);
$sswp_settings_width = get_post_meta($sswpid,'sswp_width',true);
$sswp_settings_height = get_post_meta($sswpid,'sswp_height',true);
$sswp_settings_title = get_post_meta($sswpid,'sswp_title',true);
$sswp_settings_desc = get_post_meta($sswpid,'sswp_decsrip',true);


if($sswp_settings_width=="" && $sswp_settings_height=="")
{
$sswp_settings_width = 'auto';
$sswp_settings_height = 'auto';
}

if ( !empty( $sswp_images ) ) {
    foreach ( $sswp_images as $sswp_image ) {
		       
			
		
		echo'<div class="swiper-slide" style="width: '.$sswp_settings_width.'.px;height:'.$sswp_settings_height.'px;">';
		
		
		
		echo '<img src="'.esc_url( $sswp_image['full_url'] ).'"  title="'.$sswp_image['title'].'" alt="'.$sswp_image['alt'].'" >';
		
	if($sswp_settings_title=="yes")
	{
		
		if(!$sswp_image['caption']=="")
		{
		echo '<div class="sswp-slider-text">';
	
		echo '<h3>'.$sswp_image['caption'].'</h3>';
		
		
		echo'<p class="sswp-slider-desc">'.$sswp_image['description'].'</div>';
		
		}
		}
		
		echo '</div>';
    }
	
}

echo'  
        </div>
      <div class="swiper-pagination swiper-pagination'.$sswpid.'"></div>
	   <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
	  </div>
    ';
	?>
	
	

<script>
 var swiper<?php echo $sswpid ;?> = new Swiper('.swiper<?php echo $sswpid;?>', {
        pagination: '.swiper-pagination<?php echo $sswpid;?>',
		 slidesPerView: <?php
		
		  if($sswp_slider_type=="fullwidth")
		 {
		 echo "1";
		 }
		 else
		 {
		  echo $sswp_settings_carousel_nos; 
		 }
		 ?>,
		 speed:2000,
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
		
		<?php
		  if($sswp_slider_type=="carousel")
		 {
		 ?>
        spaceBetween: <?php
		
		  if($sswp_carousel_space=="")
		  { 
		  echo '30';
		  }
		  else
		  {
		  echo $sswp_carousel_space;
		  }?> ,
		<?php } ?>
		<?php
		
		if($sswp_autoplay=='yes')
		
		{
		echo 'autoplay:2000';
		}
		?>

        
    });
</script>

<?php


}

add_shortcode('sswp-slide', 'sswp_slideshow_frontend');




  
add_filter( 'rwmb_meta_boxes', 'sswp_settings_boxes' );
function sswp_settings_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'id' => 'sswp_settings',
		'title' => 'Slider settings',
		'post_types' => array( 'sswp_slider' ),
		'context'	=> 'normal',
		'priority'	=> 'high',
		// Conditional Logic can be applied to Meta Box
		// In this example: Show this Meta Box by default. Hide it when post format is aside
		'hidden' => array( 'post_format', 'aside' ),
		'fields' => array(
					
					 array(
                'id'   => 'sswp_width',
                'name' => __( 'Set slider width in px', 'sswp' ),
                'type' => 'number',
				'desc'	=> 'example: 1350 Leave blank for auto',
				'std'   => 'auto',
            ),
			 array(
                'id'   => 'sswp_height',
                'name' => __( 'Set Slider height in px', 'sswp' ),
				'desc'	=> 'example: 450 Leave blank for auto',
                'type' => 'number',
				
				 'std'   =>'auto',
            ),
			
			
		
			array(
				'id'	=> 'sswp_type',
				'name'	=> 'Slider Type',
				'desc'	=> 'Pick Your Slider Type',
				'type'	=> 'select',
				'options' => array(
					'fullwidth' 		=> 'Fullwidth',
					'carousel' 		=> 'Carousel'
					
				)
			),
			array(
				'id' 	=> 'sswp_carousel_nos',
				'name'	=> 'How many slides per row?',
				'type'	=> 'number',
				'std'   => 4,
				'hidden' => array( 'sswp_type', '!=', 'carousel' )
			),
				 array(
                'id'   => 'sswp_carousel_space',
                'name' => __( 'Space Between each image', 'sswp' ),
				'desc'	=> 'example: 30, Leave Blank for default',
                'type' => 'number',				
				 'std'   =>30,
				 'hidden' => array( 'sswp_type', '!=', 'carousel' )
            ),
			
			 array(
                'id'   => 'sswp_title',
                'name' => __( 'On Mouse Hover Show Title and description ?','sswp' ),
				'type'    => 'radio',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No',
					),
				
				 'std'   =>'no',
            ),
			
			 array(
                'id'   => 'sswp_autoplay',
                'name' => __( 'Enable Auto Play ?' ),
				'type'    => 'radio',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No',
					),
				
				 'std'   =>'yes',
            ),
			
			
			      )
    );
    return $meta_boxes;
	
	}
	
	add_action( 'manage_sswp_slider_posts_custom_column', function ( $sswp_slider_column_name, $post_id ) 
{
$sswp_slider_code="";
    if ( $sswp_slider_column_name == 'sswp_slider_shortcode')
	$sswp_slider_code="[sswp-slide sswpid=".get_the_ID()."]";
        printf( '<input type="text" value="'.$sswp_slider_code.'" size="25" readonly />');
}, 10, 2 );


add_filter('manage_sswp_slider_posts_columns', function ( $sswp_slider_columns ) 
{
    if( is_array( $sswp_slider_columns ) && ! isset( $sswp_slider_columns['sswp_slider_shortcode'] ) )
        $sswp_slider_columns['sswp_slider_shortcode'] = __( 'Sliedeshow Shortcode' );     
		 
    return $sswp_slider_columns;
} );

///Create Widget
class sswp_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'sswp_widget', 

// Widget name will appear in UI
__('Slideshow WP Widget', 'sswp_widget_beeplugins'), 

// Widget description
array( 'description' => __( 'Slideshow WP widget', 'sswp_widget_beeplugins' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
function widget($sswp_args, $sswp_instance) {
   extract( $sswp_args );
   // these are the widget options
   $sswp_title = apply_filters('sswp_widget_title', $sswp_instance['sswp_title']);
   
   echo $before_widget;
   // Display the widget
   echo '<div>';

   // Check if title is set
   if ( $sswp_title ) {
      echo $before_title . $sswp_title . $after_title;
   }


   // Check if checkbox is checked
   // Get $select value
	
		$sswp_slider_id=$sswp_instance[ 'sswp_select' ];
		echo do_shortcode('[sswp-slide sswpid='.$sswp_slider_id.']');
	


   echo '</div>';
   echo $after_widget;
}
		
// Widget Backend 
public function form( $sswp_instance ) {
// Check values


$sswp_title = '';
      $sswp_select = ''; // Added
	if ( isset( $sswp_instance[ 'sswp_title' ] ) ) {
	$sswp_title = esc_attr($sswp_instance['sswp_title']);
}


     
   if ( isset( $sswp_instance[ 'sswp_select' ] ) ) {
$sswp_select = esc_attr($sswp_instance['sswp_select']);
} 


?>

<p>
<label for="<?php echo $this->get_field_id('sswp_title'); ?>"><?php _e('Widget Title', '$sswp_widget_beeplugins'); ?></label>
<input id="<?php echo $this->get_field_id('sswp_title'); ?>" name="<?php echo $this->get_field_name('sswp_title'); ?>" type="text" value="<?php echo $sswp_title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('sswp_select'); ?>"><?php _e('Select Slideshow', 'sswp_widget_beeplugins'); ?></label>
<select name="<?php echo $this->get_field_name('sswp_select'); ?>" id="<?php echo $this->get_field_id('sswp_select'); ?>" class="widefat">
<?php

$sswp_post_type = 'sswp_slider'; // your post type
$sswp_args=array(
  'post_type' => $sswp_post_type,
  'post_status' => 'publish',
  'posts_per_page' => -1
  );
$sswp_my_query = null;
$sswp_my_query = new WP_Query($sswp_args);
if( $sswp_my_query->have_posts() ) {
  while ($sswp_my_query->have_posts()) : $sswp_my_query->the_post(); 
 
    $sswp_current_id =  get_the_ID();
 
   ?>

<option value="<?=the_ID(); ?>" id="<?=the_ID()?>" <?php if($sswp_current_id==$sswp_select) echo ' selected="selected"' ;?>  ><?=the_title(); ?></option>
    <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().




?>
</select>
</p>

<?php 
}	
// Updating widget replacing old instances with new
public function update( $sswp_new_instance, $sswp_old_instance ) {
 $sswp_instance = $sswp_old_instance;
      // Fields
      $sswp_instance['sswp_title'] = strip_tags($sswp_new_instance['sswp_title']);
   
      $sswp_instance['sswp_select'] = strip_tags($sswp_new_instance['sswp_select']);
     return $sswp_instance;
}
} // Class wpb_widget ends here

// Register and load the widget
add_action('widgets_init', create_function('', 'return register_widget("sswp_widget");'));