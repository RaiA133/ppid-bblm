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

  <div class="min-h-screen w-full bg-base-200 flex items-center">
    <div class="card mx-auto w-full max-w-5xl shadow-xl">
      <div class="grid md:grid-cols-2 grid-cols-1 bg-base-100 rounded-xl">

        <div class="flex items-center">
          <video src="<?= base_url() ?>/vid/animasi_logo_bblm.mp4" autoplay loop muted class=""></video>
        </div>

        <div class="py-10 px-10">
          <h2 class="text-2xl font-semibold mb-2 text-center"><?= lang('Auth.register') ?></h2>

          <?= view('Myth\Auth\Views\_message_block') ?>

          <form action="<?= url_to('register') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-4">
              
            <div class="form-control w-full mt-2">
                <label class="label">
                  <span class="label-text text-base-content"><?=lang('Auth.email')?></span>
                </label>
                <input type="text" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" class="input input-bordered w-full <?php if (session('errors.email')) : ?>input-error<?php endif ?>">
              </div>

              <div class="form-control w-full mt-2">
                <label class="label">
                  <span class="label-text text-base-content"><?=lang('Auth.username')?></span>
                </label>
                <input type="text" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" class="input input-bordered w-full <?php if (session('errors.username')) : ?>input-error<?php endif ?>">
              </div>


              <div class="form-control w-full mt-2">
                <label class="label">
                  <span class="label-text text-base-content"><?=lang('Auth.password')?></span>
                </label>
                <input type="password" name="password" placeholder="<?=lang('Auth.password')?>" class="input input-bordered w-full <?php if (session('errors.password')) : ?>input-error<?php endif ?>" autocomplete="off">
              </div>

              <div class="form-control w-full mt-2">
                <label class="label">
                  <span class="label-text text-base-content"><?=lang('Auth.repeatPassword')?></span>
                </label>
                <input type="password" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" class="input input-bordered w-full <?php if (session('errors.pass_confirm')) : ?>input-error<?php endif ?>" autocomplete="off">
              </div>

            </div>

            <p id="errorMessage" class="text-center text-error mt-8"></p>

            <button type="submit" class="btn mt-2 w-full btn-primary"><?=lang('Auth.register')?></button>

            <div class="text-center mt-4">
              <?=lang('Auth.alreadyRegistered')?>
              <a href="<?= base_url() ?>login" class="inline-block hover:text-primary hover:underline hover:cursor-pointer transition duration-200"><?=lang('Auth.signIn')?></a>
            </div>
          </form>
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