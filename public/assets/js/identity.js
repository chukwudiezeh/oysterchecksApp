$(() => {
    window.onload = (e) => {
        let extra = `<p class="mb-1 text-dark"> Upload a passport here</p>`;

        $('span[class="file-icon"]').prepend(extra);
    };

    $('#validateData').on('click', () => {
        if ($('#validateData').is(':checked')) {
            $('#validateData').val('true');
            $('#validateDataWrapper').css('display', 'flex');
        } else {
            $('#validateData').val('false');
            $('#validateDataWrapper').css('display', 'none');
        }
    });

    $('#compareImage').on('click', () => {
        if ($('#compareImage').is(':checked')) {
            $('#compareImage').val('true');
            $('#compareImageWrapper').css('display', 'flex');
        } else {
            $('#compareImage').val('false');
            $('#compareImageWrapper').css('display', 'none');
        }
    });

    $('#advanceSearch').on('click', () => {
        if ($('#advanceSearch').is(':checked')) {
            $('#advanceSearch').val('true');
            $('#advanceSearchWrapper').css('display', 'flex');
        } else {
            $('#advanceSearch').val('false');
            $('#advanceSearchWrapper').css('display', 'none');
        }
    });

    $('#subjectConsent').on('click', () => {
        if ($('#subjectConsent').is(':checked')) {
            $('#subjectConsent').val('true');
        } else {
            $('#subjectConsent').val('false');
        }
    });


});