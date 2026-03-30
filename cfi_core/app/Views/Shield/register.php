<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('Auth.register') ?> - CFI Logístico</title>
    <!-- Tailwind CSS & CFI Design System -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Manrope:wght@400;500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-fixed-dim": "#D1A14E",
                        "surface-container-lowest": "#0e0e0f",
                        "on-error": "#ffb4ab",
                        "surface-variant": "#353436",
                        "surface-container-high": "#2a2a2b",
                        "inverse-surface": "#e5e2e3",
                        "primary": "#D1A14E",
                        "on-primary-container": "#9E7632",
                        "primary-container": "#4b391a",
                        "surface-container-low": "#1b1b1c",
                        "surface": "#131314",
                        "on-secondary-fixed-variant": "#434b18",
                        "secondary-container": "#434b18",
                        "surface-container-highest": "#353436",
                        "on-surface": "#e5e2e3",
                        "on-secondary-container": "#b1bb7c",
                        "on-primary": "#2e2100",
                        "on-secondary": "#2d3404",
                        "primary-fixed": "#f8e3be",
                        "error": "#93000a",
                        "inverse-on-surface": "#303031",
                        "background": "#131314",
                        "on-error-container": "#ffdad6",
                        "tertiary-container": "#3d2b1f",
                        "on-primary-fixed": "#2e2100",
                        "surface-tint": "#D1A14E",
                        "on-tertiary-container": "#ac9181",
                        "tertiary-fixed-dim": "#dec1af",
                        "surface-dim": "#131314",
                        "on-tertiary": "#3f2c20",
                        "tertiary": "#dec1af",
                        "secondary": "#D1A14E",
                        "outline-variant": "#4f453f",
                        "on-secondary-fixed": "#191e00",
                        "tertiary-fixed": "#fbddca",
                        "on-tertiary-fixed-variant": "#574335",
                        "on-background": "#e5e2e3",
                        "secondary-fixed-dim": "#D1A14E",
                        "on-surface-variant": "#d2c4bc",
                        "on-primary-fixed-variant": "#6d5200",
                        "secondary-fixed": "#f8e3be",
                        "surface-container": "#1f1f20",
                        "error-container": "#ffb4ab",
                        "surface-bright": "#39393a",
                        "outline": "#9b8e87",
                        "inverse-primary": "#906d00",
                        "on-tertiary-fixed": "#28180d"
                    },
                    fontFamily: {
                        "headline": ["Noto Serif", "serif"],
                        "body": ["Manrope", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0px", "sm": "0px", "md": "0px", "lg": "0px", "xl": "0px", "2xl": "0px", "3xl": "0px", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
        .matte-grain { position: relative; }
        .matte-grain::before {
            content: ""; position: absolute; inset: 0; opacity: 0.03; pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-surface text-on-surface font-body antialiased min-h-screen flex items-center justify-center relative selection:bg-primary selection:text-on-primary">
    <div class="absolute inset-0 bg-surface -z-10 matte-grain pointer-events-none"></div>

    <div class="w-full max-w-md bg-surface-container-low border border-outline-variant/30 shadow-2xl relative p-10 matte-grain my-8">
        <div class="relative z-10">
            <div class="flex items-center justify-center mb-8 text-primary">
                <span class="material-symbols-outlined text-6xl">person_add</span>
            </div>
            
            <h5 class="text-3xl font-headline font-bold text-center mb-2 tracking-tight">Identity Register</h5>
            <p class="text-[10px] font-label uppercase tracking-widest text-outline text-center mb-10">System Access Control</p>

            <?php if (session('error') !== null) : ?>
                <div class="bg-error/20 border-l-4 border-error p-4 mb-8 text-error-container text-sm font-medium">
                    <?= esc(session('error')) ?>
                </div>
            <?php elseif (session('errors') !== null) : ?>
                <div class="bg-error/20 border-l-4 border-error p-4 mb-8 text-error-container text-sm font-medium">
                    <?php if (is_array(session('errors'))) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <?= esc($error) ?><br>
                        <?php endforeach ?>
                    <?php else : ?>
                        <?= esc(session('errors')) ?>
                    <?php endif ?>
                </div>
            <?php endif ?>

            <form action="<?= url_to('register') ?>" method="post" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Email -->
                <div>
                    <label for="floatingEmailInput" class="block text-[10px] font-label uppercase tracking-[0.2em] text-outline mb-2"><?= lang('Auth.email') ?></label>
                    <input type="email" class="w-full bg-surface-container-lowest border border-outline-variant/30 text-on-surface p-4 font-body focus:border-primary focus:outline-none transition-colors" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" value="<?= old('email') ?>" required>
                </div>

                <!-- Username -->
                <div>
                    <label for="floatingUsernameInput" class="block text-[10px] font-label uppercase tracking-[0.2em] text-outline mb-2"><?= lang('Auth.username') ?></label>
                    <input type="text" class="w-full bg-surface-container-lowest border border-outline-variant/30 text-on-surface p-4 font-body focus:border-primary focus:outline-none transition-colors" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" value="<?= old('username') ?>" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="floatingPasswordInput" class="block text-[10px] font-label uppercase tracking-[0.2em] text-outline mb-2"><?= lang('Auth.password') ?></label>
                    <input type="password" class="w-full bg-surface-container-lowest border border-outline-variant/30 text-on-surface p-4 font-body focus:border-primary focus:outline-none transition-colors" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" required>
                </div>

                <!-- Password (Again) -->
                <div>
                    <label for="floatingPasswordConfirmInput" class="block text-[10px] font-label uppercase tracking-[0.2em] text-outline mb-2"><?= lang('Auth.passwordConfirm') ?></label>
                    <input type="password" class="w-full bg-surface-container-lowest border border-outline-variant/30 text-on-surface p-4 font-body focus:border-primary focus:outline-none transition-colors" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" required>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-primary hover:brightness-110 text-on-primary px-8 py-4 font-label text-[10px] uppercase tracking-[0.2em] font-bold transition-all flex justify-center items-center cursor-pointer shadow-[0_0_15px_rgba(209,161,78,0.3)] hover:shadow-[0_0_20px_rgba(209,161,78,0.5)]">
                        <?= lang('Auth.register') ?>
                        <span class="material-symbols-outlined ml-3 text-[18px]">how_to_reg</span>
                    </button>
                </div>

                <div class="mt-8 pt-6 border-t border-outline-variant/20 text-center">
                    <p class="text-[10px] font-label uppercase text-outline tracking-wider">
                        <?= lang('Auth.haveAccount') ?> 
                        <a href="<?= url_to('login') ?>" class="text-primary hover:text-white transition-colors ml-1 font-bold"><?= lang('Auth.login') ?></a>
                    </p>
                </div>

            </form>
        </div>
    </div>
</body>
</html>
