$(() => {
    window.onload = (e) => {
        if ($('span[class="file-icon"]').length){
            let extra = `<p class="mb-1 text-dark"> Upload a passport here</p>`;
            $('span[class="file-icon"]').prepend(extra);
        }

        if($('#bank').length){
            fetch(window.location.origin+'/identity/bank-account/banks', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then((response) => response.json())
            .then((data) => {
                const bigData = JSON.parse(data.data);
                if (bigData.success == true && bigData.statusCode == 200){
                    let allbanks = bigData.data;
                    let bankObj = [];
                    allbanks.forEach((item, key) =>{
                        bankObj.push({id:item.code, text:item.name});
                    });
                    $('#bank').select2({
                        data:bankObj
                    });
                }
            })
        }
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

    //check if the id exists
    //send a fetch request
    //convert response
    //


});