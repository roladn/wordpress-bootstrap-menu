# wordpress-bootstrap-menu
this is a simple function to help wordpress developer , to convert a bootstrap menu int o a dynamic wordpress menu
1. Add the function form function.php into your function.php file
2. Copy below  function into your menu template.
```
<ul class="menu clearfix" id="menu">
   <?php if (function_exists(TopMenu())) TopMenu(); ?>
 </ul>
```
