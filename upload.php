<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/background3.jpg'); /* Replace 'path/to/your/background/image.jpg' with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .uploaded-image {
            max-width: 80%; /* Adjust the maximum width of the image */
            max-height: 40vh; /* Adjust the maximum height of the image */
        }

        .medication-info {
            text-align: center;
            margin-top: 20px; /* Adjust the top margin as needed */
        }

        .info-button {
            background-color: #32CD32; /* Green button background color */
            color: white; /* White button text color */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline */
            margin-bottom: 10px; /* Add margin between buttons */
        }

        .info-button:hover {
            background-color: #228B22; /* Darker green on hover */
        }

        .back-button {
            background-color: #007bff; /* Blue button background color */
            color: white; /* White button text color */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline */
            position: absolute; /* Position at the bottom */
            bottom: 20px; /* Adjust distance from bottom */
        }

        .back-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check if the uploaded file is an image
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Attempt to move the uploaded file to the uploads directory
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
                echo "<img src='$targetFilePath' alt='Uploaded Image' class='uploaded-image'>";
                // Include the script for the Teachable Machine model
                ?>
                <div id="label-container"></div>
                <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
                <script type="text/javascript">
                    const URL = "https://teachablemachine.withgoogle.com/models/5b8WAi7Nk/";

                    let model, maxPredictions;

                    // Load the image model
                    async function init() {
                        const modelURL = URL + "model.json";
                        const metadataURL = URL + "metadata.json";

                        // Load the model and metadata
                        model = await tmImage.load(modelURL, metadataURL);
                        maxPredictions = model.getTotalClasses();
                        predict();
                    }

                    // Run the webcam image through the image model
                    async function predict() {
                        const image = document.getElementsByClassName('uploaded-image')[0];
                        const prediction = await model.predict(image);
                        const labelContainer = document.getElementById("label-container");
                        labelContainer.innerHTML = '';
                        let maxProb = 0;
                        let maxClass = '';
                        for (let i = 0; i < maxPredictions; i++) {
                            if (prediction[i].probability > maxProb) {
                                maxProb = prediction[i].probability;
                                maxClass = prediction[i].className;
                            }
                            const classPrediction =
                                prediction[i].className + ": " + prediction[i].probability.toFixed(2);
                            const div = document.createElement('div');
                            div.textContent = classPrediction;
                            labelContainer.appendChild(div);
                        }
                        // Add event listener to the "View Medication Information" button
                        document.querySelector('.info-button').addEventListener('click', function() {
                            // Redirect to information.php with the predicted class as a query parameter
                            window.location.href = `information.php?medication=${maxClass}`;
                        });
                    }

                    init();
                </script>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Redirect back to the upload form if accessed directly
        header("Location: medic.php");
        exit();
    }
    ?>
    <div class="medication-info">
        <a href="#" class="info-button">View Medication Information</a>
    </div>
    <a href="medic.php" class="back-button">Back to Upload</a>
</body>
</html>










