<script>
    const modeToggle = document.getElementById('modeToggle');

    modeToggle.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode', modeToggle.checked);
    });

    // Check if there's a stored preference
    const storedMode = localStorage.getItem('darkMode');

    if (storedMode) {
        document.body.classList.toggle('dark-mode', storedMode === 'true');
        modeToggle.checked = storedMode === 'true';
    }

    // Update the stored preference when the switch is toggled
    modeToggle.addEventListener('change', () => {
        const isDarkMode = modeToggle.checked;
        document.body.classList.toggle('dark-mode', isDarkMode);
        localStorage.setItem('darkMode', isDarkMode);
    });
</script>

</body>

</html>