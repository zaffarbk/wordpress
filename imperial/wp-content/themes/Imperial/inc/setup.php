<?php
    if(!session_id()) session_start();
    if ( ! isset( $content_width ) ) {
        $content_width = 950;
    }