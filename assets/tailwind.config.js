// import containerQueries from '@tailwindcss/container-queries'

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
                'pf-red': '#e74c3c',
                'pf-greyblue': '#2c3e50',
                'pf-grey': '#7f8c8d',
                'pf-white': '#f8f9fa',
                'pf-white-2': '#ecf0f1',
            },
        },
    }
}
