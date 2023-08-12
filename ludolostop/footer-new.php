<?php wp_footer(); ?>
<script>
    (function() {
        const wheel = document.querySelector('.wheel-spinner');
        const startButton = document.querySelector('.spin-trigger');
        const arrow = document.querySelector('.wheel-vin-block');
        const celebrate = document.querySelector('.celebrate-block');
        const title = document.querySelector('.wheel-title');
        const money = document.querySelector('.money-one');
        const moneytwo = document.querySelector('.money-two');
        const head = document.querySelector('.wheel-head');
        const deer = document.querySelector('.deer-block-new');
        let deg = 0;

        startButton.addEventListener('click', () => {
            startButton.style.pointerEvents = 'none';
            deg = Math.floor(1000 + Math.random() * 1000);
            wheel.style.transition = 'transform 6s ease-out';
            wheel.style.transform = `rotate(${deg}deg)`;
            arrow.style.animation = 'rotation 0.5s linear infinite';
            wheel.classList.add('blur');
            celebrate.classList.remove('open');
            title.classList.remove('open');
            money.classList.remove('open');
            moneytwo.classList.remove('open');
            head.classList.remove('open');
            deer.classList.remove('open');
        });

        wheel.addEventListener('transitionend', () => {
            wheel.classList.remove('blur');
            startButton.style.pointerEvents = 'auto';
            wheel.style.transition = 'none';
            const actualDeg = deg % 360;
            arrow.style.animation = 'none';
            wheel.style.transform = `rotate(${actualDeg}deg)`;
            celebrate.classList.add('open');
            title.classList.add('open');
            money.classList.add('open');
            moneytwo.classList.add('open');
            head.classList.add('open');
            deer.classList.add('open');
        });

    })();
</script>
</body>
</html>
