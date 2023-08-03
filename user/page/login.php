<div class="login-wraper">
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login Form
            </div>
            <div class="title signup">
                Signup Form
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="page/login_process.php" class="login" method="post">
                    <div class="field">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>
                    <?php

                    // Kiểm tra xem có thông báo lỗi không
                    if (isset($_SESSION['login_error'])) {
                        echo $_SESSION['login_error']; // Hiển thị thông báo lỗi (nếu có)
                        unset($_SESSION['login_error']); // Xóa thông báo lỗi sau khi đã hiển thị
                    }
                    ?>
                    <div class="signup-link">
                        Not a member? <a href="">Signup now</a>
                    </div>
                </form>
                <form action="page/register_process.php" method="post" class="signup">
                    <div class="field">
                        <input type="text" placeholder="Email Address" name='emailregis' required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Username" name='usernameregis' required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name='passwordregis' required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const formValue = urlParams.get('form');
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");

    signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
        signupBtn.click();
        return false;
    });

    function handleFormClick() {
        if (formValue === "false") {
            signupBtn.click();
        }
    }

    // Sử dụng setTimeout để gọi hàm handleFormClick sau khi trang đã tải xong
    setTimeout(handleFormClick, 10);
</script>