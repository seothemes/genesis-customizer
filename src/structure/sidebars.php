<?php

namespace GenesisCustomizer;

// Move Secondary Sidebar into content-sidebar-wrap.
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
add_action( 'genesis_after_content', 'genesis_get_sidebar_alt' );
