<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create client</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="antialiased">
<div id="data-main-content" class="main-content">
    <div class="title">New client</div>
    <form id="creation-form" method="post">
        @csrf
        <label for="first_name">First name</label><br>
        <input type="text" id="first_name" name="first_name"><br>
        <label for="last_name">Last name</label><br>
        <input type="text" id="last_name" name="last_name"><br>
        <label for="email">E-Mail</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="company">Company</label><br>
        <input type="text" id="company" name="company"><br>
        <label for="position">Position</label><br>
        <input type="text" id="position" name="position"><br>
        <label for="phone1">Phone number #1</label><br>
        <input type="tel" id="phone1" name="phone1"><br>
        <label for="phone2">Phone number #2</label><br>
        <input type="tel" id="phone2" name="phone2"><br>
        <label for="phone3">Phone number #3</label><br>
        <input type="tel" id="phone3" name="phone3"><br>
        <input type="submit" style="margin-top: 1rem" value="Submit"><br>
    </form>
</div>
</body>
<script>
    let form = document.getElementById("creation-form");
    form.addEventListener('submit', function (e) {
        const errors = [];

        let formData = new FormData(form);

        let firstNameInput = document.getElementById("first_name");
        let lastNameInput = document.getElementById("last_name");
        let emailInput = document.getElementById("email");
        let firstNameData = formData.get("first_name");
        let lastNameData = formData.get("last_name");
        let emailData = formData.get("email");

        firstNameInput.style.borderColor = "#000000";
        lastNameInput.style.borderColor = "#000000";
        emailInput.style.borderColor = "#000000";
        if (firstNameData === "") {
            firstNameInput.style.borderColor = "#FF0000";
            errors.push("No first name");
        }

        if (lastNameData === "") {
            lastNameInput.style.borderColor = "#FF0000";
            errors.push("No last name");
        }

        if (emailData === "") {
            emailInput.style.borderColor = "#FF0000";
            errors.push("No E-Mail address");
        }
        if (errors.length > 0) {
            e.preventDefault();
        }
    });
</script>
</html>
