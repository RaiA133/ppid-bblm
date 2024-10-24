<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPID | BBLM</title>
  <link rel="stylesheet" href="<?= base_url() ?>src/output.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.css">
</head>

<body data-theme="<?= getenv('ui_theme') ?>" class="flex">

  <div class="w-full">
    <div data-scroll-container class="bg-base-200">

      <div class="flex flex-col justify-center items-center w-full h-screen">

        <div class="card mx-auto w-full max-w-5xl">
          <div class="grid md:grid-cols-2 grid-cols-1 bg-base-100 rounded-xl shadow-xl">
            <div class="flex items-center">
              <!-- Ganti ini dengan konten yang diinginkan seperti gambar atau teks intro -->
              <!-- <img src="https://via.placeholder.com/500x400" alt="Landing Intro" class="w-full h-full object-cover rounded-l-xl"> -->
              <video src="<?= base_url() ?>/vid/animasi_logo_bblm.mp4" autoplay loop muted class=""></video>
            </div>
            <div class="py-24 px-10">
              <h2 class="text-2xl font-semibold mb-2 text-center"><?= lang('Auth.loginTitle') ?></h2>

              <?= view('Myth\Auth\Views\_message_block') ?>

              <form action="<?= url_to('login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="">

                  <?php if ($config->validFields === ['email']): ?>
                    <div class="mt-4"> <!-- Input Email -->
                      <label for="login" class="block text-sm font-medium text-gray-700"><?= lang('Auth.email') ?></label>
                      <input type="email" name="login" placeholder="<?= lang('Auth.email') ?>" class="input input-bordered w-full mt-2 <?php if (session('errors.login')) : ?>input-error<?php endif ?>">
                      <div class="label"><span class="label-text-alt text-error"><?= session('errors.login') ?></span></div>
                    </div>
                  <?php else: ?>
                    <div class="mt-4"> <!-- Input Email or Username -->
                      <label for="login" class="block text-sm font-medium text-gray-700"><?= lang('Auth.emailOrUsername') ?></label>
                      <input type="text" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" class="input input-bordered w-full mt-2 <?php if (session('errors.login')) : ?>input-error<?php endif ?>">
                      <div class="label"><span class="label-text-alt text-error"><?= session('errors.login') ?></span></div>
                    </div>
                  <?php endif; ?>


                  <div class="mt-4"> <!-- Input Password -->
                    <label for="password" class="block text-sm font-medium text-gray-700"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" placeholder="<?= lang('Auth.password') ?>" class="input input-bordered w-full mt-2 <?php if (session('errors.password')) : ?>input-error<?php endif ?>">
                    <div class="label"><span class="label-text-alt text-error"><?= session('errors.password') ?></span></div>
                  </div>

                  <?php if ($config->allowRemembering): ?>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <?= lang('Auth.rememberMe') ?>
                      </label>
                    </div>
                  <?php endif; ?>

                </div>

                <?php if ($config->activeResetter): ?>
                  <div class="text-right text-primary">
                    <a href="<?= base_url() ?>forgot" class="text-sm inline-block hover:text-primary hover:underline transition duration-200"><?= lang('Auth.forgotYourPassword') ?></a>
                  </div>
                <?php endif; ?>

                <!-- Error Message Placeholder -->
                <p class="text-red-500 mt-4"></p>

                <!-- Login Button -->
                <button type="submit" class="btn mt-2 w-full btn-primary"><?= lang('Auth.loginAction') ?></button>

                <?php if ($config->allowRegistration) : ?>
                  <div class="text-center mt-4">
                    <?= lang('Auth.needAnAccount') ?>
                    <a href="<?= base_url() ?>register" class="inline-block hover:text-primary hover:underline transition duration-200">Register</a>
                  </div>
                <?php endif; ?>

              </form>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true
    });
  </script>


</body>

</html>