<?php
/**
 * Travelscape Dynamic Styles
 * 
 * @package Travelscape
*/

function travelscape_css_defaults() {
	
	$defaults = array (		
		
		//#fff9f4
		
		'primary-color' 		=> '#e63946',		
		'secondary-color' 		=> '#ff6b35',		
		'body-color' 			=> '#0D1821',
		'heading-color' 		=> '#0D1821',
		'subtle-color' 			=> '#fff9f4',				
		'base-color' 			=> '#f9f3ef',
		'border-color' 			=> '#d4d6d9',
		'font-family' 			=> 'DM Sans, sans-serif',
		'font-weight' 			=> '400',
		'font-size' 			=> '18px',
		'line-height' 			=> '1.7em',
		'text-transform' 		=> 'none',		
		'font-family-h1' 		=> 'Marcellus, serif',
		'font-weight-h1' 		=> '600',
		'font-size-h1' 			=> '32px',
		'line-height-h1' 		=> '1.6',
		'text-transform-h1' 	=> 'none',				
		'font-family-h2' 		=> 'Marcellus, serif',
		'font-weight-h2' 		=> '600',
		'font-size-h2' 			=> '28px',
		'line-height-h2' 		=> '1.6',
		'text-transform-h2' 	=> 'none',						
		'font-family-h3' 		=> 'Marcellus, serif',
		'font-weight-h3' 		=> '500',
		'font-size-h3' 			=> '24px',
		'line-height-h3' 		=> '1.6',
		'text-transform-h3' 	=> 'none',		
		'font-family-h4' 		=> 'Marcellus, serif',
		'font-weight-h4' 		=> '500',
		'font-size-h4' 			=> '20px',
		'line-height-h4' 		=> '1.6',
		'text-transform-h4' 	=> 'none',		
		'font-family-h5' 		=> 'Marcellus, serif',
		'font-weight-h5' 		=> '400',
		'font-size-h5' 			=> '16px',
		'line-height-h5' 		=> '1.6',
		'text-transform-h5' 	=> 'none',		
		'font-family-h6' 		=> 'Marcellus, serif',
		'font-weight-h6' 		=> '400',
		'font-size-h6' 			=> '12px',
		'line-height-h6' 		=> '1.6',
		'text-transform-h6' 	=> 'none',				
		
	);			
	
	return $defaults;
	
}

