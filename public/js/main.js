$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');


    ////////////////////////////////////////////////////////////


    function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function eraseCookie(key) {
        var keyValue = getCookie(key);
        setCookie(key, keyValue, '-1');
    }


    // Cookie Store
    $("#first_name").on("change", function () {
        setCookie("first_name", document.getElementById('first_name').value, 30);
    });
    $("#last_name").on("change", function () {
        setCookie("last_name", document.getElementById('last_name').value, 30);
    });
    $("#phone").on("change", function () {
        setCookie("phone", document.getElementById('phone').value, 30);
    });
    $("#street").on("change", function () {
        setCookie("street", document.getElementById('street').value, 30);
    });
    $("#house_number").on("change", function () {
        setCookie("house_number", document.getElementById('house_number').value, 30);
    });
    $("#zip_code").on("change", function () {
        setCookie("zip_code", document.getElementById('zip_code').value, 30);
    });
    $("#city").on("change", function () {
        setCookie("city", document.getElementById('city').value, 30);
    });
    $("#account_owner").on("change", function () {
        setCookie("account_owner", document.getElementById('account_owner').value, 30);
    });
    $("#iban").on("change", function () {
        setCookie("iban", document.getElementById('iban').value, 30);
    });


    // Cookie Retrieve

    //Step 1
    if (getCookie("first_name")) {
        document.getElementById('first_name').value = getCookie("first_name");
    }
    if (getCookie("last_name")) {
        document.getElementById('last_name').value = getCookie("last_name");
    }
    if (getCookie("phone")) {
        document.getElementById('phone').value = getCookie("phone");
    }

    if (getCookie("first_name") || getCookie("last_name") || getCookie("phone")) {
        $('#step_1').click()
    }

    //Step 2
    if (getCookie("street")) {
        document.getElementById('street').value = getCookie("street");
    }
    if (getCookie("house_number")) {
        document.getElementById('house_number').value = getCookie("house_number");
    }
    if (getCookie("zip_code")) {
        document.getElementById('zip_code').value = getCookie("zip_code");
    }
    if (getCookie("city")) {
        document.getElementById('city').value = getCookie("city");
    }

    if (getCookie("street") || getCookie("house_number") || getCookie("zip_code") || getCookie("city")) {
        $('#step_2').click()
    }

    //Step 3
    if (getCookie("account_owner")) {
        document.getElementById('account_owner').value = getCookie("account_owner");
    }
    if (getCookie("iban")) {
        document.getElementById('iban').value = getCookie("iban");
    }

    if (getCookie("account_owner") || getCookie("iban")) {
        $('#step_3').click()
    }


    ////////////////////////////////////////////////////////////


});
