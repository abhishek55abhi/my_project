$(document).ready(function () {
    /***********************Chacter only***********************/
    jQuery.validator.addMethod("letterswithspace", function (value, element) {
        return this.optional(element) || /^[a-z][a-z\s]*$/i.test(value);
    }, "letters only");

    /***********************************Email*******************************/
    $.validator.addMethod("customemail",
            function (value, element) {
                return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
            },
            " email validation Not Valid"
            );

    var form = $("#acc_form");
    $("#first_block").click(function () {
        form.validate({
            rules: {
                name: {required: true,
                    letterswithspace: true},
                email: {
                    required: {
                        depends: function () {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                    customemail: true
                }
            },
            messages: {
                name: "Please enter your name",
                email: "Please enter a valid email address"
            }

        });
        if (form.valid() === false) {
            {
                return false;
            }
        }
        ;
    });

    /**********************************Second Block*******************************/
    $("#second_block").click(function () {
        form.validate({
            rules: {
                comp_name: {required: true,
                    letterswithspace: true},
                address: {
                    required: true
                }
            },
            messages: {
                comp_name: "Please enter your Company Name",
                address: "Please enter address"
            }

        });
        if (form.valid() === false) {
            {
                return false;
            }
        }
        ;
    });
    /********************************Third Block******************************/
    $("#third_block").click(function () {
        form.validate({
            rules: {
                image: {required: true,
                        extension: "png,jpg,jpeg"
                        
                },
                signature: {
                    required: true,
                        extension: "png,jpg,jpeg"      
                }
            },
            messages: {
                image: "Please upload your image",
                signature: "Please enter signature"
            }

        });
        if (form.valid() === false) {
            {
                return false;
            }
        } else {
            form.submit();
            //$('#myModal').modal('show');	
        }
    });

});