$(document).on('beforeSubmit', 'form.js-ajax-form', function () {
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        processData: false,
        contentType: false,
        data: new FormData(this),
        beforeSend: () => window.preloader.start(),
        success: (response) => {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.preloader.stop();
                popup(data.message);
            }
        },
        error: (jqXHR, errMsg) => console.log(errMsg),
    });
    return false;
});

$(document).on('click', '.js-ajax-click', function (e) {
    $.ajax({
        url: e.target.getAttribute('data-url'),
        type: 'POST',
        dataType: 'json',
        data: {
            id: e.target.getAttribute('data-id')
        },
        beforeSend: () => window.preloader.start(),
        success: (response) => {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.preloader.stop();
                popup(data.message);
            }
        },
        error: (jqXHR, errMsg) => console.log(errMsg),
    });
    return false;
});

function popup(text) {
    const popup = document.querySelector('#popup');
    const modal = new bootstrap.Modal(document.querySelector('#popup'), {});

    const p = popup.querySelector('.js-popup-text');

    p.textContent = text;

    modal.show()
}
