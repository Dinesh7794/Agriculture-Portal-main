# Agriculture Portal
* Agriculture Portal is a machine learning-based project designed to provide predictions and recommendations for farmers. The system uses different algorithms to predict crops, recommend fertilizers, and provide rainfall and yield predictions to help farmers make informed decisions about their crops.
* IT also has direct crop sales to customer with real payment interface using Stripe API.
* Other supporting features are Chatbot using OPENAI's gpt-3.5-turbo model, Weather Forecast upto 4 days using Weather API, Agriculture realetd news using News API.
## Pre Requisites

## Get Below API Keys
* [OpenAI API](https://platform.openai.com/api-keys)
* [OpenWeatherMap API](https://openweathermap.org/api)
* [News API](https://newsapi.org/)

## Gmail SMTP Setup

1. Setup [app password for gmail](https://support.google.com/accounts/answer/185833?hl=en)
2. Open **fsend_otp.php** and **csend_otp.php** files and change username and password.

```php
<?php
require 'C:\xampp\htdocs\agriculture-portal-main\vendor\autoload.php';
// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();
// Enable verbose debug output
$mail->SMTPDebug = 2;
// Set mailer to use SMTP
$mail->isSMTP();
// Specify SMTP host
$mail->Host = 'smtp.gmail.com';
// Enable SMTP authentication
$mail->SMTPAuth = true;
// SMTP username
$mail->Username = 'your_mail@gmail.com';
// SMTP password
$mail->Password = 'password';
// Enable TLS encryption; `PHPMailer::ENCRYPTION_STARTTLS` encouraged
$mail->SMTPSecure = 'tls';
// TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above
$mail->Port = 587;
// Set sender and recipient
$mail->setFrom("your_mail@gmail.com", "Agriculture Portal");
$mail->addAddress('receptionist_mail@gmail.com');
// Set email subject and body
$mail->Subject = 'Test Email via PHPMailer';
$mail->Body    = 'This is a test email sent using PHPMailer.';
// Send the email
if (!$mail->send()) {
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully!';
}
?>
```
## Installation
1. Clone the repository to your local machine.
```link
git clone https://github.com/Dinesh7794/Agriculture-Portal-main.git
```
2. Goto Farmers folder and Install the required packages using pip.
```link
pip install -r requirements.txt
```
3. Change Success Url and Cancel Url file paths in **customer/cbuy_crops.php** .
```php
$session = \Stripe\Checkout\Session::create([
'payment_method_types' => ['card'],
	'line_items' => [[
	'price_data' => [
		'product' => 'prod_NdAYaoDLX3DnMY',
		'unit_amount' => $TotalCartPrice,
		'currency' => 'inr',
		],
		'quantity' => 1,
		]],
	'mode' => 'payment',
	'success_url' => 'http://localhost/projects/agri2/customer/cupdatedb.php',   // Change File Path
	'cancel_url' => 'http://localhost/projects/agri2/customer/cbuy_crops.php',   // Change File Path
]);
```
4. Add API Keys to respective files.
* OpenAI API Key to **index.php** and **fchatgpt.php**.
* OpenWeatherMap API Key to **fweather_forecast.php** .
* News API Key to **fnewsfeed.php**.
5. Import database from db folder.
6. Run Apache web server using XAMPP.

## Dataset
The Crop Management System dataset includes the following features:
### Crop Prediction Dataset
* State_Name
* District_Name
* Season
* Crop
### Crop Recommendation Dataset
* N
* P
* K
* Temperature
* Humidity
* pH
* Rainfall
* Label
### Fertilizer Recommendation Dataset
* Temparature
* Humidity
* Soil Moisture
* Soil Type
* Crop Type
* Nitrogen
* Phosphorous
* Potassium
* Fertilizer Name
### Rainfall Prediction Dataset
* SUBDIVISION
* YEAR
* JAN
* FEB
* MAR
* APR
* MAY
* JUN
* JUL
* AUG
* SEP
* OCT
* NOV
* DEC
* ANNUAL
* Jan-Feb
* Mar-May
* Jun-Sep
* Oct-Dec
### Yield Prediction Dataset
* State_Name
* District_Name
* Crop_Year
* Season
* Crop
* Area
* Production
## How to Use
* Crop Prediction: Input State_Name, District_Name, and Season to get the predicted crop for that location.
* Crop Recommendation: Input N, P, K, Temperature, Humidity, pH, and Rainfall for that location to get recommended crops for that location.
* Fertilizer Recommendation: Input Temperature, Humidity, Soil Moisture, Soil Type, Crop Type, Nitrogen, Phosphorous, and Potassium to get recommended fertilizer for that crop and location.
* Rainfall Prediction: Input Subdivision and Year to get rainfall prediction for that year.
* Yield Prediction: Input State_Name, District_Name, Crop_Year, Season, Crop, Area, Production to get predicted yields for that crop and location.
# Features
* Crop Prediction
* Crop Recommendation
* Fertilizer Recommendation
* Rainfall Prediction
* Yield Prediction
* OTP Verification through mail
* Agriculture realetd news using News API
* Chatbot using OpenAI's gpt-3.5-turbo model
* Dynamically changing quotes using OpenAI's API
* Weather Forecast upto 4 days using OpenWeatherMap API
* Direct crop sales to customer with real time payment interface using Stripe API
# Technologies Used
* Python
* PHP
* Pandas
* NumPy
* JavaScript
* HTML/CSS
* Bootstrap4
* Scikit-learn

 


