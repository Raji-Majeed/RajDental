<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking</title>
  <link rel="stylesheet" href="booking.css">
</head>
<body>
  <div class="wrapper">
    <form id="bookingForm" method="POST" action="save_booking.php">
      <h1>Book an Appointment</h1>
      <div class="input-box">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
      </div>
      <div class="input-box">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>
      <div class="input-box">
        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="input-box">
        <label for="service">Service:</label>
        <select id="service" name="service" required>
          <option value="Cleaning">Cleaning</option>
          <option value="Filling">Filling</option>
          <option value="Braces">Braces</option>
          <option value="Checkup">Checkup</option>
        </select>
      </div>
      <button type="submit" class="btn">Book</button>
    </form>
  </div>
</body>
</html>