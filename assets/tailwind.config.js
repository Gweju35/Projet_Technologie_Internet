export default {
    content: [
        "../views/**/*.blade.php",
        "../**/*.php",
        "../**/*.html"
    ],
    theme: {
        container: {
            center: true,
            padding: '1rem',
        },
        extend: {
            colors: {
                'pj-blue': '#3498db',
                'pj-blue-2': '#667eea',
                'pj-purple': '#764ba2',
                'pj-red': '#e74c3c',
                'pj-greyblue': '#2c3e50',
                'pj-grey': '#7f8c8d',
                'pj-white': '#f8f9fa',
                'pj-white-2': '#ecf0f1',
            },
        },
        fontFamily: {
            'grotesk' : ['Space Grotesk', 'sans-serif'],
            'fira': ['Fira Code', 'sans-serif'],
        }
    }
}


