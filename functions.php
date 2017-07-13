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
