<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Application</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 0 auto; padding: 20px; max-width: 600px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .content { margin-bottom: 20px; }
        .content h2 { margin: 0 0 10px; }
        .content p { margin: 0 0 10px; }
        .footer { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NU GUI Partner Program Application</h1>
            <p>Reference Number: <?= esc($reference) ?></p>
        </div>
        <div class="content">
            <h2>Business Information</h2>
            <p><strong>Business Name:</strong> <?= esc($businessName) ?></p>
            <p><strong>Registration Number:</strong> <?= esc($registrationNumber) ?></p>
            <p><strong>Country of Business:</strong> <?= esc($countryBusiness) ?></p>
        </div>
        <div class="content">
            <h2>Contact Information</h2>
            <p><strong>Contact Name:</strong> <?= esc($contactName) ?></p>
            <p><strong>Contact Email:</strong> <?= esc($contactEmail) ?></p>
            <p><strong>Contact Phone:</strong> <?= esc($contactPhone) ?></p>
            <p><strong>Skype/Teams:</strong> <?= esc($Skype_Teams) ?></p>
        </div>
        <div class="content">
            <h2>Questionnaire</h2>
            <p><strong>Annual Turnover:</strong> <?= esc($question1) ?></p>
            <p><strong>Financial Statements for the Last Two Years:</strong> <?= esc($question2) ?></p>
            <p><strong>Primary Industry:</strong> <?= esc($question3) ?></p>
            <p><strong>Type of Partnership:</strong> <?= esc($question4) ?></p>
            <p><strong>Interested Products:</strong> <?= esc($question5) ?></p>
            <p><strong>Marketing Plan:</strong> <?= esc($question6) ?></p>
            <p><strong>Customer Base and Target Market:</strong> <?= esc($question7) ?></p>
        </div>
    </div>
</body>
</html>
