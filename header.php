<?php
// Skeleton TRDC
// header

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
wp_head();
?>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="twelve columns headerline">
        <h1><?php echo get_bloginfo( $show, 'name' ); ?></h1>
      </div>  
    </div>
    
    <div class="row">
      <div class="twelve columns navmenu">
        <?php 
        wp_nav_menu(
          $menu_args = array(
            'theme_location' => 'topmenu',
            'menu_id'  => 'menu-topmenu'
          )
        ); 
        ?>
      </div>  
    </div>
    
    
  