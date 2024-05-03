<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medication Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light gray background color */
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Hide horizontal overflow */
        }

        .container {
            max-width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Dark text color */
        }

        p {
            margin-bottom: 10px;
            color: #666; /* Medium dark text color */
        }

        strong {
            color: #000; /* Black text color */
        }

        .info-section {
            margin-bottom: 30px;
        }

        .back-button {
            display: block;
            margin: 20px auto; /* Center the button */
            max-width: 200px;
            background-color: #007bff; /* Blue button background color */
            color: #fff; /* White button text color */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline */
            text-align: center;
        }

        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Database connection configuration
        $servername = "localhost"; // Default server name for WAMP
        $username = "root"; // Default username for WAMP
        $password = ""; // Default password for WAMP (usually blank)
        $dbname = "medic_app"; // Database name containing the 'medications' table

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get medication information based on the predicted class from the query parameter
        if (isset($_GET['medication'])) {
            $medication = $_GET['medication'];
            $sql = "SELECT * FROM medications WHERE name = '$medication'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<h1>" . $row["name"] . "</h1>";
                    echo "<div class='info-section'>";
                    echo "<p><strong>Dosage:</strong> " . $row["dosage"] . "</p>";
                    echo "<p><strong>Instructions:</strong> " . $row["instructions"] . "</p>";
                    echo "<p><strong>Indications:</strong> " . $row["indications"] . "</p>";
                    echo "<p><strong>Contraindications:</strong> " . $row["contraindications"] . "</p>";
                    echo "<p><strong>Side Effects:</strong> " . $row["side_effects"] . "</p>";
                    echo "<p><strong>Storage Instructions:</strong> " . $row["storage_instructions"] . "</p>";
                    echo "<p><strong>Expiration Date:</strong> " . $row["expiration_date"] . "</p>";
                    echo "<p><strong>Additional Information:</strong> " . $row["additional_information"] . "</p>";
                    echo "<p><strong>Age Suitability:</strong> " . $row["age_suitability"] . "</p>";
                    echo "<p><strong>Active Substance:</strong> " . $row["active_substance"] . "</p>";
                    echo "<p><strong>Manufacturer:</strong> " . $row["manufacturer"] . "</p>";
                    echo "<p><strong>Batch Number:</strong> " . $row["batch_number"] . "</p>";
                    echo "<p><strong>Country of Origin:</strong> " . $row["country_of_origin"] . "</p>";
                    echo "<p><strong>Form:</strong> " . $row["form"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No medication information found.";
            }
        } else {
            echo "No medication selected.";
        }

        $conn->close();
        ?>
        <a href="medic.php" class="back-button">Back to Upload</a>
    </div>
</body>
</html>

