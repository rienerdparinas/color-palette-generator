<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Palette Generator</title>
    <meta name="description" content="Explore endless combinations and find the perfect hues for your projects.">
    <link rel="icon" href="favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon-192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="favicon-512.png">
    <link rel="mask-icon" href="favicon-192.png" color="#F3F3F3">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#F3F3F3">
    <style>
        :root {
            --bg-body: #F3F3F3;
            --white: #FFFFFF;
            --grey: #888888;
            --black: #121212;
            --header: #535353;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: var(--bg-body);
        }

        html,
        body {
            font-size: 16px;
        }

        body,
        input,
        select,
        textarea,
        button {
            font-family: Arial, Helvetica, sans-serif;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-center {
            justify-content: center;
        }

        .vh-100 {
            min-height: 100vh;
        }

        .p-3 {
            padding: 1rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-inline: -1rem;
        }

        .col {
            display: flex;
            flex: 1;
            padding-inline: 1rem;
        }

        .logo-label {
            color: var(--header);
            text-decoration: none;
        }

        .card {
            background: var(--white);
            width: 100%;
            padding: 0.25rem;
            border-radius: 1rem;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.25);
        }

        .color {
            width: 100%;
            background: var(--grey);
            aspect-ratio: 1 / 1;
            border-radius: 0.75rem;
            position: relative;
        }

        .description {
            position: absolute;
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.35));
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0.5rem;
            color: var(--white);
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
            border-radius: 0 0 0.75rem 0.75rem;
        }

        .keyboard-shortcut {
            position: absolute;
            top: 0;
            left: 0;
            font-weight: bold;
            font-size: 0.65rem;
            padding: 0.5rem;
            color: var(--white);
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
        }

        .regenerate {
            color: var(--white);
            background: transparent;
            border: 0;
            padding: 0.5rem;
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
        }

        .copy {
            color: var(--white);
            background: transparent;
            border: 0;
            padding: 0.5rem;
            position: absolute;
            bottom: 0;
            right: 0;
            cursor: pointer;
        }

        .icon-regenerate,
        .icon-copy {
            filter: drop-shadow(0 1px 1px rgba(0, 0, 0, 0.5));
        }

        .toast {
            position: fixed;
            background: var(--black);
            color: var(--white);
            padding: 0.75rem;
            border-radius: 0.25rem;
            width: 20rem;
            text-align: center;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            animation: toast 3s ease-in-out;
        }

        @keyframes toast {
            0% {
                opacity: 0;
                bottom: -3rem;
            }

            10% {
                opacity: 1;
                bottom: 1rem;
            }

            90% {
                opacity: 1;
                bottom: 1rem;
            }

            100% {
                opacity: 0;
                bottom: -3rem;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center vh-100 p-3">
        <div style="width: 100%; max-width: 768px;">
            <h1>
                <img src="favicon.png" alt="Color Palette Generator" style="width: 2rem; height: auto;">
                <a class="logo-label" href="https://color-palette-generator.test">Color Palette Generator</a>
            </h1>
            <div class="row">

                <?php
                $shortcuts = ['Q', 'W', 'E', 'R', 'T'];
                for ($i = 1; $i <= 5; $i++) :
                    $color = strtoupper(dechex(mt_rand(0, 16777215)));
                    $id = 'color-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                ?>
                    <div class="col" style="max-width: 240px;">
                        <div class="card">
                            <div class="color" id="<?= $id ?>" style="background-color: #<?= $color ?>;">
                                <div class="description">
                                    #<?= $color ?>
                                </div>
                                <span class="keyboard-shortcut">
                                    <?= $shortcuts[$i - 1] ?>
                                </span>
                                <button class="regenerate" title="Regenerate" data-target="#<?= $id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-regenerate" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                                    </svg>
                                </button>
                                <button class="copy" title="Copy" data-value="#<?= $color ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-copy" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

            </div>
        </div>
    </div>

    <script>
        function toast(str) {
            const toast = document.createElement('div');
            toast.innerHTML = str;
            toast.classList.add('toast');
            document.querySelector('body').appendChild(toast);
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        document.querySelectorAll('.copy').forEach(function(button) {
            button.addEventListener('click', function() {
                navigator.clipboard.writeText(this.getAttribute('data-value'));
                toast('Copied to clipboard');
            });
        });

        document.querySelectorAll('.regenerate').forEach(function(button) {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            });
        });

        document.querySelector('body').addEventListener('keyup', function(evt) {
            const keycode = evt.keyCode;

            // Q
            if (keycode === 81) {
                const target = '#color-01';
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            }

            // W
            if (keycode === 87) {
                const target = '#color-02';
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            }

            // E
            if (keycode === 69) {
                const target = '#color-03';
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            }

            // R
            if (keycode === 82) {
                const target = '#color-04';
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            }

            // T
            if (keycode === 84) {
                const target = '#color-05';
                const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                document.querySelector(target).style.backgroundColor = color;
                document.querySelector(target + ' .description').innerHTML = color;
                document.querySelector(target + ' .copy').setAttribute('data-value', color);
            }

            // Spacebar
            if (keycode === 32) {
                for (let i = 1; i <= 5; i++) {
                    const target = '#color-0' + i;
                    const color = '#' + Math.floor(Math.random() * 16777215).toString(16).toUpperCase();
                    document.querySelector(target).style.backgroundColor = color;
                    document.querySelector(target + ' .description').innerHTML = color;
                    document.querySelector(target + ' .copy').setAttribute('data-value', color);
                }
            }
        });
    </script>

</body>

</html>