//register Top Menu Function
function TopMenu() {
    $menu_name = 'menu-1'; // specify custom menu slug
	$menu_list ='';
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li><a href="' . $submenu->url . '">' . $submenu->title . '</a></li> ' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                    $menu_list .= '<li class="dropdown">' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";
                    $menu_list .= '<ul>' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul>' ."\n";
                     
                } else {
                     
                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                    $menu_list .= '<li>' ."\n";
                }
                 
            }
             
            // end <li>
           
        }
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}
