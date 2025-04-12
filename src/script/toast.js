function showToast(message, type = 'errorLogin') {
    const colors = {
        errorLogin: '#FF4D4D',
        successLogin: '#4CAF50',
        info: '#2196F3',
        warning: '#FFC107',
    };

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: 'top',
        position: 'right',
        backgroundColor: colors[type] || colors.errorLogin,
        stopOnFocus: true,
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
            x: 20,
            y: 20,
        },
        className: 'custom-toast',
    }).showToast();
}