<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Align content to the top */
            min-height: 100vh;
            position: relative;
            color: #ffffff; /* White text color */
            /* Add background-image property to include your own background image */
            background-image: url('image/background3.jpg'); /* Placeholder for background image */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* Prevent repeating the background image */
            background-position: center center; /* Center the background image */
        }

        .container {
            text-align: center;
            margin-top: 20vh; /* Adjusted margin from the top */
        }

        h1 {
            color: #ffffff; /* White color for 'Welcome' */
            margin-bottom: 20px;
        }

        /* Style for the form */
        form {
            max-width: 500px;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        /* Style for form inputs */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc; /* Light gray border */
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Style for the submit button */
        .submit-button {
            width: 100%;
            background-color: #007bff; /* Blue button background color */
            color: #fff; /* White button text color */
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <form action="add_medication.php" method="post">
            <input type="text" name="name" placeholder="Medication Name" required>
            <input type="text" name="dosage" placeholder="Dosage" required>
            <textarea name="instructions" placeholder="Instructions" rows="4" required></textarea>
            <!-- Add input fields for the remaining columns of the medications table -->
            <!-- For example -->
            <input type="text" name="indications" placeholder="Indications" required>
            <input type="text" name="contraindications" placeholder="Contraindications" required>
            <input type="text" name="side_effects" placeholder="Side Effects" required>
            <input type="text" name="storage_instructions" placeholder="Storage Instructions" required>
            <input type="text" name="expiration_date" placeholder="Expiration Date" required>
            <input type="text" name="additional_information" placeholder="Additional Information" required>
            <input type="text" name="age_suitability" placeholder="Age Suitability" required>
            <input type="text" name="active_substance" placeholder="Active Substance" required>
            <input type="text" name="manufacturer" placeholder="Manufacturer" required>
            <input type="text" name="batch_number" placeholder="Batch Number" required>
            <input type="text" name="country_of_origin" placeholder="Country of Origin" required>
            <input type="text" name="form" placeholder="Form" required>
            <!-- Add more input fields for the other columns -->
            <button type="submit" class="submit-button">Add Medication</button>
        </form>
    </div>
</body>
</html>
