<?php
function redirect( string $target, ?string $source = NULL ) : void {
if ( is_null( $source ) ) {
header( "Location: {$target}" );
}
else {
header( "Location: {$target}&redirect={$source}" );
}
}