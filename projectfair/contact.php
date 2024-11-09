<?php
        // Форма жіберілгеннен кейін серверде өңдеуді бастаймыз
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Мәліметтерді алу
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Мәліметтерді тексеру
            if (!empty($name) && !empty($email) && !empty($password)) {
                // Дерекқорға қосылу
                $servername = "localhost";
                $username = "root";
                $passwordDB = "";
                $dbname = "nyshan_db";

                // MySQL дерекқорына қосылу
                $conn = new mysqli($servername, $username, $passwordDB, $dbname);

                // Қосылу қатесін тексеру
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Мәліметтерді дерекқорға енгізу
                $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Thank you for signing up, $name! Your information has been received.</p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                // Қосылымды жабу
                $conn->close();
            } else {
                echo "<p>Please fill in all fields.</p>";
            }
        }
        ?>