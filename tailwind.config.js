module.exports = {
    content: require('fast-glob').sync([
        'source/**/*.{blade.php,blade.md,md,html,vue}',
        '!source/**/_tmp/*'
    ], {dot: true}),
    theme: {
        extend: {
            typography: {
                DEFAULT: {
                    css: {
                        'code::before': false,
                        'code::after': false,
                        pre: false,
                        code: false,
                        'pre code': false,
                        a: {
                            textDecoration: 'none',
                            borderBottom: '1px solid'
                        },
                        'a.anchorjs-link': {
                            textDecoration: 'none',
                            borderBottom: 0
                        }
                    }
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ],
};
