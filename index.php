<!DOCTYPE html>
<html>
<head>
    <title>Реєстрація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Реєстрація</h1>
        <div id="successMessage" class="alert alert-success mt-3" style="display: none;"></div>
        <div id="errorMessage" class="alert alert-danger mt-3" style="display: none;"></div>

        <form id="registrationForm">
            <div class="mb-3">
                <label for="firstName" class="form-label">Ім'я:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Прізвище:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Повторіть пароль:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>

            <button type="submit" class="btn btn-primary">Зареєструватися</button>
        </form>


        <h2 class="mt-5">Список користувачів</h2>
        <table class="table" id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>Email</th>
                    <th>Пароль</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="app.js"></script>
</body>
</html>
