<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>Login Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('https://img.freepik.com/free-vector/school-building-educational-institution-college_107791-1051.jpg'); /* Replace 'your-background-image.jpg' with the path to your image */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    /* Adjust the opacity and color as needed */
    .login-container {
      background-color: rgba(255, 255, 255, 0.8); 
      padding: 50px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      width: 450px;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    /* Change the color as needed */
    .login-form button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50; 
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    /* Change the color as needed */
    .login-form button:hover {
      background-color: #45a049; 
      .additional-links {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form class="login-form" action="{{ route('login') }}" method="post">
        @csrf
      
      <div>
      <input type="text" name="email" value="{{ old('email') }}"
        placeholder="Username" >
         @error('email')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
      </div>
     
      <div>
      <input type="password" class="text-danger" value="{{ old('password') }}" name="password" placeholder="Password" autocomplete="current-password">
         @error('email')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
         @enderror
      </div>
     
      <button type="submit">Login</button><br><br>

      <div class="additional-links">
      <a href="#">Not yet registered?</a>
      <a href="#">Forgot password?</a>
    </div><br>
    <div>
        <strong>Email: admin@mail.com</strong><br>
        <strong>Password: admin</strong><br>

    </div>
    </form>
  </div>

</body>
</html>
