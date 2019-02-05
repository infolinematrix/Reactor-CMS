/**
 * Created by rahul on 24/10/18.
 */

/*PRICE RANGE SLIDER*/
if ($('#slider-range')[0]) {

    var slider = document.getElementById('slider-range');
    var inputLog = document.getElementById('input-log');

    var propertyPriceRangeValues = [
        document.getElementById('range-upper'),
    ]

    noUiSlider.create(slider, {
        start: [100],
        step: 100,
        range: {
            'min': [100],
            'max': [1000]
        }
    });


    slider.noUiSlider.on('update', function (values, handle) {
        if (handle === 0) {
            inputLog.value = values[handle];


        }
    });

    inputLog.addEventListener('change', function () {
        slider.noUiSlider.set([this.value, null]);
    });

    slider.noUiSlider.on('update', function( values, handle ) {
        propertyPriceRangeValues[handle].innerHTML = values[handle];
    });

}


if ($('#slider-days')[0]) {

    var dayslider = document.getElementById('slider-days');
    var inputDays = document.getElementById('input-days');
    var RangeValues = [
        document.getElementById('slider-days-upper'),
    ]

    noUiSlider.create(dayslider, {
        start: [1],
        step: 1,
        range: {
            'min': [1],
            'max': [30]
        },
        format: wNumb({
            decimals: 3,
            thousand: '.',
            suffix: ' Days'
        })
    });


    dayslider.noUiSlider.on('update', function (values, handle) {
        if (handle === 0) {
            inputDays.value = values[handle];

            strDays = inputDays.value.replace(' Days','');
            var sum = 0;
            sum += Number(inputLog.value);
            sum *= Number(strDays);

            $amt = parseFloat(sum).toFixed(2);

            $('#total-promotion-value').html($amt);
            $('#input-days').val(strDays);

        }
    });

    slider.noUiSlider.on('update', function (values, handle) {
        if (handle === 0) {
            inputLog.value = values[handle];

            var sum = 0;
            sum += Number(inputLog.value);
            sum *= Number(strDays);

            $amt = parseFloat(sum).toFixed(2);

            $('#total-promotion-value').html($amt);
        }
    });
    inputDays.addEventListener('change', function () {
        dayslider.noUiSlider.set([this.value, null]);
    });

    dayslider.noUiSlider.on('update', function( values, handle ) {
        RangeValues[handle].innerHTML = values[handle];
    });


}



$("#title").keyup(function () {
    var Text = $(this).val();
    Text = slugify(Text);
    $("#node_name").val(Text);
});

/**
 * Slugify Title to node_name
 */
function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text
}

var base_url = $('body').data('baseurl');

$(document).ready(function () {




    $('.cat').livequery('change', function () {

        $id = $(this).val();
        var url = base_url + '/category/api/' + $id;

        $(this).nextAll().remove();

        $.get(url, function (data, textStatus) {
            setTimeout(finishAjax('show_sub_categories', data), 400);
        });

        return false;
    });

    $('.loc').livequery('change', function () {

        $id = $(this).val();

        var url = base_url + '/location/api/' + $id;


        $(this).nextAll().remove();

        $.get(url, function (data, textStatus) {
            setTimeout(finishAjax('show_sub_locations', data), 400);
        });

        return false;
    });

    function finishAjax(id, response) {
        $d = '#' + id;
        $('#loader').remove();
        $($d).append(response);
    }




});

$("#PostReview").on('submit', function () {


    var img = base_url + "/spinner.gif";

    $('#rmsz').html('<img class="im" src="' + img + '"  />');

    $.post($(this).prop('action'), {

            "_token": $(this).find('input[name=_token]').val(),
            "node_name": $('#node_name').val(),
            "ratting": $("input[type='radio'][name='ratting']:checked").val(),
            "rev_name": $('#rev_name').val(),
            "rev_email": $('#rev_email').val(),
            "rev_content": $('#rev_content').val(),
        },

        function (data) {

            //response after the process.
            var status = data.status;

            if (status == 'Fail') {
                $('#rmsz').html('');
                $("#rmsz").html(data.message).fadeIn('slow');
            } else {
                $('#rmsz').html('');
                $("#rmsz").html(data.message).fadeIn('slow');
                $('#btnRev').attr('disabled', 'disabled');
            }
        }, 'json');
    return false
});

/*Form POST*/


