<?php
session_start();
$title = "Late Mate";
include "./template/header.php";
?>

<center class="center pt-5">
    <img src="./image/latemate.png" alt="Late Mate Logo" width="140">
</center>

<section class="container pt-3">
    <div class="card p-1" style="background-color: transparent; box-shadow: none; border: none;">


        <?php if (isset($_SESSION["VALIDATION_SUCCESS"])) : ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION["VALIDATION_SUCCESS"] ?>
            </div>
            <?php session_unset(); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION["VALIDATION_EMAIL_EXIST"])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION["VALIDATION_EMAIL_EXIST"] ?>
            </div>
            <?php session_unset(); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION["VALIDATION_INPUT"])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION["VALIDATION_INPUT"] ?>
            </div>
            <?php session_unset(); ?>
        <?php endif; ?>
        <card>
           <section class="container pt-5">
    <div class="form-wrapper">
        <form action="./database/register.php" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label text-primary fw-bold">Nama</label>
                <input
                    type="text"
                    class="form-control"
                    name="nama"
                    placeholder="Enter Your name"
                    id="nama">
            </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-capitalize text-primary fw-bold">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Enter your email"
                        id="email"
                        aria-describedby="emailHelp2">
                </div>

                <div class="mb-3">
                    <label for="no_telp" class="form-label text-capitalize text-primary fw-bold">No Telp</label>
                    <input
                        type="tel"
                        name="no_telp"
                        placeholder="08***"
                        class="form-control bg-light"
                        id="no_telp"
                        pattern="^08[0-9]{8,11}$"
                        maxlength="13"
                        required
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label text-capitalize text-primary fw-bold">Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="********"
                        class="form-control"
                        id="password">
                </div>

                <center>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                    <p class="mt-3 text-capitalize fw-bold">Already Have an Account?
                        <a href="login.php">Login</a>
                </center>
                </p>
            </form>
    </div>
    </card>
</section>

<?php include "./template/footer.php"; ?>