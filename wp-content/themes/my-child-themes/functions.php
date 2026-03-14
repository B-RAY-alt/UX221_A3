<?php
add_action('wp_enqueue_scripts', 'my_child_theme_styles');

function my_child_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}

function my_child_theme_custom_css() {
    echo '<style>
    @import url("https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap");

    body, .wp-site-blocks {
        background-color: #0a0a0f !important;
        color: #f0f0ff !important;
        font-family: "DM Sans", sans-serif !important;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: "Syne", sans-serif !important;
        color: #f0f0ff !important;
    }

    h1 {
        background: linear-gradient(135deg, #ff2d78, #00e5ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    a {
        color: #00e5ff !important;
        text-decoration-thickness: 2px;
    }

    a:hover {
        color: #ff2d78 !important;
    }

    :focus-visible {
        outline: 3px solid #ffe600 !important;
        outline-offset: 3px !important;
    }

    .wp-block-post-title a {
        color: #f0f0ff !important;
        text-decoration: none !important;
    }

    .wp-block-post-title a:hover {
        color: #ff2d78 !important;
    }

    .wp-block-post {
        background: #13131e !important;
        border: 1px solid rgba(255,255,255,0.08) !important;
        border-radius: 16px !important;
        padding: 1.5rem !important;
        transition: transform 0.3s ease, border-color 0.3s ease !important;
    }

    .wp-block-post:hover {
        transform: translateY(-4px) !important;
        border-color: #ff2d78 !important;
    }

    .wp-block-site-title a {
        background: linear-gradient(135deg, #ff2d78, #00e5ff) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        background-clip: text !important;
        font-family: "Syne", sans-serif !important;
        font-weight: 800 !important;
        text-decoration: none !important;
    }

    header, .wp-block-template-part {
        background: rgba(10,10,15,0.9) !important;
        backdrop-filter: blur(12px) !important;
        border-bottom: 1px solid rgba(255,255,255,0.08) !important;
    }

    footer {
        background: #13131e !important;
        border-top: 1px solid rgba(255,255,255,0.08) !important;
        color: #8888aa !important;
    }

    .wp-block-button__link {
        background: #ff2d78 !important;
        border-radius: 999px !important;
        font-family: "DM Sans", sans-serif !important;
        font-weight: 700 !important;
        border: none !important;
        transition: box-shadow 0.2s ease !important;
    }

    .wp-block-button__link:hover {
        box-shadow: 0 0 24px rgba(255,45,120,0.6) !important;
    }

    </style>';
}
add_action('wp_head', 'my_child_theme_custom_css');
add_filter('wp_kses_allowed_html', function($tags, $context) {
    if ($context === 'post') {
        $tags['iframe'] = array(
            'src'             => true,
            'width'           => true,
            'height'          => true,
            'title'           => true,
            'frameborder'     => true,
            'allowfullscreen' => true,
            'loading'         => true,
        );
    }
    return $tags;
}, 10, 2);