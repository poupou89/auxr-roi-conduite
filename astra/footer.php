<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php 
	astra_content_after();
	astra_footer_before();
	astra_footer();
	astra_footer_after(); 
?>
	</div><!-- #page -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>

<!-- 🎄 MODE NOËL – SCRIPT INJECTÉ -->
<script>
document.addEventListener("DOMContentLoaded", function(){

    const now = new Date();
    const year = now.getFullYear();
    const start = new Date(year, 10, 25); // 25 novembre
    const end = new Date(year, 11, 31, 23, 59, 59); // 31 décembre

    if(now >= start && now <= end){

        // Ajout de la classe principale
        document.body.classList.add("christmas-mode");

        // 3 couches de neige
        ["snow-1", "snow-2", "snow-3"].forEach(cls => {
            const layer = document.createElement("div");
            layer.className = cls + " snow-layer";
            document.body.appendChild(layer);
        });

        // Guirlande
        const garland = document.createElement("div");
        garland.className = "garland";
        document.body.appendChild(garland);

        // Étincelles
        const spark = document.createElement("div");
        spark.className = "sparkles";
        document.body.appendChild(spark);
    }
});
</script>

</body>
</html>
