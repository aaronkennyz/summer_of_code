<?php
// 1. FORCE SESSION VISIBILITY
session_set_cookie_params(0, '/');
session_start();

include("database.php");

$message = "";
$msg_type = "";
$active_view = "login"; // Default view

// ==========================================
//  STUDENT LOGIC
// ==========================================

// 1. STUDENT REGISTRATION
if (isset($_POST['student_register'])) {
    $active_view = "register";
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $reg_number = filter_input(INPUT_POST, "reg-number", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($name) || empty($reg_number) || empty($email) || empty($password)) {
        $message = "Please fill in all fields.";
        $msg_type = "error";
    } else {
        $check = $conn->prepare("SELECT * FROM users WHERE email = ? OR reg_number = ?");
        $check->bind_param("ss", $email, $reg_number);
        $check->execute();
        
        if ($check->get_result()->num_rows > 0) {
            $message = "Student account already exists.";
            $msg_type = "error";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (reg_number, name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $reg_number, $name, $email, $hash);

            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['role'] = 'student';
                echo "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 1500);</script>";
                $message = "Registration Successful!"; $msg_type = "success";
            } else {
                $message = "Error: " . $conn->error; $msg_type = "error";
            }
        }
    }
}

// 2. STUDENT LOGIN
if (isset($_POST['login'])) {
    $active_view = "login";
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['role'] = 'student';
            echo "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 1000);</script>";
            $message = "Login Successful!"; $msg_type = "success";
        } else {
            $message = "Invalid Password."; $msg_type = "error";
        }
    } else {
        $message = "User not found."; $msg_type = "error";
    }
}

// ==========================================
//  MENTOR LOGIC (This is what you asked for)
// ==========================================

// 3. MENTOR REGISTRATION
if (isset($_POST['mentor_register'])) {
    $active_view = "mentor-register";
    $m_name = filter_input(INPUT_POST, "mentor-name", FILTER_SANITIZE_SPECIAL_CHARS);
    $m_email = filter_input(INPUT_POST, "mentor-email", FILTER_SANITIZE_EMAIL);
    $m_pass = $_POST['mentor-password'];

    if (empty($m_name) || empty($m_email) || empty($m_pass)) {
        $message = "Please fill in all fields."; $msg_type = "error";
    } else {
        // Check if mentor exists
        $check = $conn->prepare("SELECT * FROM mentorlogs WHERE memail = ?");
        $check->bind_param("s", $m_email);
        $check->execute();

        if ($check->get_result()->num_rows > 0) {
            $message = "Mentor email already exists."; $msg_type = "error";
        } else {
            $hash = password_hash($m_pass, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO mentorlogs (mname, memail, mpass) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $m_name, $m_email, $hash);

            if ($stmt->execute()) {
                $_SESSION['mentor_id'] = $stmt->insert_id;
                $_SESSION['mentor_name'] = $m_name;
                $_SESSION['role'] = 'mentor';
                echo "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 1500);</script>";
                $message = "Mentor Registered Successfully!"; $msg_type = "success";
            } else {
                $message = "Error: " . $conn->error; $msg_type = "error";
            }
        }
    }
}

// 4. MENTOR SIGN IN (Logic Verified)
if (isset($_POST['mentor_login'])) {
    $active_view = "mentor"; // Keeps the mentor form open on reload
    $email = filter_input(INPUT_POST, "mentor-email", FILTER_SANITIZE_EMAIL);
    $password = $_POST['mentor-password'];

    $stmt = $conn->prepare("SELECT * FROM mentorlogs WHERE memail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify hashed password
        if (password_verify($password, $row['mpass'])) {
            // Set Session Variables
            $_SESSION['mentor_id'] = $row['id'];
            $_SESSION['mentor_name'] = $row['mname'];
            $_SESSION['role'] = 'mentor'; // Crucial for index.php to know who logged in
            
            echo "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 1000);</script>";
            $message = "Mentor Sign In Successful!"; $msg_type = "success";
        } else {
            $message = "Invalid Password."; $msg_type = "error";
        }
    } else {
        $message = "Mentor account not found."; $msg_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Slugworks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Roboto', 'sans-serif'] },
                    colors: { 'gsoc-blue': '#4285F4', 'gsoc-red': '#EA4335', 'gsoc-yellow': '#FBBC04', 'gsoc-green': '#34A853', }
                }
            }
        }
    </script>
    <style>
        .form-container { transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out; }
        .hidden-form { display: none; opacity: 0; transform: translateX(20px); }
        .shape-blob { position: absolute; filter: blur(50px); z-index: 0; opacity: 0.6; animation: float 10s infinite ease-in-out; }
        @keyframes float { 0% { transform: translate(0, 0); } 50% { transform: translate(20px, 20px); } 100% { transform: translate(0, 0); } }
    </style>
