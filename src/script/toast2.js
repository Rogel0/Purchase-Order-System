function showToast(message, type = 'success') {
    const colors = {
        success: '#28A745', 
    };

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: 'top', // Toast position: top or bottom
        position: 'right', // Toast alignment: left, center, or right
        backgroundColor: colors[type] || colors.error, // Default to error color if type is invalid
        stopOnFocus: true, // Pause on hover
        style: {
            borderRadius: '12px',
            boxShadow: '0px 8px 15px rgba(0, 0, 0, 0.2)',
            padding: '20px',
            fontSize: '14px',
            fontWeight: '600',
            color: '#FFFFFF',
            textAlign: 'center',
            lineHeight: '1.5',
        },
        offset: {
            x: 20, // Horizontal offset
            y: 20, // Vertical offset
        },
        className: 'custom-toast',
    }).showToast();
}

