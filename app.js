$(document).ready(function() {
    const registrationForm = $("#registrationForm");
    const successMessage = $("#successMessage");
    const errorMessage = $("#errorMessage");
    const userTable = $("#userTable tbody");

    registrationForm.submit(function(event) {
        event.preventDefault();

        const formData = registrationForm.serialize();

        $.ajax({
            type: "POST",
            url: "register.php",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    successMessage.text(response.message).show();
                    registrationForm.hide();
                    errorMessage.hide();
                    getUserList();
                } else {
                    errorMessage.text(response.message).show();
                    successMessage.hide();
                }
            },
            error: function(error) {
                console.error("Помилка: " + JSON.stringify(error));
            }
        });
    });

    function getUserList() {
        $.ajax({
            type: "GET",
            url: "getUsers.php",
            dataType: "json",
            success: function(users) {
                userTable.empty();
                $.each(users, function(index, user) {
                    userTable.append(`<tr><td>${user.id}</td><td>${user.firstName}</td><td>${user.lastName}</td><td>${user.email}</td><td>${user.password}</td></tr>`);
                });
            },
            error: function(error) {
                console.error("Помилка: " + JSON.stringify(error));
            }
        });
    }

    getUserList();
});
