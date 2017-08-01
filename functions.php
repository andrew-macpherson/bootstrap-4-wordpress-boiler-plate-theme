<?php


//ADD THUMBNAIL SUPPORT
add_theme_support('post-thumbnails');

//REGISTER MAIN MENU
add_action('init','register_site_menus');
function register_site_menus(){
    register_nav_menus(array(
        'main' => 'Main Menu'
    ));
}



class bootstrap_Walker extends Walker_Nav_Menu {

	var $toggle = false;

	function __construct($toggle){
		$this->toggle = $toggle;
	}

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\" >\n";
	}

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;

		if ($args->walker->has_children){
			$liClass = 'dropdown';
			$class = 'dropdown-toggle';
			$subMenuClass = 'dropdown-submenu';
		}else{
			$class = '';
			$liClass = '';
			$subMenuClass = '';
		}

		//First Level
		if($depth == 0){
			$output .= "<li class='nav-item ".$liClass." " .  implode(" ", $item->classes) . "'>";
				$output .= '<a class="nav-link '.$class.'" href="' . $permalink . '" '.(($args->walker->has_children && $this->toggle)?"data-toggle=dropdown":"").'>';
				$output .= $title;
				$output .= '</a>';
			//$output .= '</li>';

			if ($args->walker->has_children){
				//$output .= "<div class='dropdown-menu " .  implode(" ", $item->classes) . "'>";
			}

		}else{
			$output .= "<li class='nav-item ".$subMenuClass." " .  implode(" ", $item->classes) . "'>";
				$output .= '<a class="dropdown-item " href="' . $permalink . '" '.(($args->walker->has_children)?"data-toggle=dropdown":"").'>';
				$output .= $title;
				$output .= '</a>';



			//$output .= '</div>';
		}

	}
}







//// COMMON ELEMENTS POST TYPE
add_action( 'init', 'create_common_elements_post_types' );
function create_common_elements_post_types() {
    register_post_type( 'common-elements',
        array(
            'labels' => array(
                'name' => 'Common Elements',
                'singular_name' => 'Common Element',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Common Element',
                'edit' => 'Edit',
                'edit_item' => 'Edit Common Element',
                'new_item' => 'New Common Element',
                'view' => 'View',
                'view_item' => 'View Common Element',
                'search_items' => 'Search Common Elements',
                'not_found' => 'No Common Elements found',
                'not_found_in_trash' => 'No Common Elements found in Trash'
            ),
            'public' => true,
            'menu_position' => 5,
            'supports' => array( 'title', 'editor'),
            'taxonomies' => array( '' ),
            'menu_icon' => '',
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'common-elements', 'with_front' => false ),
        )
    );
}

//// COMMON ELEMENSTS SHORT CODE
function common_element($atts,$content){
	extract( shortcode_atts( array(
        'id' 		=> '0'
    ), $atts ) );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = stripParagraphs($content);

    $return = '';

    if($id != 0){
		$post = get_post($id); 
		$content = apply_filters('the_content',$post->post_content);
		$content = do_shortcode($content);
		$return .= $content;
    }

	return $return;
}
add_shortcode('common_element','common_element');