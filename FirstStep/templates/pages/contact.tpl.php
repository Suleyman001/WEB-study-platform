<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('contactForm').addEventListener('submit', function(e) {
                e.preventDefault();
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let message = document.getElementById('message').value;
                if (!name || !email || !message) {
                    alert('All fields are required.');
                    return;
                }
                if (!validateEmail(email)) {
                    alert('Invalid email format.');
                    return;
                }
                this.submit();
            });
            function validateEmail(email) {
                const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                return re.test(email);
            }
        });
    </script>
</head>
<body>
    <header>
        <h2>Contact Admin</h2>
        <br>
        <p3>Name: Suleyman Jumaniyazov</p3>
        <br>
        <p3>please fill all the boxes to send me messages!</p3>
    </header>
    <div id="wrapper">
        <div id="content">
            <form id="contactForm" method="POST" action="?page=contact_submit">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <div>
                    <input type="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
     
</body>
</html>
