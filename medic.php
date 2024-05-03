<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medic - Take a Photo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('image/background3.jpg'); /* Add your background image URL here */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .upload-btn {
            background-color: #32CD32; /* Green button background color */
            color: #fff;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .upload-btn:hover {
            background-color: #228B22; /* Darker green on hover */
        }

        .upload-btn:active {
            transform: translateY(1px);
        }

        .upload-btn:focus {
            outline: none;
        }

        input[type="file"] {
            display: none;
        }

        label {
            display: block;
            margin-bottom: 20px;
            cursor: pointer;
            padding: 15px 30px;
            background-color: #007bff;
            color: #fff;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        label:hover {
            background-color: #0056b3;
        }

        label:active {
            transform: translateY(1px);
        }

        .upload-icon {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Take a Photo of Your Medication</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload" class="upload-btn">
                <span class="upload-icon">&#128247;</span> Choose File
            </label>
            <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" capture="environment">
            <input type="submit" value="Upload Image" name="submit" class="upload-btn">
        </form>
    </div>
</body>
</html>





