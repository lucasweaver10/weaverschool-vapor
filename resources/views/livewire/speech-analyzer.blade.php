<div>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
    window.addEventListener(`answered-correctly-{{ $this->identifier }}`, event => {
        new Audio("/sounds/correct.wav").play();
    });
    window.addEventListener(`answered-incorrectly-{{ $this->identifier }}`, event => {
        new Audio("/sounds/incorrect.wav").play();
    });
    window.addEventListener('bonus', event => {
        function bonus() {
            // Add bonus functionality here if needed
        }
    });
</script>
<div x-data="{ 
        showEvaluation: false, 
        evaluation: $wire.entangle('evaluation'),
        identifier: '{{ $this->identifier }}',
        showConfetti(score) {
            let particleCount = (score - 90) * 10;
            let spread = (score - 90) * 3;

            confetti({
                particleCount: particleCount,
                spread: spread,
                origin: { y: 0.6 }
            });
        }
    }" 

    x-init="$watch('evaluation', value => {
    if (value) {
        showEvaluation = true;
        let score = parseFloat(value); // Assuming the evaluation is a numerical score
        if (score > 90) {
            showConfetti(score);
            window.dispatchEvent(new CustomEvent('answered-correctly-{{ $this->identifier }}'));
        } else if (score < 60) {
            window.dispatchEvent(new CustomEvent('answered-incorrectly-{{ $this->identifier }}'));
        }
        setTimeout(() => { showEvaluation = false; }, 3000);
    }
})">
    <livewire:audio-recorder key="flashcard-{{ now() . '-' . $identifier }}" :identifier="$identifier"/>

    <div x-show="showEvaluation"
         x-transition:enter="transform transition ease-out duration-300"
         x-transition:enter-start="translate-y-12 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transform transition ease-in duration-300"
         x-transition:leave-start="translate-y-0 opacity-100"
         x-transition:leave-end="translate-y-12 opacity-0"
         class="fixed bottom-10 left-1/2 transform -translate-x-1/2 text-white bg-gray-800 px-4 py-2 rounded-lg shadow-lg">
        <span x-text="evaluation"></span>
    </div>
</div>
</div>