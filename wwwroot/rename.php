<?php
/**
 * Author:  Seven Yu
 * E-Mail:  dofyyu@gmail.com
 * Version: 
 * Update:  
 */

$path = 'files';

function getDirectory( $path = '.', $level = 0 ){

    $ignore = array( 'cgi-bin', '.', '..' );

    $dh = @opendir( $path );
    
    while( false !== ( $file = readdir( $dh ) ) )
    {
        if( !in_array( $file, $ignore ) )
        {
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) );
            if( is_dir( "$path/$file" ) )
            {
                echo "<strong>$spaces $file</strong><br />";
                //rename($path."\\".$file, strtolower($path."\\".$file));
                getDirectory( "$path/$file", ($level+1) );
                
            } 
            else
            {
                echo "$spaces $file<br />";
                if(strpos($file, '.'))
                    rename($path."\\".$file, $path."\\".base64_encode($file));
            }
        }   
    }
    closedir( $dh );
} 

getDirectory( $path , 0 )

?>