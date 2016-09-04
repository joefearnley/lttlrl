var PersonalForm = {
    init: function() {
        this.bindEvents();
    },
    bindEvents: function() {
        var self = PersonalForm;
        $('#personal-info-form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                self.savePersonalInfo(e);
            }
        });
    },
    savePersonalInfo: function(e) {
        e.preventDefault();
        var l = Ladda.create(document.querySelector('#update-personal-info'));
        l.start();
        var data = $('#personal-info-form').serialize();
        $.post('/api/account/update-personal-info', data)
            .success(function(response) {
                swal({
                    title: 'Success!',
                    text: 'User Updated.',
                    type: 'success',
                    timer: 2000
                });
            })
            .always(function() {
                l.stop();
            });
    }
};

var UpdatePasswordForm = {
    init: function() {
        this.bindEvents();
    },
    bindEvents: function() {
        var self = UpdatePasswordForm;
        $('#update-password-form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                self.updatePassword(e);
            }
        });
    },
    updatePassword: function(e) {
        e.preventDefault();
        var self = UpdatePasswordForm;
        var l = Ladda.create(document.querySelector('#update-password-button'));
        l.start();
        var data = $('#update-password-form').serialize();

        $.post('/api/account/update-password', data)
            .success(function(response) {
                swal({
                    title: 'Success!',
                    text: 'Password Updated.',
                    type: 'success',
                    timer: 2000
                });
            })
            .error(function(response) {
                self.showError(response);
            })
            .always(function() {
                l.stop();
            });
    },
    showError: function(response) {
        var message = '<div>';
        $.each(response.responseJSON.password, function(i, errorMessage) {
            message += '<p class="text-danger">' + errorMessage + '</p>';
        });
        message += '</div>';
        swal({
            title: 'Error Updating Password.',
            text: message,
            type: 'warning'
        });
    }
};

$(function() {
    PersonalForm.init();
    UpdatePasswordForm.init();
});