function travelscape_dynamic_css(){
		
	$defaults = apply_filters( 'travelscape_style', travelscape_css_defaults() );		
	
	ob_start();
	?>
    <style type='text/css' media='all' id="travelscape-dynamic-css">
		:root {
		--primary-color: <?php echo esc_attr($defaults['primary-color']); ?>;					
		--primary-color-inverse: <?php echo esc_attr(travelscape_contrastcolor($defaults['primary-color'])); ?>;
		--secondary-color: <?php echo esc_attr($defaults['secondary-color']); ?>;
		--secondary-color-inverse: <?php echo esc_attr(travelscape_contrastcolor($defaults['secondary-color'])); ?>;				
		--body-color: <?php echo esc_attr($defaults['body-color']); ?>;						
		--heading-color: <?php echo esc_attr($defaults['heading-color']); ?>;						
		--subtle-color: <?php echo esc_attr($defaults['subtle-color']); ?>;	
		--primary-border-color: <?php echo esc_attr($defaults['border-color']); ?>;	
		--base-color: <?php echo esc_attr($defaults['base-color']); ?>;	
		--primary-color-rgb:<?php echo esc_attr(travelscape_hex2rgba($defaults['primary-color'])); ?>;	
		--subtle-color-rgb:<?php echo esc_attr(travelscape_hex2rgba($defaults['subtle-color'])); ?>;	
		--black-color: #191919;
		--bc-sidebar-width: 30%;			
		--font-family: <?php echo esc_attr($defaults['font-family']); ?>;
		--font-weight: <?php echo esc_attr($defaults['font-weight']); ?>;
		--font-size: <?php echo esc_attr($defaults['font-size']); ?>;
		--line-height: <?php echo esc_attr($defaults['line-height']); ?>;
		--text-transform: <?php echo esc_attr($defaults['text-transform']); ?>;										
		--font-family-h1: <?php echo esc_attr($defaults['font-family-h1']); ?>;
		--font-weight-h1: <?php echo esc_attr($defaults['font-weight-h1']); ?>;
		--font-size-h1: <?php echo esc_attr($defaults['font-size-h1']); ?>;
		--line-height-h1: <?php echo esc_attr($defaults['line-height-h1']); ?>;
		--text-transform-h1: <?php echo esc_attr($defaults['text-transform-h1']); ?>;							
		--font-family-h2: <?php echo esc_attr($defaults['font-family-h2']); ?>;
		--font-weight-h2: <?php echo esc_attr($defaults['font-weight-h2']); ?>;
		--font-size-h2: <?php echo esc_attr($defaults['font-size-h2']); ?>;
		--line-height-h2: <?php echo esc_attr($defaults['line-height-h2']); ?>;
		--text-transform-h2: <?php echo esc_attr($defaults['text-transform-h2']); ?>;								
		--font-family-h3: <?php echo esc_attr($defaults['font-family-h3']); ?>;
		--font-weight-h3: <?php echo esc_attr($defaults['font-weight-h3']); ?>;
		--font-size-h3: <?php echo esc_attr($defaults['font-size-h3']); ?>;
		--line-height-h3: <?php echo esc_attr($defaults['line-height-h3']); ?>;
		--text-transform-h3: <?php echo esc_attr($defaults['text-transform-h3']); ?>;							
		--font-family-h4: <?php echo esc_attr($defaults['font-family-h4']); ?>;
		--font-weight-h4: <?php echo esc_attr($defaults['font-weight-h4']); ?>;
		--font-size-h4: <?php echo esc_attr($defaults['font-size-h4']); ?>;
		--line-height-h4: <?php echo esc_attr($defaults['line-height-h4']); ?>;
		--text-transform-h4: <?php echo esc_attr($defaults['text-transform-h4']); ?>;								
		--text-transform-h4: <?php echo esc_attr($defaults['text-transform-h4']); ?>;								
		--font-family-h5: <?php echo esc_attr($defaults['font-family-h5']); ?>;
		--font-weight-h5: <?php echo esc_attr($defaults['font-weight-h5']); ?>;
		--font-size-h5: <?php echo esc_attr($defaults['font-size-h5']); ?>;
		--line-height-h5: <?php echo esc_attr($defaults['line-height-h5']); ?>;
		--text-transform-h5: <?php echo esc_attr($defaults['text-transform-h5']); ?>;								
		--font-family-h6: <?php echo esc_attr($defaults['font-family-h6']); ?>;
		--font-weight-h6: <?php echo esc_attr($defaults['font-weight-h6']); ?>;
		--font-size-h6: <?php echo esc_attr($defaults['font-size-h6']); ?>;
		--line-height-h6: <?php echo esc_attr($defaults['line-height-h6']); ?>;
		--text-transform-h6: <?php echo esc_attr($defaults['text-transform-h6']); ?>;				
		};				
	</style>
<?php
	
	$output = ob_get_contents();	
	return $output;
	
	ob_end_clean();
	
}
add_action( 'wp_head', 'travelscape_dynamic_css', 999 );
add_action( 'admin_head', 'travelscape_dynamic_css', 999 );

/*
* Convert HEX to RGb
* @link https://gist.github.com/alexmustin/82b084d22ff52e9f043df295baa38cef
*/
//* Function to convert Hex colors to RGBA
function travelscape_hex2rgba( $color, $opacity = false ) {

    $defaultColor = 'rgb(0,0,0)';

    // Return default color if no color provided
    if ( empty( $color ) ) {
        return $defaultColor;
    }

    // Ignore "#" if provided
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    // Check if color has 6 or 3 characters, get values
    if ( strlen($color) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    // Convert hex values to rgb values
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if ( $opacity ) {
        if( abs( $opacity ) > 1 ) {
            $opacity = 1.0;
        }
        $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
    } else {
        $output = implode( ", ", $rgb );
    }

    // Return rgb(a) color string
    return $output;

}

function travelscape_contrastcolor($color) {
        // hexColor RGB
        $R1 = hexdec(substr($color, 1, 2));
        $G1 = hexdec(substr($color, 3, 2));
        $B1 = hexdec(substr($color, 5, 2));

        // Black RGB
        $blackColor = "#000000";
        $R2BlackColor = hexdec(substr($blackColor, 1, 2));
        $G2BlackColor = hexdec(substr($blackColor, 3, 2));
        $B2BlackColor = hexdec(substr($blackColor, 5, 2));

         // Calc contrast ratio
         $L1 = 0.2126 * pow($R1 / 255, 2.2) +
               0.7152 * pow($G1 / 255, 2.2) +
               0.0722 * pow($B1 / 255, 2.2);

        $L2 = 0.2126 * pow($R2BlackColor / 255, 2.2) +
              0.7152 * pow($G2BlackColor / 255, 2.2) +
              0.0722 * pow($B2BlackColor / 255, 2.2);

        $contrastRatio = 0;
        if ($L1 > $L2) {
            $contrastRatio = (int)(($L1 + 0.05) / ($L2 + 0.05));
        } else {
            $contrastRatio = (int)(($L2 + 0.05) / ($L1 + 0.05));
        }

        // If contrast is more than 5, return black color
        if ($contrastRatio > 5) {
            return '#000000';
        } else { 
            // if not, return white color.
            return '#FFFFFF';
        }
}