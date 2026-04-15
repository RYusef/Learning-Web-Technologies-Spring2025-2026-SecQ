<?php
session_start();

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $dd       = trim($_POST['dob_dd'] ?? '');
    $mm       = trim($_POST['dob_mm'] ?? '');
    $yyyy     = trim($_POST['dob_yyyy'] ?? '');

    if (!$name)     $errors[] = 'Name is required.';
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
    if (!$username) $errors[] = 'Username is required.';
    if (strlen($password) < 4) $errors[] = 'Password must be at least 4 characters.';
    if ($password !== $confirm) $errors[] = 'Passwords do not match.';
    if (!$gender)   $errors[] = 'Gender is required.';
    if (!$dd || !$mm || !$yyyy) $errors[] = 'Date of birth is required.';

    if (!$errors) {
        $users = $_SESSION['users'] ?? [];
        foreach ($users as $u) {
            if ($u['username'] === $username) {
                $errors[] = 'Username already taken.';
                break;
            }
        }
    }

    if (!$errors) {
        $_SESSION['users'][] = [
            'name'     => $name,
            'email'    => $email,
            'username' => $username,
            'password' => $password,
            'gender'   => $gender,
            'dob'      => "$dd/$mm/$yyyy",
            'picture'  => '',
        ];
        $success = 'Registration successful! <a href="login.php">Login here</a>.';
    }
}
?>
<html>
<head>
    <title>xCompany - Register</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logo"><span>X</span>Company</div>
        <div class="nav">
            <a href="index.html">Home</a> |
            <a href="login.php">Login</a> |
            <a href="register.php">Registration</a>
        </div>
    </div>
    <div class="content">
        <?php foreach ($errors as $e): ?>
            <p class="error"><?= htmlspecialchars($e) ?></p>
        <?php endforeach; ?>
        <?php if ($success): ?>
            <p class="success"><?= $success ?></p>
        <?php endif; ?>

        <form method="post">
        <fieldset>
            <legend>REGISTRATION</legend>
            <table>
                <tr><td>Name</td><td>: <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"></td></tr>
                <tr><td>Email</td><td>: <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></td></tr>
                <tr><td>User Name</td><td>: <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"></td></tr>
                <tr><td>Password</td><td>: <input type="password" name="password"></td></tr>
                <tr><td>Confirm Password</td><td>: <input type="password" name="confirm_password"></td></tr>
            </table>
            <fieldset style="margin-top:8px;">
                <legend>Gender</legend>
                <label><input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '') === 'Male') ? 'checked' : '' ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '') === 'Female') ? 'checked' : '' ?>> Female</label>
                <label><input type="radio" name="gender" value="Other" <?= (($_POST['gender'] ?? '') === 'Other') ? 'checked' : '' ?>> Other</label>
            </fieldset>
            <fieldset style="margin-top:8px;">
                <legend>Date of Birth</legend>
                <span class="dob">
                    <input type="text" name="dob_dd" maxlength="2" placeholder="dd" value="<?= htmlspecialchars($_POST['dob_dd'] ?? '') ?>"> /
                    <input type="text" name="dob_mm" maxlength="2" placeholder="mm" value="<?= htmlspecialchars($_POST['dob_mm'] ?? '') ?>"> /
                    <input type="text" name="dob_yyyy" maxlength="4" placeholder="yyyy" class="yr" value="<?= htmlspecialchars($_POST['dob_yyyy'] ?? '') ?>">
                    <em>(dd/mm/yyyy)</em>
                </span>
            </fieldset>
            <p style="margin-top:8px;">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </p>
        </fieldset>
        </form>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>