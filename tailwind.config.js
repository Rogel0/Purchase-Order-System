module.exports = {
    content: [
      './src/**/*.php', // Include all PHP files
      './src/**/*.html', // Include all HTML files
      './src/**/*.js', // Include all JS files
    ],
    theme: {
      extend: {
        opacity: {
          5: '0.05', // Ensure bg-opacity-5 is available
        },
      },
    },
    plugins: [],
  };