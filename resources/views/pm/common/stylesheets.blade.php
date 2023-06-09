
<!-- Favicon -->
<link rel="icon" href="{{ asset('assets/svg/logos/logo-short.png') }}" type="image/png" />
<link rel="shortcut icon" href="{{ asset('assets/svg/logos/logo-short.png') }}">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/theme.minc619.css?v=1.0') }}" rel="stylesheet" />
<link rel="preload" href="{{ asset('assets/css/theme.min.css') }}" data-hs-appearance="default" as="style">
<link rel="preload" href="{{ asset('assets/css/theme-dark.min.css') }}" data-hs-appearance="dark" as="style">
<!-- loader-->

<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />

<style data-hs-appearance-onload-styles>
    * {
        transition: unset !important;
    }
</style>

<script>
    window.hs_config = {
        "autopath": "@@autopath",
        "deleteLine": "hs-builder:delete",
        "deleteLine:build": "hs-builder:build-delete",
        "deleteLine:dist": "hs-builder:dist-delete",
        "previewMode": false,
        "startPath": "/index.html",
        "vars": {
            "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
            "version": "?v=1.0"
        },
        "layoutBuilder": {
            "extend": {
                "switcherSupport": true
            },
            "header": {
                "layoutMode": "default",
                "containerMode": "container-fluid"
            },
            "sidebarLayout": "default"
        },
        "themeAppearance": {
            "layoutSkin": "default",
            "sidebarSkin": "default",
            "styles": {
                "colors": {
                    "primary": "#377dff",
                    "transparent": "transparent",
                    "white": "#fff",
                    "dark": "132144",
                    "gray": {
                        "100": "#f9fafc",
                        "900": "#1e2022"
                    }
                },
                "font": "Inter"
            }
        },
        "languageDirection": {
            "lang": "en"
        },
        "skipFilesFromBundle": {
            "dist": ["{{ asset('assets/js/hs.theme-appearance.js') }}", "{{ asset('assets/js/hs.theme-appearance-charts.js') }}",
                "{{ asset('assets/js/demo.js') }}"
            ],
            "build": ["{{ asset('assets/css/theme.css') }}",
                "{{ asset('assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js') }}",
                "{{ asset('assets/js/demo.js') }}", "{{ asset('assets/css/theme-dark.html') }}", "{{ asset('assets/css/docs.css') }}",
                "{{ asset('assets/vendor/icon-set/style.html') }}", "{{ asset('assets/js/hs.theme-appearance.js') }}",
                "{{ asset('assets/js/hs.theme-appearance-charts.js') }}",
                "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html",
                "{{ asset('assets/js/demo.js') }}"
            ]
        },
        "minifyCSSFiles": ["{{ asset('assets/css/theme.css') }}", "{{ asset('assets/css/theme-dark.css') }}"],
        "copyDependencies": {
            "dist": {
                "*assets/js/theme-custom.js": ""
            },
            "build": {
                "*assets/js/theme-custom.js": "",
                "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
            }
        },
        "buildFolder": "",
        "replacePathsToCDN": {},
        "directoryNames": {
            "src": "./src",
            "dist": "./dist",
            "build": "./build"
        },
        "fileNames": {
            "dist": {
                "js": "theme.min.js",
                "css": "theme.min.css"
            },
            "build": {
                "css": "theme.min.css",
                "js": "theme.min.js",
                "vendorCSS": "vendor.min.css",
                "vendorJS": "vendor.min.js"
            }
        },
        "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
    }
    window.hs_config.gulpRGBA = (p1) => {
        const options = p1.split(',')
        const hex = options[0].toString()
        const transparent = options[1].toString()

        var c;
        if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
            c = hex.substring(1).split('');
            if (c.length == 3) {
                c = [c[0], c[0], c[1], c[1], c[2], c[2]];
            }
            c = '0x' + c.join('');
            return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
        }
        throw new Error('Bad Hex');
    }
    window.hs_config.gulpDarken = (p1) => {
        const options = p1.split(',')

        let col = options[0].toString()
        let amt = -parseInt(options[1])
        var usePound = false

        if (col[0] == "#") {
            col = col.slice(1)
            usePound = true
        }
        var num = parseInt(col, 16)
        var r = (num >> 16) + amt
        if (r > 255) {
            r = 255
        } else if (r < 0) {
            r = 0
        }
        var b = ((num >> 8) & 0x00FF) + amt
        if (b > 255) {
            b = 255
        } else if (b < 0) {
            b = 0
        }
        var g = (num & 0x0000FF) + amt
        if (g > 255) {
            g = 255
        } else if (g < 0) {
            g = 0
        }
        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
    }
    window.hs_config.gulpLighten = (p1) => {
        const options = p1.split(',')

        let col = options[0].toString()
        let amt = parseInt(options[1])
        var usePound = false

        if (col[0] == "#") {
            col = col.slice(1)
            usePound = true
        }
        var num = parseInt(col, 16)
        var r = (num >> 16) + amt
        if (r > 255) {
            r = 255
        } else if (r < 0) {
            r = 0
        }
        var b = ((num >> 8) & 0x00FF) + amt
        if (b > 255) {
            b = 255
        } else if (b < 0) {
            b = 0
        }
        var g = (num & 0x0000FF) + amt
        if (g > 255) {
            g = 255
        } else if (g < 0) {
            g = 0
        }
        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
    }
</script>
