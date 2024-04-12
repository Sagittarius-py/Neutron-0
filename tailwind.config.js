/** @type {import('tailwindcss').Config} */
export const content = ["./resources/**/*.blade.php", "./resources/**/*.js"];
export const theme = {
    extend: {},
};
export const plugins = [require("tailwindcss"), require("autoprefixer")];
