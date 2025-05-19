<?php

function dev_css()
{
?>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <style type="text/tailwindcss">
        @theme {
            --font-display: "Satoshi", "sans-serif";
            --breakpoint-3xl: 120rem;
            --color-avocado-100: oklch(0.99 0 0);
            --color-avocado-200: oklch(0.98 0.04 113.22);
            --color-avocado-300: oklch(0.94 0.11 115.03);
            --color-avocado-400: oklch(0.92 0.19 114.08);
            --color-avocado-500: oklch(0.84 0.18 117.33);
            --color-avocado-600: oklch(0.53 0.12 118.34);
            --ease-fluid: cubic-bezier(0.3, 0, 0, 1);
            --ease-snappy: cubic-bezier(0.2, 0, 0, 1);
        }

        @utility bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230d9488' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @utility container {
            
            @variant md {
                max-width: 678px;
            }
            
            @variant lg {
                max-width: 1024px;
            }
            
            @variant xl {
                max-width: 1280px;
            }

            @variant 2xl { 
                max-width: 1536px;
            }
        }

        @custom-variant dark (&:where([data-theme=dark], [data-theme=dark] *));

    </style>
<?php
}
add_action('wp_head', 'dev_css');
