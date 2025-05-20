$(document).on('pagecreate', function() {
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        $('body').attr('data-theme', 'dark');
    }

    // Theme toggle functionality
    $('.theme-toggle').on('click', function() {
        const currentTheme = $('body').attr('data-theme');
        if (currentTheme === 'dark') {
            $('body').removeAttr('data-theme');
            localStorage.setItem('theme', 'light');
        } else {
            $('body').attr('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        }
    });
}); 