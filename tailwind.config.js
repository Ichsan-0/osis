/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/css/**/*.css",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                // Tambahkan warna kustom di sini jika diperlukan
            },
        },
    },
    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
};