</head>
<body class="font-sans text-gray-700 bg-white h-screen overflow-hidden flex">

    <?php if(!empty($message)): ?>
    <div class="fixed top-5 right-5 z-50 px-6 py-4 rounded-lg shadow-xl text-white <?php echo $msg_type == 'success' ? 'bg-gsoc-green' : 'bg-gsoc-red'; ?> animate-bounce">
        <?php echo $message; ?>
    </div>
    <?php endif; ?>

    <div class="hidden lg:flex lg:w-1/2 relative bg-gray-50 items-center justify-center overflow-hidden">
        <div class="shape-blob bg-blue-200 w-64 h-64 rounded-full top-20 left-20 mix-blend-multiply"></div>
        <div class="shape-blob bg-yellow-200 w-64 h-64 rounded-full bottom-20 right-20 mix-blend-multiply animation-delay-2000"></div>
        <div class="relative z-10 text-center px-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Slugworks <br> SOE Summer of Code</h2>
            <p class="text-lg text-gray-500">Join the community of student developers and open source mentors.</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 sm:px-12 md:px-24 overflow-y-auto">
        <div class="absolute top-8 right-8">
            <a href="../index.php" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-1">Back to Home <i class="ph ph-arrow-right"></i></a>
        </div>

        <div class="max-w-md w-full mx-auto py-10">

            <div id="login-view" class="form-container <?php echo ($active_view != 'login') ? 'hidden-form' : ''; ?>">
                <div class="mb-8"><span class="px-2 py-1 text-xs font-semibold text-gsoc-blue bg-blue-50 rounded-md">Student Portal</span><h1 class="text-3xl font-extrabold text-gray-900">Student Sign In</h1></div>
                <form method="POST" class="space-y-6">
                    <input type="email" name="email" placeholder="Email" required class="w-full p-3 border rounded-lg">
                    <input type="password" name="password" placeholder="Password" required class="w-full p-3 border rounded-lg">
                    <button type="submit" name="login" class="w-full py-3 bg-gsoc-blue text-white rounded-lg font-bold hover:bg-blue-600">Log In</button>
                </form>
                <p class="mt-8 text-center text-sm">Don't have an account? <button onclick="toggleView('register')" class="text-gsoc-blue font-bold">Register</button></p>
                <div class="mt-6 text-center text-sm">
                    <button onclick="toggleView('mentor')" class="text-gray-500 hover:text-gsoc-green">Mentor Sign In</button>
                </div>
            </div>

            <div id="register-view" class="form-container <?php echo ($active_view != 'register') ? 'hidden-form' : ''; ?>">
                <div class="mb-6"><span class="px-2 py-1 text-xs font-semibold text-gsoc-blue bg-blue-50 rounded-md">Registration</span><h1 class="text-3xl font-extrabold text-gray-900">Create Account</h1></div>
                <form method="POST" class="space-y-4">
                    <input type="text" name="name" placeholder="Full Name" required class="w-full p-3 border rounded-lg">
                    <input type="text" name="reg-number" placeholder="Register Number" required class="w-full p-3 border rounded-lg">
                    <input type="email" name="email" placeholder="Email" required class="w-full p-3 border rounded-lg">
                    <input type="password" name="password" placeholder="Password" required class="w-full p-3 border rounded-lg">
                    <button type="submit" name="student_register" class="w-full py-3 bg-gsoc-green text-white rounded-lg font-bold hover:bg-green-600">Register</button>
                </form>
                <p class="mt-8 text-center text-sm">Already have an account? <button onclick="toggleView('login')" class="text-gsoc-blue font-bold">Sign In</button></p>
            </div>

            <div id="mentor-view" class="form-container <?php echo ($active_view != 'mentor') ? 'hidden-form' : ''; ?>">
                <div class="mb-8"><span class="px-2 py-1 text-xs font-semibold text-gsoc-green bg-green-50 rounded-md">Mentor Portal</span><h1 class="text-3xl font-extrabold text-gray-900">Mentor Sign In</h1></div>
                <form method="POST" class="space-y-6">
                    <input type="email" name="mentor-email" placeholder="Mentor Email" required class="w-full p-3 border rounded-lg focus:ring-gsoc-green">
                    <input type="password" name="mentor-password" placeholder="Password" required class="w-full p-3 border rounded-lg">
                    <button type="submit" name="mentor_login" class="w-full py-3 bg-gsoc-green text-white rounded-lg font-bold hover:bg-green-600">Mentor Sign In</button>
                </form>
                <p class="mt-6 text-center text-sm">
                    New Mentor? <button onclick="toggleView('mentor-register')" class="text-gsoc-green font-bold">Create Account</button>
                </p>
                <p class="mt-2 text-center text-sm"><button onclick="toggleView('login')" class="text-gsoc-blue font-bold">Back to Student Login</button></p>
            </div>

            <div id="mentor-register-view" class="form-container <?php echo ($active_view != 'mentor-register') ? 'hidden-form' : ''; ?>">
                <div class="mb-8"><span class="px-2 py-1 text-xs font-semibold text-gsoc-green bg-green-50 rounded-md">Mentor Portal</span><h1 class="text-3xl font-extrabold text-gray-900">Mentor Registration</h1></div>
                <form method="POST" class="space-y-6">
                    <input type="text" name="mentor-name" placeholder="Full Name" required class="w-full p-3 border rounded-lg focus:ring-gsoc-green">
                    <input type="email" name="mentor-email" placeholder="Mentor Email" required class="w-full p-3 border rounded-lg focus:ring-gsoc-green">
                    <input type="password" name="mentor-password" placeholder="Password" required class="w-full p-3 border rounded-lg">
                    <button type="submit" name="mentor_register" class="w-full py-3 bg-gsoc-green text-white rounded-lg font-bold hover:bg-green-600">Register as Mentor</button>
                </form>
                <p class="mt-6 text-center text-sm">
                    Already registered? <button onclick="toggleView('mentor')" class="text-gsoc-green font-bold">Sign In</button>
                </p>
            </div>

        </div>
    </div>

    <script>
        function toggleView(viewId) {
            // Hide all views first
            ['login-view', 'register-view', 'mentor-view', 'mentor-register-view'].forEach(id => {
                const el = document.getElementById(id);
                if(el) {
                    el.classList.add('hidden-form');
                    el.style.display = 'none';
                }
            });
            // Show target view
            const target = document.getElementById(viewId + '-view');
            if(target) {
                target.style.display = 'block';
                setTimeout(() => { target.classList.remove('hidden-form'); }, 50);
            }
        }
        
        document.addEventListener("DOMContentLoaded", () => {
             const active = "<?php echo $active_view; ?>";
             toggleView(active);
        });
    </script>
</body>
</html>